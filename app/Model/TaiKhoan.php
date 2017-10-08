<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'TaiKhoan';
    public $timestamps = false;
    public function LoaiTaiKhoan()
    {
        return $this->belongsTo('App\LoaiTaiKhoan');
    }
}
