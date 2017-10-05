<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    //tablename
    protected $table = 'LoaiTaiKhoan';

    //primary key
    //protected $primaryKey = '';

    //If you wish to use a non-incrementing or a non-numeric primary key
    //public $incrementing = false;

    //time stamp
    //public $timestamps = false;
    //protected $dateFormat = 'U';
    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

    //If you would like to specify a different connection for the model
    //protected $connection = 'connection-name';

    public function TaiKhoan()
    {
        return $this->hasMany('App\TaiKhoan');
    }
}
