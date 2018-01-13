<?php
namespace App\Repository;

use App\Model\PhongTro;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Log;

class PhongTroRepository
{
    public $PhongTro;
    
    public function __construct(PhongTro $PhongTro)
    {
        $this->PhongTro = $PhongTro;
    }
    public function add($obj, $chuNha)
    {
        $this->PhongTro = RemoveToken::remove($obj->all(), PhongTro::class);
        $this->PhongTro->chuNha = $chuNha;
        $this->PhongTro->capNhatLuc = Carbon::now();
        $this->PhongTro->save();
        return $this->PhongTro->maPhong;
    }

    public function update($phong) {
        $this->PhongTro = $this->PhongTro::find($phong->maPhong);
        foreach($phong as $key => $value) {
            $this->PhongTro->$key = $value;
        }
        $this->PhongTro->save();
    }

    public function updatePhoto($maPhong,$path){
        $this->PhongTro = $this->PhongTro::find($maPhong);
        $this->PhongTro->pathImg = $path;
        $this->PhongTro->save();
    }
    public function get($maPhong){
        return $this->PhongTro::findOrFail($maPhong);
    }
    public function getForUpdate($maPhong, $chuNha){
        $this->PhongTro = $this->PhongTro::findOrFail($maPhong);
        if($this->PhongTro->tinhTrangDuyet == 2 || $this->PhongTro->chuNha != $chuNha )
            return null;
        else 
            return $this->PhongTro;
    }
    public function updateClicked($maPhong){
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->luotClick = $this->PhongTro->luotClick + 1;
        $this->PhongTro->save();
    }
    public function getApproval(){
        $PhongTro = DB::select("select *, Phongtro.diaChi as diaChiPhongTro from PhongTro, TaiKhoan where PhongTro.CTVduyet = TaiKhoan.id order by PhongTro.created_at desc");
        //$PhongTro = DB::table('PhongTro')->join('TaiKhoan', 'PhongTro.CTVduyet', '=', 'TaiKhoan.id')->orderBy('PhongTro.updated_at', 'desc')->get();
        return $PhongTro;
    }
    public function getUnapproval(){
        return $this->PhongTro::where('tinhTrangDuyet',0)->orderBy('updated_at','desc')->take(10)->get();
    }

    public function get10($skip = 0, $q) {
        $query = [['tinhTrangHienThi', '=', 1], ['tinhTrangSoHuu', '=', 1], ['tinhTrangDuyet', '<>', 2]];
        foreach($q as $value)
        {
            switch($value['type']) {
                case 'ten':
                    array_push($query, ["tenPhong", 'like', "%".$value['value']."%"]);
                    break;
                case 'dientich':
                    array_push($query, ["dienTich", '>=', $value['min']]);

                    if($value['value'] != 70)
                        array_push($query, ["dienTich", '<=', $value['max']]);
                    break;
                case 'giatien':
                    array_push($query, ["gia", '>=', $value['min']]);

                    if($value['value'] != 7000000)
                        array_push($query, ["gia", '<=', $value['max']]);
                    break;
                case 'diaphuong':
                    if($value['tinh'] != null)
                        array_push($query, ["tinh", '=', $value['tinh']]);
                    if($value['quan'] != null)
                        array_push($query, ["quan", '=', $value['quan']]);
                    if($value['phuong'] != null)
                        array_push($query, ["phuong", '=', $value['phuong']]);
                    break;
            }
        }
        return DB::table('PhongTro')
            ->where($query)
            ->skip($skip)
            ->take(5)
            ->get();
    }

    public function increaseLuotDatCho($maPhong) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->luotDatCho = $this->PhongTro->luotDatCho + 1;
        $this->PhongTro->datChoLuc = Carbon::now();
        $this->PhongTro->save();
    }
    public function decreaseLuotDatCho($maPhong) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->luotDatCho = $this->PhongTro->luotDatCho - 1;
        $this->PhongTro->save();
    }
    public function getSdtDatChoOfMaPhong($maPhong) {
        return DB::table('PhongTro')
        ->join('ThongBao', 'PhongTro.maPhong', '=', 'ThongBao.maLienKet')
        ->join('DatCho', 'ThongBao.id', '=', 'DatCho.TB_id')
        ->where('PhongTro.maPhong', '=', $maPhong)
        ->select(
            'DatCho.sdtKhachHang as sdtKhachHang',
            'DatCho.created_at as datChoLuc'
        )
        ->get();
    }

    public function deletePhongTro($maPhong) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->tinhTrangSoHuu = 0;
        $this->PhongTro->save();
    }

    public function hidePhongTro($maPhong, $tinhTrangHienThi) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->tinhTrangHienThi = $tinhTrangHienThi;
        $this->PhongTro->save();
    }

    public function updateCTVduyet($maPhong, $ctv) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->CTVduyet = $ctv;
        $this->PhongTro->save();
    }
    public function updateTinhTrangDuyet($currentIDUser, $maPhong, $tinhTrangDuyet) {
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        if($this->PhongTro->CTVduyet == $currentIDUser) {
            $this->PhongTro->tinhTrangDuyet = $tinhTrangDuyet;
            $this->PhongTro->save();
            return true;
        }
        else return false;
    }
}