<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'TaiKhoan';
    public function LoaiTaiKhoan()
    {
        return $this->belongsTo('App\Model\LoaiTaiKhoan', 'loaiTK', 'loaiTK');
    }
    public function PhongTro(){
        return $this->hasMany('App\Model\PhongTro');
    }
}
