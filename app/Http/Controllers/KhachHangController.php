<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function checkSDT(Request $req) {
        $rs = app('KhachHangRepository')->get($req->sdtKhachHang); // var_dump($rs) === NULL
        if($rs === NULL)
            return response("Bạn có thể đặt chỗ bằng số điện thoại này", 200)
            ->header('Content-Type', 'text/plain');

        // gt = 1,  === true, return false
        // gt = 1,  === false, return false
        // gt = 1,  == true, return true
        // gt = 1,  == false, return false
        // default is ==
        else{
            if($rs->tinhTrangDatCho)
                return response("Bạn đã đặt chỗ bằng số điện thoại này rồi", 403)
                ->header('Content-Type', 'text/plain');
            else
                return response("Bạn có thể đặt chỗ bằng số điện thoại này", 200)
                ->header('Content-Type', 'text/plain');
        }
    }
    public function dangKyDatCho(Request $req) {
        $rs = app('KhachHangRepository')->get($req->sdtKhachHang); // var_dump($rs) === NULL
        if($rs === NULL) {
            $maXacNhan = app('KhachHangRepository')->insert($req);
        }
        else {
            if($rs->tinhTrangDatCho)
                return response("Số điện thoại đang chờ liên hệ. \nVui lòng chờ 5 phút hoặc sử dụng số điện thoại khác.", 200)
                ->header('Content-Type', 'text/plain');
            else {
                $maXacNhan = app('KhachHangRepository')->refreshMaXacNhan($req->sdtKhachHang);
            }
        }
        $req->session()->put('sdtKhachHang', $req->sdtKhachHang);
        $req->session()->put('maXacNhan', $maXacNhan);
        return response('success',200)->header('Content-Type', 'text/plain');
    }
    public function maXacNhan(Request $req) {
        $ma1 = strtoupper($req->maXacNhan);
        $ma2 = strtoupper($req->session()->get('maXacNhan'));
        if($ma1 === $ma2){
            $datcho = [
                'loaiTB' => 1, 
                'maPhong' => $req->maPhong, 
                'TK_id' => $req->chuNha, 
                'sdtKhachHang' => $req->sdtKhachHang
            ];

            DB::beginTransaction();
            $datcho['TB_id'] = app('ThongBaoRepository')->insert($datcho);
            app('DatChoRepository')->insert($datcho);
            app('KhachHangRepository')->updateTinhTrang($req->sdtKhachHang);
            app('PhongTroRepository')->increaseLuotDatCho($req->maPhong);
            DB::commit();
            return response('success',200)->header('Content-Type', 'text/plain');
        }
        else
            return response("fail", 200)->header('Content-Type', 'text/plain');
    }
}
