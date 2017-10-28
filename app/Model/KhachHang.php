<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'KhachHang';
    protected $primaryKey = 'sdtKhachHang';
    public $incrementing = false;
    public function DatCho() {
        return $this->hasMany('App\Model\DatCho', 'sdtKhachHang', 'sdtKhachHang');
    }
}
