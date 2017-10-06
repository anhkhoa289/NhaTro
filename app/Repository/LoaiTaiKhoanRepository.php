<?php
namespace App\Repository;

use App\Model\LoaiTaiKhoan;

class LoaiTaiKhoanRepository
{
    public $LoaiTaiKhoan;

    public function __construct(LoaiTaiKhoan $LoaiTaiKhoan){
        $this->LoaiTaiKhoan = $LoaiTaiKhoan;
    }
    public function add($obj){
        $LoaiTaiKhoan = RemoveToken::remove($obj, LoaiTaiKhoan::class);
        $LoaiTaiKhoan->save();
        return $LoaiTaiKhoan;
    }
    public function getAll()
    {
        return $this->LoaiTaiKhoan::all();
    }

    public function paginate($perPage = null, $columns = array('*'))
    {
        return $this->LoaiTaiKhoan::paginate($perPage, $columns);
    }

    public function findOrFail($id, $columns = array('*'))
    {
        return $this->LoaiTaiKhoan::findOrFail($id, $columns);
    }
}