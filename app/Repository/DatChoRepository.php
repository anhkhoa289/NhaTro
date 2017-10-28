<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DatCho;

class DatChoRepository
{
    public $DatCho;

    public function __construct(DatCho $DatCho){
        $this->DatCho = $DatCho;
    }

    public function insert($datcho) {
        $this->DatCho->sdtKhachHang = $datcho['sdtKhachHang'];
        $this->DatCho->TB_id = $datcho['TB_id'];
        $this->DatCho->save();
    }
}