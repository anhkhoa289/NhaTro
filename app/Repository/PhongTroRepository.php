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
    public function get($maPhong){
        return $this->PhongTro::findOrFail($maPhong);
    }
    public function updateClicked($maPhong){
        $this->PhongTro = PhongTro::findOrFail($maPhong);
        $this->PhongTro->luotClick = $this->PhongTro->luotClick + 1;
        $this->PhongTro->save();
    }
}