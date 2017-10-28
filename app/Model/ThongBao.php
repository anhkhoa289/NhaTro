<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'ThongBao';
    protected $primaryKey = 'id';
    
    public function LoaiThongBao() {
        return $this->belongsTo('App\Model\LoaiThongBao', 'loaiTB', 'loaiTB');
    }
    public function DatCho() {
        return $this->hasMany('App\Model\DatCho', 'TB_id', 'id');
    }
    public function TaiKhoan() {
        return $this->belongsTo('App\Model\TaiKhoan', 'TK_id', 'id');
    }
}
