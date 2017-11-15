<?php
namespace App\Repository;

use App\Model\TaiKhoan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TaiKhoanRepository
{
    public $TaiKhoan;
    
    public function __construct(TaiKhoan $TaiKhoan) {
        $this->TaiKhoan = $TaiKhoan;
    }
    public function add($obj) {
        $this->TaiKhoan = RemoveToken::remove($obj, TaiKhoan::class);
        $this->TaiKhoan->maKichHoat = str_random(6);//resolve('codeCreate');
        $this->TaiKhoan->matkhau = bcrypt($this->TaiKhoan->matkhau);
        //$this->TaiKhoan->created_at = Carbon::now();
        $this->TaiKhoan->avatar = 'avaDefault.jpg';
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }
    public function login($obj) {
        $this->TaiKhoan = TaiKhoan::where('tenDangNhap', $obj['tenDangNhap'])->get();
        if($this->TaiKhoan->count() === 0)
            return false;
        else if(Hash::check($obj['matkhau'], $this->TaiKhoan[0]->matkhau))
            return $this->TaiKhoan[0];
        else
            return false;
    }
    public function checkUserName($username) {
        $count = $this->TaiKhoan::where("tenDangNhap","=",$username)->count();
        return $count;
    }
    public function checkEmail($email) {
        $count = $this->TaiKhoan::where("email","=",$email)->count();
        return $count;
    }
    public function get($id) {
        return $this->TaiKhoan::findOrFail($id);
    }
    public function getUserByType($type) {
        return TaiKhoan::Where('loaiTK', $type)->get();
    }
    public function updateAvatar($obj,$avatar) {
        if(!($avatar === 'avaDefault.jpg'))
            Storage::delete('public/img/'.$avatar);
        $path = $obj->avatar->storeAs('public/img/','ava_'.$this->TaiKhoan->id);
        $count = strlen('public/img/');
        $path = substr($path,$count);
        $this->TaiKhoan->avatar = $path;
        $this->TaiKhoan->save();
    }
    public function checkMaXacNhan($id, $maXacNhan) {
        $this->TaiKhoan = TaiKhoan::findOrFail($id);
        $ma = strtoupper($maXacNhan);
        if(strtoupper($maXacNhan) === strtoupper($this->TaiKhoan->maKichHoat)){
            $this->TaiKhoan->tinhTrangHoatDong = 1;
            $this->TaiKhoan->save();
        }
        return $this->TaiKhoan;
    }
    public function getPhongTroSoHuu10($id, $skip = 0) {
        return $this->TaiKhoan::find($id)->ChuPhongTro()->orderBy("capNhatLuc", 'desc')
            ->skip($skip)
            ->take(1)
            ->get();
    }
    public function updateSlgThongBao($id, $slg) {
        $this->TaiKhoan = $this->TaiKhoan::find($id);
        $this->TaiKhoan->slgThongBao = $this->TaiKhoan->slgThongBao + $slg;
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }   
    public function updateSlgDuyet($id, $slg) {
        $this->TaiKhoan = $this->TaiKhoan::find($id);
        $this->TaiKhoan->slgDuyet = $this->TaiKhoan->slgDuyet + $slg;
        $this->TaiKhoan->save();
    }    
    public function updateSlgPhongTroSoHuu($id, $slg) {
        $this->TaiKhoan = $this->TaiKhoan::find($id);
        $this->TaiKhoan->slgPhongTroSoHuu = $this->TaiKhoan->slgPhongTroSoHuu + $slg;
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }
    public function updateSlgDatCho($id, $slg) {
        $this->TaiKhoan = $this->TaiKhoan::find($id);
        $this->TaiKhoan->slgDatCho = $this->TaiKhoan->slgDatCho + $slg;
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }
    public function updateLoaiTK($obj) {
        if($obj->loai === "id")
            $this->TaiKhoan = TaiKhoan::findOrFail($obj->search);
        else
            $this->TaiKhoan = TaiKhoan::where("tenDangNhap","=",$obj->search)->first();

        $this->TaiKhoan->loaiTK = $obj->loaiTK;
        $this->TaiKhoan->save();
        return true;
    }
    public function getCTV($tinh = null, $quan = null, $phuong = null) {
        $query = [["loaiTK", "=", 2]];
        if($tinh != null)
            array_push($query, ["tinh", '=', $tinh]);
        if($quan != null)
            array_push($query, ["quan", '=', $quan]);
        if($phuong != null)
            array_push($query, ["phuong", '=', $phuong]);
        
        return $this->TaiKhoan::where($query)->get();
    }
    public function getMin($CTV) {
        $min = $CTV[0]->slgDuyet;
        foreach($CTV as $val)
            if($val->slgDuyet<$min)
                $min = $val->slgDuyet;
        return $min;
    }
}
