<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThemPhongTroRequest;

class PhongController extends Controller
{
    public function trangChu(){
        $data['daDuyet'] = app('PhongTroRepository')->getApproval();
        $data['chuaDuyet'] = app('PhongTroRepository')->getUnapproval();
        return view('HomePage',$data);
    }

    public function themPhong(ThemPhongTroRequest $req){
        //$req->chuNha = $req->session()->get('TaiKhoan.id');
        $maPhong = app('PhongTroRepository')->add($req, $req->session()->get('TaiKhoan.id'),$req->photo);

        if($req->photo !== null){
            $path = app('HinhAnhPhongTroRepository')->add($req->photo, $maPhong);
            app('PhongTroRepository')->updatePhoto($maPhong,$path);
        }
        return redirect('Phong/'.$maPhong);
    }
    public function xemPhong($maPhong){
        $data['PhongTro'] = app('PhongTroRepository')->get($maPhong);
        $data['photos'] = app('HinhAnhPhongTroRepository')->get($maPhong);
        $data['chuNha'] = app('TaiKhoanRepository')->get($data['PhongTro']->chuNha);
        if($data['PhongTro']->tinhTrangDuyet === 1) 
            $data["CTV"] = app('TaiKhoanRepository')->get($data['PhongTro']->CTVduyet);
        else
            $data["CTV"] = null;
        return view('Phong.XemPhong',$data);
    }
    public function capNhatLuotClick(Request $request) {
        app('PhongTroRepository')->updateClicked($request->maPhong);
        return response("hihi",200)->header('Content-Type', 'text/plain');
    }
}
