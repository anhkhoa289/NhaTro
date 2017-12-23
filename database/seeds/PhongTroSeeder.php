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
            'tenPhong' => 'Phòng trọ Bán Đảo Sơn Trà',
            'noiDung' => 'Phục vụ mọi nhu cầu của bạn',
            'tongSoPhong' => 4,
            'soPhongTrong' => 2,
            'dienTich' => 75,
            'gia' => 3000000,
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Sơn Trà',
            'phuong' => 'Phường Thọ Quang',
            'diaChi' => '15 Yết Kiêu',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-10-12 16:14:10',
            'pathImg' => '1/gIrBZaIbE80uYSn2clhI8VWvkrOTq9aU5BJ8hvwc.jpg',
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
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Thuận Phước',
            'diaChi' => '44 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'capNhatLuc' => '2017-10-12 16:14:10',
            'pathImg' => '2/E2TJPvLOyQoI7PwMKtsmjyNs9pRnbLp5JCOWL2yW.jpg',
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
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Thuận Phước',
            'diaChi' => '64 Đống Đa',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 1,
            'capNhatLuc' => '2017-10-12 16:34:15',
            'pathImg' => '3/Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpg',
            'created_at' => '2017-10-12 16:34:15',
            'updated_at' => '2017-10-12 16:34:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 4,
            'tenPhong' => 'Hòa Cường Bắc',
            'noiDung' => "Gần Trường ĐH Ngoại Ngữ.\r\nPhòng Thoáng mát, sáng sủa.\nĐặt cọc trước 3 tháng.",
            'tongSoPhong' => 4,
            'soPhongTrong' => 2,
            'dienTich' => 50,
            'gia' => 3700000,
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Hòa Cường Bắc',
            'diaChi' => '22 Lê Đại',
            'chuNha' => 3,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-11-14 19:54:15',
            'pathImg' => '4/Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpg',
            'created_at' => '2017-11-14 19:54:15',
            'updated_at' => '2017-11-14 19:54:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 5,
            'tenPhong' => 'Đường Lê Đại Hành, Trúc Bạch, Ba Đình Hà Nội',
            'noiDung' => "Nhà rọ thoáng mát, sáng sủa, sạch sẽ",
            'tongSoPhong' => 8,
            'soPhongTrong' => 2,
            'dienTich' => 20,
            'gia' => 355000,
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Trúc Bạch',
            'diaChi' => '22 Lê Đại Hành',
            'chuNha' => 5,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-11-14 19:54:15',
            'pathImg' => '5/Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpg',
            'created_at' => '2017-11-14 19:54:15',
            'updated_at' => '2017-11-14 19:54:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 6,
            'tenPhong' => 'Nguyễn Trung Trực, Ba Đình',
            'noiDung' => "Mọi người liên hệ nhanh không sẽ mất chỗ ngon đấy",
            'tongSoPhong' => 3,
            'soPhongTrong' => 2,
            'dienTich' => 10,
            'gia' => 2500000,
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Nguyễn Trung Trực',
            'diaChi' => '223 Lê Thánh Tông',
            'chuNha' => 5,
            'tinhTrangDuyet' => 1,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-11-14 19:54:15',
            'pathImg' => '6/Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpg',
            'created_at' => '2017-11-14 19:54:15',
            'updated_at' => '2017-11-14 19:54:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 7,
            'tenPhong' => 'Testing 1',
            'noiDung' => "Testing 1",
            'tongSoPhong' => 3,
            'soPhongTrong' => 2,
            'dienTich' => 10,
            'gia' => 2500000,
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Nguyễn Trung Trực',
            'diaChi' => '223 Lê Thánh Tông',
            'chuNha' => 4,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-12-14 19:54:15',
            'pathImg' => '7/readfaweradfdsv234234.jpg',
            'created_at' => '2017-12-14 19:54:15',
            'updated_at' => '2017-12-14 19:54:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 8,
            'tenPhong' => 'Testing 2',
            'noiDung' => "Testing 2",
            'tongSoPhong' => 3,
            'soPhongTrong' => 2,
            'dienTich' => 10,
            'gia' => 6500000,
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Nguyễn Trung Trực',
            'diaChi' => '223 Lê Thánh Tông',
            'chuNha' => 4,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-12-14 19:59:15',
            'pathImg' => '8/1_22516.jpg',
            'created_at' => '2017-12-14 19:59:15',
            'updated_at' => '2017-12-14 19:59:15'
        ]);
        DB::table('PhongTro')->insert([
            'maPhong' => 9,
            'tenPhong' => 'Testing 3',
            'noiDung' => "Testing 3",
            'tongSoPhong' => 3,
            'soPhongTrong' => 2,
            'dienTich' => 30,
            'gia' => 7500000,
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Nguyễn Trung Trực',
            'diaChi' => '223 Lê Thánh Tông',
            'chuNha' => 4,
            'CTVduyet' => 2,
            'capNhatLuc' => '2017-12-14 21:21:15',
            'pathImg' => '9/cho-thue-phong-tro-gia-re-tai-kdc-434-164.jpg',
            'created_at' => '2017-12-14 21:21:15',
            'updated_at' => '2017-12-14 21:21:15'
        ]);
    }
}
