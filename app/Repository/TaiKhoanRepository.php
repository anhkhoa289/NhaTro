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
        $TaiKhoan = RemoveToken::remove($obj, TaiKhoan::class);
        $TaiKhoan->save();
        return $TaiKhoan;
    }
    public function getUserByType($type)
    {
        return TaiKhoan::Where('loaiTK', $type)->get();
    }
}
