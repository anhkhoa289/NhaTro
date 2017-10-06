<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\LoaiTaiKhoanRepository;

class AccountController extends Controller
{
    public function getAllUser(){
        return view('Account/ListUser');
    }

    public function dangKy(Request $request){
        $kq = resolve(LoaiTaiKhoanRepository::class)->add($request->all());
        return $kq;
    }

    public function dangNhap(){
        return view('Account/DangNhap');
    }
}
