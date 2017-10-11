<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemPhongTroRequest;
class PhongController extends Controller
{
    public function themPhong(ThemPhongTroRequest $req){

        //$req->chuNha = $req->session()->get('TaiKhoan.id');
        $maPhong = app('PhongTroRepository')->add($req, $req->session()->get('TaiKhoan.id'));

        if($req->photo !== null)
            app('HinhAnhPhongTroRepository')->add($req->photo, $maPhong);
        return 'hihi';
    }
}
