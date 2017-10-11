<?php
namespace App\Repository;

use App\Model\PhongTro;
use Illuminate\Support\Facades\DB;

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
        $this->PhongTro->save();
        return $this->PhongTro->maPhong;
    }
}