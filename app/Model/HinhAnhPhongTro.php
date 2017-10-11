<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HinhAnhPhongTro extends Model
{
    protected $table = 'HinhAnhPhongTro';
    public $incrementing = false;
    // protected $primaryKey = 'maPhong';
    // protected $secondKeyName = 'pathImg';

    // protected function getKeyForSaveQuery()
    // {
    //     //$query->where($this->getKeyName(), '=', $this->getKeyForSaveQuery());
    //     $query->where('secondKeyName', $this->secondKeyName); // <- added line
    
    //     return $query;
    // }
}