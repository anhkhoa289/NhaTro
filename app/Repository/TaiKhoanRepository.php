<?php
namespace App\Repository;

use App\Model\TaiKhoan;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class TaiKhoanRepository
{
    public $TaiKhoan;
    
    public function __construct(TaiKhoan $TaiKhoan)
    {
        $this->TaiKhoan = $TaiKhoan;
    }
    public function add($obj)
    {
        $this->TaiKhoan = RemoveToken::remove($obj, TaiKhoan::class);
        $this->TaiKhoan->maKichHoat = str_random(6);//resolve('codeCreate');
        $this->TaiKhoan->matkhau = bcrypt($this->TaiKhoan->matkhau);
        //$this->TaiKhoan->created_at = Carbon::now();
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }
    public function login($obj)
    {
        $this->TaiKhoan = TaiKhoan::where('tenDangNhap', $obj['tenDangNhap'])->get();
        if($this->TaiKhoan->count() === 0)
            return false;
        else if(Hash::check($obj['matkhau'], $this->TaiKhoan[0]->matkhau))
            return $this->TaiKhoan[0];
        else
            return false;
    }
    public function checkUserName($username){
        $count = $this->TaiKhoan::where("tenDangNhap","=",$username)->count();
        return $count;
    }
    public function checkEmail($email){
        $count = $this->TaiKhoan::where("email","=",$email)->count();
        return $count;
    }
    public function get($id){
        return $this->TaiKhoan::findOrFail($id);
    }
    public function getUserByType($type)
    {
        return TaiKhoan::Where('loaiTK', $type)->get();
    }
}
