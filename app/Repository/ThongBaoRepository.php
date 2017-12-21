<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Model\ThongBao;

class ThongBaoRepository
{
    public $ThongBao;

    public function __construct(ThongBao $ThongBao) {
        $this->ThongBao = $ThongBao;
    }

    public function get($id) {
        return $this->ThongBao->find($id);
    }

    public function insert($TB) {
        $loaiTB = app('LoaiThongBaoRepository')->getByName($TB->tenTB);
        $this->ThongBao->loaiTB = $loaiTB->loaiTB;
        $this->ThongBao->TK_id = $TB->TK_id;
        $this->ThongBao->maLienKet = $TB->maLienKet;
        $this->ThongBao->noiDung = $loaiTB->mau;
        $this->ThongBao->save();
        return $this->ThongBao->id;
    }
    public function get10ThongBao($TK_id, $skip = 0, $loaiTB = null) {
        return DB::table('TaiKhoan')
            ->join('ThongBao', 'TaiKhoan.id', '=', 'ThongBao.TK_id')
            ->join('PhongTro', 'ThongBao.maLienket', '=', 'PhongTro.maPhong')
            ->where('TaiKhoan.id', '=', $TK_id)
            ->select('*', 'ThongBao.noiDung as noiDungTB', 'ThongBao.id as TB_id')
            ->orderBy('thGianCapNhat', 'desc')
            ->skip($skip)
            ->take(10)
            ->get();
    }

    /**
     * Trả về thông báo đặt chỗ gần nhất mà chưa đọc để gộp nhiều đơn đặt chỗ vào 1 thông báo
     * @param maPhong có cùng mã phòng vs nó
     * Lưu ý khi lấy danh sách thông báo thì sắp xếp thèo thời gian cập nhật thông báo giảm dần
     */
    public function getThongBaoDatCho($maPhong) {
        $query = [["tinhTrangXem", "=", 0], ["maLienKet", "=", $maPhong], ['loaiTB', '=', 1]];
        return $this->ThongBao->where($query)->first();
    }

    public function getThongBaoChiTiet($id, $loaiTB) {
        if($loaiTB == 1)
            return DB::table('ThongBao')
                ->join('PhongTro', 'ThongBao.maLienket', '=', 'PhongTro.maPhong')
                ->join('DatCho', 'ThongBao.id', '=', 'DatCho.TB_id')
                ->where([['ThongBao.id', '=', $id], ['loaiTB', '=', 1]])
                ->select('*', 'ThongBao.noiDung as noiDungTB', 'PhongTro.noiDung as NoiDung',
                    'DatCho.created_at as thGianDatCho')
                ->get();
        else
            return DB::table('ThongBao')
                ->join('PhongTro', 'ThongBao.maLienket', '=', 'PhongTro.maPhong')
                ->join('TaiKhoan', 'TaiKhoan.id', '=', 'PhongTro.chuNha')
                ->where([['id', '=', $id], ['loaiTB', '=', 2]])
                ->select('*', 'ThongBao.noiDung as noiDungTB', 'PhongTro.noiDung as NoiDung', 
                    'ThongBao.id as TB_id', 'TaiKhoan.id as chuNha')
                ->first();
    }
    public function updateTinhTrangXem($id, $tinhTrang) {
        $this->ThongBao = $this->ThongBao::find($id);
        $this->ThongBao->tinhTrangXem = $tinhTrang;
        $this->ThongBao->save();
    }

    public function updateThGianCapNhat($id) {
        $this->ThongBao = $this->ThongBao::find($id);
        $this->ThongBao->thGianCapNhat = Carbon::now();
        $this->ThongBao->save();
    }
}