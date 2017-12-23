<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Trang Admin
     */
    public function quanTri(Request $request){
        $data['test'] = null;
        return view('TrangCaNhan.TrangQuanTri', $data);
    }
    public function viewCapNhatTK(){
        $result = app('LoaiTaiKhoanRepository')->getAll();
        foreach($result as $v)
            $LoaiTaiKhoan[$v->loaiTK] = $v->tenLoai;
        return view('Admin.CapNhatTaiKhoan', ['LoaiTaiKhoan' => $LoaiTaiKhoan]);
    }
    public function capNhatLTK(Request $req) {
        $obj = new \stdClass();
        $obj->search =  $req->search;
        $obj->loai = $req->loai;
        $obj->loaiTK = $req->loaiTK;
        $result = app('TaiKhoanRepository')->updateLoaiTK($obj);
        return view('Admin.KetQuaCapNhat', ["ketQua" => $result]);
    }
    public function kiemTra(Request $req) {
        if($req->loai === "id")
            $count = resolve('TaiKhoanRepository')->get($req->search);
        else
            $count = app('TaiKhoanRepository')->checkUserName($req->search);

            
        if($count != null || $count > 0) 
            return response('Tìm thấy',200)->header('Content-Type', 'text/plain');
        else
            return response('Không tìm thấy', 404)->header('Content-Type', 'text/plain');
    }
}
