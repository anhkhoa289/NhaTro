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
        $path = '';
        foreach($photos as $photo){
            $path = $photo->store('public/img/'.$maPhong);
            $count = strlen('public/img/');
            $path = substr($path,$count);

            DB::table('HinhAnhPhongTro')->insert(
                ['maPhong' => $maPhong, 'pathImg' => $path]
            );
        }
        return $path;
        // $this->HinhAnhPhongTro->maPhong = $maPhong;
        // $this->HinhAnhPhongTro->pathImg = $pathImg;
        // $this->HinhAnhPhongTro->save();
    }
    public function get($maPhong){
        
        // trả về mảng của đối tượng có chưa tên cột và giá trị
        // $photos = DB::table('HinhAnhPhongTro')->where('maPhong',$maPhong)->get(['pathImg']);

        // trả về mảng các giá trị của cột
        $photos = DB::table('HinhAnhPhongTro')->where('maPhong',$maPhong)->pluck('pathImg');
        if($photos->count() === 0) return null;
        else return $photos;
    }
}
