<?php
namespace App\Repository;

use App\Model\PhongTro;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    public function updatePhoto($maPhong,$path){
        $this->PhongTro = $this->PhongTro::find($maPhong);
        $this->PhongTro->pathImg = $path;
        $this->PhongTro->save();
    }
    public function get($maPhong){
        return $this->PhongTro::findOrFail($maPhong);
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
}