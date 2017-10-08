<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\TaiKhoanRepository;

class AccountController extends Controller
{
    public function getAllUser(){
        return view('Account/ListUser');
    }

    public function viewDangKy(){
        // $data['diaP'] = resolve('diaPhuong');
        // $data['diaP2'] = DB::table('DiaPhuong')->select('tenTinh')->get();
        // $data['diaP3'] = DB::table('DiaPhuong')->select('tenQuan')->get();
        // $data['diaP2'] = DB::table('DiaPhuong')->select('maTinh', 'tenTinh')->get();
        // $str='[';
        // foreach($data['diaP'] as $tinh){
        //     $str.='{';
        //     $str.= '"'.$tinh->tenTinh.'":[';
        //     //
        //     $str.=']},';//if last not ,
        // }
        // $str.=']';

        // $data['str'] = $str;
        return view('Account/DangKyTaiKhoan');
    }
    public function dangKy(Request $request){
        $kq = resolve(TaiKhoanRepository::class)->add($request->all());
        return $kq;
    }

    public function dangNhap(){
        return view('Account/DangNhap');
    }
}
