<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAllUser(){
        return view('Account/ListUser');
    }

    public function dangKy(){
        return view('Account/Dangky');
    }

    public function dangNhap(){
        return view('Account/DangNhap');
    }
}
