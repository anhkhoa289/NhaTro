<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    protected $table = 'PhongTro';
    protected $primaryKey = 'maPhong';
    public function ThongBao(){
        return $this->hasMany('App\Model\ThongBao', 'maLienKet', 'maPhong');
    }
    public function ChuPhongTro() {
        return $this->belongsTo('App\Model\TaiKhoan', 'chuNha', 'id');
    }
    public function CTVDuyet() {
        return $this->belongsTo('App\Model\TaiKhoan', 'CTVduyet', 'id');
    }
    public function HinhAnhPhongTro(){
        return $this->hasMany('App\Model\HinhAnhPhongTro', 'maPhong', 'maPhong');
    }
}
