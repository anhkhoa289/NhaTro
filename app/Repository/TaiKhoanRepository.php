<?php
namespace App\Repository;

use App\Model\TaiKhoan;

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
        $this->TaiKhoan->save();
        return $this->TaiKhoan;
    }
    public function checkUserName($username){
        $count = $this->TaiKhoan::where("tenDangNhap","=",$username)->count();
        return $count;
    }
    public function checkEmail($email){
        $count = $this->TaiKhoan::where("email","=",$email)->count();
        return $count;
    }
    public function getUserByType($type)
    {
        return TaiKhoan::Where('loaiTK', $type)->get();
    }
}
