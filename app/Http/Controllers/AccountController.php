<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\TaiKhoanRepository;
use App\Http\Requests\DangkyTaiKhoanRequest;
use App\Http\Requests\XacNhanRequest;
use Auth;
class AccountController extends Controller
{
    
    public function dangXuat(Request $request){
        //$request->session()->forget('TaiKhoan');
        $request->session()->flush();
        return redirect('/');
    }
    public function dangNhap(Request $request){
        if($request->session()->has('TaiKhoan'))
            return redirect('/');
        else{
            $kq = resolve(TaiKhoanRepository::class)->login($request->only('tenDangNhap', 'matkhau'));
            if ($kq === false) {
                return view('Account.DangNhap', ['error'=> 'Tên đăng nhập hoặc mật khẩu không chính xác']);
            }
            else {
                $request->session()->put('TaiKhoan', $kq);
                return redirect('/');
                //return redirect()->back();
            }
        }
    }
    public function dangKy(DangkyTaiKhoanRequest $request){
        $kq = resolve('TaiKhoanRepository')->add($request->all());
        if($kq->id !== 0) {
            $data['kq'] = $kq;
        }
        else
            $data= ['kq'=>null];
        return view('Account.KetQuaDangKy', $data);
    }
    
    public function capNhatSdt(Request $req){
    
    }

    public function xacNhan(Request $request){
        $kq = app('TaiKhoanRepository')->checkMaXacNhan($request->id, $request->maXacNhan);
        if($kq->tinhTrangHoatDong == 1)
            $data['kq'] = $kq;
        else
            $data = ['error' => 'Mã xác nhận không chính xác', 'kq' => $kq];
        return view('Account.KetQuaDangKy', $data);
    }

    //Kiểm tra tồn tại tên đăng nhập và email bằng AJAX của Jquery
    public function dangKyCheckTenDangNhap(Request $request){
        $count = resolve('TaiKhoanRepository')->checkUserName($request->tenDangNhap);
        if($count === 0) 
            return response('Bạn có thể sử dụng tên đăng nhập này',200)->header('Content-Type', 'text/plain');
        else
            return response('Tên đăng nhập này đã được sử dụng', 400)->header('Content-Type', 'text/plain');
    }
    public function dangKyCheckEmail(Request $request){
        $count = resolve('TaiKhoanRepository')->checkEmail($request->email);
        if($count === 0) 
            return response('Bạn có thể sử dụng email này',200)->header('Content-Type', 'text/plain');
        else
            return response('Email này đã được sử dụng', 400)->header('Content-Type', 'text/plain');
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
        $data['DiaPhuong'] = app('DiaPhuong');
        return view('Account.DangKyTaiKhoan', $data);
    }
}
