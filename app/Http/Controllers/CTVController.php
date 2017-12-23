<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class CTVController extends Controller
{
    public function viewDanhSachPhongDuyet(Request $req) {
        return view('CTV.DanhSachPhongDuyet');
    }
    public function danhSachPhongDuyet(Request $req) {
        $result = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'), $req->skip, 2);
        return response()->json($result);
    }
    public function updateTinhTrangDuyet(Request $req) {
        $kq = app('PhongTroRepository')->updateTinhTrangDuyet($req->session()->get('TaiKhoan.id'), $req->maPhong, $req->tinhTrangDuyet);
        return response('success', 200)->header('Content-Type', 'text/plain');
    }
    public function viewPhongDuyet(Request $req) {
        
    }

    public function duyetPhong(Request $req) {
        // Thông báo cho chủ nhà
        $ThongBao = (object) [
            'tenTB' => 'DaDuyet',
            'TK_id' => $phongDuyet->chuNha,
            'maLienKet' => $phongDuyet->maPhong
        ];
        app('ThongBaoRepository')->insert($ThongBao);
        app('TaiKhoanRepository')->updateSlgDuyet($phongDuyet->TK_id, -1);
    }
}
