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
            'quan' => 'Sơn Trà',
            'phuong' => 'Thọ Quang',
            'diaChi' => '1 Yết Kiêu',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 2,
            'tenPhong' => 'Phòng Thanh Khê',
            'noiDung' => "Gần Trường CĐ cho các bạn Quảng Năm xa sôi\nĐặt cọc trước 3 tháng vì giá khá hời",
            'tongSoPhong' => 7,
            'soPhongTrong' => 3,
            'gia' => 1500000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Thuận Phước',
            'diaChi' => '44 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'created_at' => '2017-10-12 16:14:10',
            'updated_at' => '2017-10-12 16:14:10'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 3,
            'tenPhong' => 'Phòng Thanh Khê',
            'noiDung' => "Gần Trường CĐ cho các bạn Quảng Năm xa sôi\r\nĐặt cọc trước 1 tháng vì là phòng hạng sang, giá hơi cao",
            'tongSoPhong' => 7,
            'soPhongTrong' => 3,
            'gia' => 2500000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Thuận Phước',
            'diaChi' => '64 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'created_at' => '2017-10-12 16:34:15',
            'updated_at' => '2017-10-12 16:34:15'
        ]);
    }
}
