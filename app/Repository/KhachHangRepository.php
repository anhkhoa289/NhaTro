<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\KhachHang;

class KhachHangRepository
{
    public $KhachHang;

    public function __construct(KhachHang $KhachHang){
        $this->KhachHang = $KhachHang;
    }

    public function get($sdt) {
        return $this->KhachHang::find($sdt);
    }

    public function insert(Request $req) {
        $this->KhachHang->sdtKhachHang = $req->sdtKhachHang;
        $this->KhachHang->maXacNhan = str_random(6);
        $this->KhachHang->save();
        return $this->KhachHang->maXacNhan;
    }
    public function refreshMaXacNhan($sdt) {
        /*$KhachHang->maXacNhan = str_random(6);
        $KhachHang->save();
        return $KhachHang->maXacNhan;*/
        $this->KhachHang = $this->get($sdt);
        $this->KhachHang->maXacNhan = str_random(6);
        $this->KhachHang->save();
        return $this->KhachHang->maXacNhan;
    }
    public function updateTinhTrang($sdt, $tinhTrang) {
        $this->KhachHang = $this->get($sdt);
        $this->KhachHang->tinhTrangDatCho = $tinhTrang;
        $this->KhachHang->save();
    }
}