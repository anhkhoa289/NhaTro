<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function themPhong(Request $req){

        
        $maPhong = 1;

        if($req->photo !== null)
            app('HinhAnhPhongTroRepository')->add($req->photo, $maPhong);
        return 'hihi';
    }
}
