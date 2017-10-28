<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Model\PhongTro;
use App\Http\Middleware\KiemTraDangNhap;

class TrangCaNhanController extends Controller
{
    public $data;

    public function prepareData(Request $req) {
        $PhongTro = app('TaiKhoanRepository')->getPhongTroSoHuu($req->session()->get('TaiKhoan.id'));
        $count = 0;
        foreach($PhongTro as $v) {
            $count += $v->luotDatCho;
        }
        $this->data['PhongTroCuaToi'] = $PhongTro;
        $this->data['soLuongKhachHangDatCho'] = $count;
    }

    public function nguoiDung(Request $request){
        $this->prepareData($request);
        $this->data['test'] = null;
        return view('TrangCaNhan.TrangTongQuan', $this->data);
    }

    public function danhSachDatCho(Request $request) {
        $this->prepareData($request);
        return view('TrangCaNhan.DanhSachDatCho', $this->data);
    }
}
