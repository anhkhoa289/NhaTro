<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiThongBao extends Model
{
    protected $table = 'LoaiThongBao';
    protected $primaryKey = 'loaiTB';
    public function ThongBao() {
        return $this->hasMany('App\Model\ThongBao', 'loaiTB', 'loaiTB');
    }
}
