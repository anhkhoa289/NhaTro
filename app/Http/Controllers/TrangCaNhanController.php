<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Model\PhongTro;
use App\Http\Middleware\KiemTraDangNhap;

class TrangCaNhanController extends Controller
{
    public $data;

    // Trang Tổng Quan
    public function nguoiDung(Request $request){
        $this->data['test'] = null;
        return view('TrangCaNhan.TrangTongQuan', $this->data);
    }

    // Thông báo
    public function thongBao(Request $req) {
        $this->data['ThongBao'] = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'));
        return view('TrangCaNhan.ThongBao', $this->data);
    }
    public function updateThongBao(Request $req) {
        $result = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'), $req->skip);
        return response()->json($result);
    }
    public function thongBaoChiTiet(Request $req) {
        if($req->loaiTB == 1) {
            $DanhSachDatCho = app('ThongBaoRepository')->getThongBaoChiTiet($req->TB_id, $req->loaiTB);

            // kiểm tra chủ sở hữu thông báo
            $ThongBao = $DanhSachDatCho[0];
            if($req->session()->get('TaiKhoan.id') !== $ThongBao->TK_id)
                return abort(404);

            $this->data["DanhSachDatCho"] = $DanhSachDatCho;
            $this->data["PhongTro"] = $ThongBao;
            
            if($ThongBao->tinhTrangXem == 0){
                app('ThongBaoRepository')->updateTinhTrangXem($ThongBao->TB_id, 1);
                $TaiKhoan = app('TaiKhoanRepository')->updateSlgThongBao($ThongBao->TK_id, -1);
                $req->session()->put('TaiKhoan', $TaiKhoan);
                foreach($DanhSachDatCho as $v) {
                    app('KhachHangRepository')->updateTinhTrang($v->sdtKhachHang, 0);
                    app('PhongTroRepository')->decreaseLuotDatCho($v->maPhong);
                }
            }
        
            return view('ThongBao.ChiTietDatCho', $this->data);
        }
        if($req->loaiTB == 2) {
            $phongDuyet = app('ThongBaoRepository')->getThongBaoChiTiet($req->TB_id, $req->loaiTB);

            if($req->session()->get('TaiKhoan.id') !== $phongDuyet->TK_id)
                return abort(404);
            
            if($phongDuyet->tinhTrangXem == 0) {
                app('ThongBaoRepository')->updateTinhTrangXem($ThongBao->TB_id, 1);
                $TaiKhoan = app('TaiKhoanRepository')->updateSlgThongBao($phongDuyet->TK_id, -1);
                $req->session()->put('TaiKhoan', $TaiKhoan);
            }

            return view('ThongBao.ChiTietDuyetPhong', $this->data);
        }
    }

    // Phòng của tôi
    public function phongCuaToi(Request $req) {
        $PhongTroCuaToi = app('TaiKhoanRepository')->getPhongTroSoHuu10($req->session()->get('TaiKhoan.id'));
        $this->data['PhongTroCuaToi'] = $PhongTroCuaToi;
        return view('TrangCaNhan.PhongCuaToi', $this->data);
    }
    public function updatePhongCuaToi(Request $req) {
        $result = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'), $req->skip);
        return response()->json($result);
    }
    // Danh sách đặt chỗ
    public function danhSachDatCho(Request $req) {
        $PhongTroCuaToi = app('TaiKhoanRepository')->getPhongTroSoHuu($req->session()->get('TaiKhoan.id'));
        $this->data['PhongTroCuaToi'] = $PhongTroCuaToi;
        return view('TrangCaNhan.DanhSachDatCho', $this->data);
    }
}
