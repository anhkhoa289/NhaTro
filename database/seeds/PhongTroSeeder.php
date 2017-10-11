<?php

use Illuminate\Database\Seeder;

class PhongTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('PhongTro')->insert([
            'maPhong' => 1,
            'tenPhong' => 'Phòng trọ Bán Đảo Sơn Trà của Vũ',
            'noiDung' => 'Phục vụ mọi nhu cầu của bạn',
            'tongSoPhong' => 4,
            'soPhongTrong' => 2,
            'gia' => 3000000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Thọ Quang',
            'diaChi' => '1 Yết Kiêu',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2
        ]);
    }
}
