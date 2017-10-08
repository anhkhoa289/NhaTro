<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\TaiKhoanRepository;

class AccountController extends Controller
{
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
    public function dangNhap(){
        return view('Account/DangNhap');
    }
    public function dangKy(DangKyTaiKhoanRequest $request){
        $kq = resolve(TaiKhoanRepository::class)->add($request->all());
        return $kq;
    }

    //Kiểm tra tồn tại tên đăng nhập và email bằng AJAX của Jquery
    public function dangKyCheckTenDangNhap(Request $request){
        $count = resolve(TaiKhoanRepository::class)->checkUserName($request->tenDangNhap);
        if($count === 0) 
            return response('Bạn có thể sử dụng tên đăng nhập này',200)->header('Content-Type', 'text/plain');
        else
            return response('Tên đăng nhập này đã được sử dụng', 400)->header('Content-Type', 'text/plain');
    }
    public function dangKyCheckEmail(Request $request){
        $count = resolve(TaiKhoanRepository::class)->checkEmail($request->email);
        if($count === 0) 
            return response('Bạn có thể sử dụng email này',200)->header('Content-Type', 'text/plain');
        else
            return response('Email này đã được sử dụng', 400)->header('Content-Type', 'text/plain');
    }
}
