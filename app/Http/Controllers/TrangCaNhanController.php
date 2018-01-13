<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Model\PhongTro;
use App\Http\Middleware\KiemTraDangNhap;
use Log;

class TrangCaNhanController extends Controller
{
    public $data;

    /**
     * Thông báo
     */
    public function thongBao(Request $req) {
        $this->data['ThongBao'] = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'));
        return view('TrangCaNhan.ThongBao', $this->data);
    }
    public function updateThongBao(Request $req) {
        $result = app('ThongBaoRepository')->get10ThongBao($req->session()->get('TaiKhoan.id'), $req->skip);
        return response()->json($result);
    }
    public function thongBaoChiTiet(Request $req) {
        $ThongBaoChiTiet = app('ThongBaoRepository')->getThongBaoChiTiet($req->TB_id, $req->loaiTB);

        if($req->loaiTB == 1) {
            // kiểm tra chủ sở hữu thông báo
            $ThongBao = $ThongBaoChiTiet[0];
            if($req->session()->get('TaiKhoan.id') !== $ThongBao->TK_id)
                return abort(404);

            $this->data["DanhSachDatCho"] = $ThongBaoChiTiet;
            $this->data["PhongTro"] = $ThongBao;
            
            if($ThongBao->tinhTrangXem == 0){
                app('ThongBaoRepository')->updateTinhTrangXem($ThongBao->TB_id, 1);
                $TaiKhoan = app('TaiKhoanRepository')->updateSlgThongBao($ThongBao->TK_id, -1);
                $req->session()->put('TaiKhoan', $TaiKhoan);
                foreach($ThongBaoChiTiet as $v) {
                    app('KhachHangRepository')->updateTinhTrang($v->sdtKhachHang, 0);
                    app('PhongTroRepository')->decreaseLuotDatCho($v->maPhong);
                }
            }
        
            return view('ThongBao.ChiTietDatCho', $this->data);
        }
        if($req->loaiTB == 2) {
            $phongDuyet = $ThongBaoChiTiet;

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

    /**
     * Phòng của tôi
     */
    public function phongCuaToi(Request $req) {
        return view('TrangCaNhan.PhongCuaToi');
    }
    public function phongCuaToiRender(Request $req) {
        $phongtui = app('TaiKhoanRepository')->getPhongTroSoHuu10($req->session()->get('TaiKhoan.id'), $req->skip);

        for($i = 0; $i < count($phongtui); $i++) {
            $phongtui[$i]->sdt = app('PhongTroRepository')->getSdtDatChoOfMaPhong($phongtui[$i]->maPhong);
            $phongtui[$i]->urlEdit = url("/Account/update/{$phongtui[$i]->maPhong}");
            $phongtui[$i]->backgroundImg = url("/storage/img/{$phongtui[$i]->backgroundImg}");
        }
        return response()->json($phongtui);
        // return response((string) $phongtui, 200)
        //     ->header('Content-Type', 'text/plain');
    }

    public function capNhatPhongTro(Request $req) {
        $phong = app('PhongTroRepository')->get($req->maPhong, $req->session()->get('TaiKhoan.id'));
        if($phong != null) {
            $phong->HinhAnhPhongTro = app('HinhAnhPhongTroRepository')->get($req->maPhong);
            return view('Phong.SuaPhong', ["phong" => $phong]);
        }
        else {
            return redirect()->action(
                'AccountController@canhBao', ['loi' => 'Không tìm thấy phòng của bạn']
            );
        }
    }

    public function updatePhongTro(Request $req) {
        $phong = app('PhongTroRepository')->get($req->maPhong, $req->session()->get('TaiKhoan.id'));
        if($phong != null) {
            $hinhAnh = app('HinhAnhPhongTroRepository')->get($req->maPhong);

            // Xóa ảnh cũ
            $del = true; 
            $a = $req->updatedPhoto;
            foreach($hinhAnh as $v) {
                $del = true;
                if($a != null)
                    foreach($a as $v2) {
                        if($v === $v2) {
                            $del = false;
                            break;
                        }
                    }
                if($del) app('HinhAnhPhongTroRepository')->del($v);
            }

            // Thêm ảnh mới
            if($req->photo !== null)
                $path = app('HinhAnhPhongTroRepository')->add($req->photo, $req->maPhong);


            $newPhong = (object)[
                'maPhong' => $req->maPhong,
                'tongSoPhong' => $req->tongSoPhong,
                'soPhongTrong' => $req->soPhongTrong,
                'dienTich' => $req->dienTich,
                'gia'=> $req->gia,
                'noiDung' => $req->noiDung
            ];

            // Cập nhật ảnh đại diện phòng trọ
            $hinhAnh = app('HinhAnhPhongTroRepository')->get($req->maPhong);
            if(count($hinhAnh) !== 0)
                $newPhong->pathImg = $hinhAnh[0];
            else {
                $newPhong->pathImg = 'defaultImg.jpg';
                app('HinhAnhPhongTroRepository')->insertDefault($req->maPhong);
            }

            // Cập nhật phòng
            app('PhongTroRepository')->update($newPhong);

            return redirect()->action('PhongController@xemPhong', ['maPhong' => $req->maPhong]);
        }
        else
            return redirect()->action(
                'AccountController@canhBao', 
                ['loi' => 'Không tìm thấy phòng của bạn']
            );
    }

    /**
     * Xác thực tài khoản
     */
    public function xacThucTaiKhoan(Request $req) {
        $data['kq'] = $req->session()->get('TaiKhoan');
        return view('Account.KetQuaDangKy', $data);
    }

    /**
     * Xóa phòng
     */
    public function xoaPhong(Request $req) {
        app('PhongTroRepository')->deletePhongTro($req->maPhong);
        return response('success',200)->header('Content-Type', 'text/plain');
    }

    /**
     * Ẩn phòng
     */
    public function anPhong(Request $req) {
        app('PhongTroRepository')->hidePhongTro($req->maPhong, $req->tinhTrangHienThi);
        return response('success',200)->header('Content-Type', 'text/plain');
    }
}
