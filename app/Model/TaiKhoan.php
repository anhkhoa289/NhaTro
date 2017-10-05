<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    public function LoaiTaiKhoan()
    {
        return $this->belongsTo('App\LoaiTaiKhoan');
    }
}
