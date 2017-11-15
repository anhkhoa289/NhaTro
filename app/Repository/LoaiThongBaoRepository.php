<?php
namespace App\Repository;

use App\Model\LoaiThongBao;

class LoaiThongBaoRepository
{
    public $LoaiThongBao;

    public function __construct(LoaiThongBao $LoaiThongBao){
        $this->LoaiThongBao = $LoaiThongBao;
    }
    public function getByName($name) {
        return $this->LoaiThongBao::where('tenLoai', '=', $name)->first();
    }
    public function getAll()
    {
        return $this->LoaiThongBao::all();
    }
}