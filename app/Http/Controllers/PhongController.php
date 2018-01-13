<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ThemPhongTroRequest;
use Log;

class PhongController extends Controller
{
    public function trangChu(){
        $data['daDuyet'] = app('PhongTroRepository')->getApproval();
        $data['chuaDuyet'] = app('PhongTroRepository')->getUnapproval();
        return view('HomePage',$data);
    }

    public function trangChuReact(Request $req) {
        $result = new \stdClass;

        $result->result = app('PhongTroRepository')->get10($req->skip, $req->cond);
        return response()->json($result);
    }

    public function themPhong(ThemPhongTroRequest $req){
        
        DB::beginTransaction();
        // Thêm Phòng trọ vào CSDL
        $maPhong = app('PhongTroRepository')->add($req, $req->session()->get('TaiKhoan.id'));

        // Thêm hình ảnh vào CSDL
        if($req->photo !== null){
            $path = app('HinhAnhPhongTroRepository')->add($req->photo, $maPhong);
            app('PhongTroRepository')->updatePhoto($maPhong,$path);
        }
        else {
            $path = 'defaultImg.jpg';
            app('PhongTroRepository')->updatePhoto($maPhong,$path);
        }
        // Tăng số lượng phòng trọ sở hữu
        $TaiKhoan = app('TaiKhoanRepository')->updateSlgPhongTroSoHuu($req->session()->get('TaiKhoan.id'), 1);

        // Cập nhật lại Session của người dùng
        $req->session()->put('TaiKhoan', $TaiKhoan);

        // Tìm CTV Phù hợp
        $CTV = app('TaiKhoanRepository')->getCTV($req->tinh, $req->quan, $req->phuong);
        if($CTV->count() == 0) {
            $CTV = app('TaiKhoanRepository')->getCTV($req->tinh, $req->quan);
            if($CTV->count() == 0) {
                $CTV = app('TaiKhoanRepository')->getCTV($req->tinh);
                if($CTV->count() == 0) {
                    $CTV = app('TaiKhoanRepository')->getCTV();
                }
            }
        }
        $min = app('TaiKhoanRepository')->getMin($CTV);
        $CTVduyet = null;
        foreach($CTV as $val)
            if($val->slgDuyet <= $min && $req->session()->get('TaiKhoan.id') != $val->id)
                $CTVduyet = $val->id;


        // Cập nhật CTV cho phòng trọ
        app('PhongTroRepository')->updateCTVduyet($maPhong, $CTVduyet);

        // Thông báo cho CTV
        $thongBao = (object)[
            'tenTB' => 'PhanCongDuyet',
            'TK_id' => $CTVduyet,
            'maLienKet' => $maPhong
        ];
        app('ThongBaoRepository')->insert($thongBao);
        app('TaiKhoanRepository')->updateSlgThongBao($CTVduyet, 1);
        app('TaiKhoanRepository')->updateSlgDuyet($CTVduyet, 1);

        DB::commit();
            
        return redirect('Phong/'.$maPhong);
    }
    public function xemPhong(Request $req){
        $phongTro = app('PhongTroRepository')->get($req->maPhong);

        // Kiểm tra phòng có bị khóa / có phải CTV của phòng đang xem / có phải là admin
        if($phongTro->tinhTrangDuyet == 2) {
            if($phongTro->CTVduyet == $req->session()->get('TaiKhoan.id')) {}
            else if($req->session()->get('TaiKhoan.loaiTK') == 3) {}
            else return abort(404);
        }

        $data['PhongTro'] = $phongTro;
        $data['photos'] = app('HinhAnhPhongTroRepository')->get($req->maPhong);
        $data['chuNha'] = app('TaiKhoanRepository')->get($data['PhongTro']->chuNha);
        if($data['PhongTro']->tinhTrangDuyet === 1) 
            $data["CTV"] = app('TaiKhoanRepository')->get($data['PhongTro']->CTVduyet);
        else
            $data["CTV"] = null;
        
        if($req->session()->get('TaiKhoan.id') === $data['PhongTro']->CTVduyet)
            $data["ChucNanngDuyet"] = true;
        else
            $data["ChucNanngDuyet"] = false;
        return view('Phong.XemPhong',$data);
    }
    public function capNhatLuotClick(Request $request) {
        app('PhongTroRepository')->updateClicked($request->maPhong);
        return response("hihi",200)->header('Content-Type', 'text/plain');
    }
}
