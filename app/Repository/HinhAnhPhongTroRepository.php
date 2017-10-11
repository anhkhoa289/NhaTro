<?php
namespace App\Repository;

use App\Model\HinhAnhPhongTro;
use Illuminate\Support\Facades\DB;

class HinhAnhPhongTroRepository
{
    public $HinhAnhPhongTro;
    
    public function __construct(HinhAnhPhongTro $HinhAnhPhongTro)
    {
        $this->HinhAnhPhongTro = $HinhAnhPhongTro;
    }
    public function add($photos, $maPhong)
    {
        foreach($photos as $photo){
            $path = $photo->store('public/img/'.$maPhong);
            $count = strlen('public/img/'.$maPhong.'/');
            $path = substr($path,$count);

            DB::table('HinhAnhPhongTro')->insert(
                ['maPhong' => $maPhong, 'pathImg' => $path]
            );
        }
        // $this->HinhAnhPhongTro->maPhong = $maPhong;
        // $this->HinhAnhPhongTro->pathImg = $pathImg;
        // $this->HinhAnhPhongTro->save();
    }
}
