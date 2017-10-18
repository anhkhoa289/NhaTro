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
            'dienTich' => 75,
            'gia' => 3000000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Sơn Trà',
            'phuong' => 'Thọ Quang',
            'diaChi' => '1 Yết Kiêu',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2,
            'pathImg' => 'gIrBZaIbE80uYSn2clhI8VWvkrOTq9aU5BJ8hvwc.jpeg',
            'created_at' => '2017-10-12 16:14:10',
            'updated_at' => '2017-10-12 16:14:10'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 2,
            'tenPhong' => 'Phòng Thanh Khê',
            'noiDung' => "Gần Trường CĐ.\nĐặt cọc trước 3 tháng.",
            'tongSoPhong' => 7,
            'soPhongTrong' => 3,
            'dienTich' => 25,
            'gia' => 1500000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Thuận Phước',
            'diaChi' => '44 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'pathImg' => 'E2TJPvLOyQoI7PwMKtsmjyNs9pRnbLp5JCOWL2yW.jpeg',
            'created_at' => '2017-10-12 16:14:10',
            'updated_at' => '2017-10-12 16:14:10'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 3,
            'tenPhong' => 'Phòng Trọ Thanh Khê',
            'noiDung' => "Gần Trường CĐ.\r\nPhòng hạng sang.\nĐặt cọc trước 2 tháng.",
            'tongSoPhong' => 7,
            'soPhongTrong' => 3,
            'dienTich' => 50,
            'gia' => 2500000,
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Thuận Phước',
            'diaChi' => '64 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'pathImg' => 'Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpeg',
            'created_at' => '2017-10-12 16:34:15',
            'updated_at' => '2017-10-12 16:34:15'
        ]);
    }
}
