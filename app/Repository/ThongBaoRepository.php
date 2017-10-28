<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\ThongBao;

class ThongBaoRepository
{
    public $ThongBao;

    public function __construct(ThongBao $ThongBao){
        $this->ThongBao = $ThongBao;
    }

    public function insert($datcho) {
        $this->ThongBao->loaiTB = $datcho['loaiTB'];
        $this->ThongBao->TK_id = $datcho['TK_id'];
        $this->ThongBao->maLienKet = $datcho['maPhong'];
        $this->ThongBao->save();
        return $this->ThongBao->id;
    }
}