<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DatCho extends Model
{
    protected $table = 'DatCho';
    protected $primaryKey = 'id';
    public function KhachHang() {
        return $this->belongsTo('App\Model\KhachHang', 'sdtKhachHang', 'sdtKhachHang');
    }
    public function ThongBao() {
        return $this->belongsTo('App\Model\PhongTro', 'TB_id', 'id');
    }
}
