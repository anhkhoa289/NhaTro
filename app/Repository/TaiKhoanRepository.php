<?php
namespace App\DAO;

use App\Model\TaiKhoan;

class TaiKhoanDAO
{
    public function getUserByType($type){
        return TaiKhoan::Where('loaiTK', $type)->get();
    }
}