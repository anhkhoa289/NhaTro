<?php
namespace App\Repository;

use App\Model\LoaiTaiKhoan;

class LoaiTaiKhoanRepository
{
    public $LoaiTaiKhoan;

    public function __construct(LoaiTaiKhoan $LoaiTaiKhoan){
        $this->LoaiTaiKhoan = $LoaiTaiKhoan;
    }
    
    public function getAll()
    {
        return $this->LoaiTaiKhoan::all();
    }
}