<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CTVController extends Controller
{
    public function duyetPhong() {
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
