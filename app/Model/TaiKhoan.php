<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'TaiKhoan';
    protected $primaryKey = 'id';
    public function LoaiTaiKhoan() {
        return $this->belongsTo('App\Model\LoaiTaiKhoan', 'loaiTK', 'loaiTK');
    }
    public function ChuPhongTro() {
        return $this->hasMany('App\Model\PhongTro', 'chuNha', 'id');
    }
    public function CTVDuyet() {
        return $this->hasMany('App\Model\PhongTro', 'CTVduyet', 'id');
    }
    public function ThongBao() {
        return $this->hasMany('App\Model\ThongBao', 'TK_id', 'id');
    }
}
