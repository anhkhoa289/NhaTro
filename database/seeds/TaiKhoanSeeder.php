<?php

use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TaiKhoan')->insert([
            'id' => 1,
            'holot' => 'Nguyễn Hữu Anh',
            'ten' => 'Khoa',
            'gioiTinh' => 'M',
            'ngSinh' => '1994-09-28',
            'email' => 'anhkhoa2890@gmail.com',
            'sdt' => '01299223590',
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Hòa Cường Bắc',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => 1,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'anhkhoa289',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 3,
            'avatar' => 'avaDefault.jpg'
        ]);
        DB::table('TaiKhoan')->insert([
            'id' => 2,
            'holot' => 'Nguyễn Hoàng Minh',
            'ten' => 'Thi',
            'gioiTinh' => 'F',
            'ngSinh' => '1996-03-05',
            'email' => 'thihoang@gmail.com',
            'sdt' => '0122345678',
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Hòa Cường Bắc',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => 1,
            'slgDuyet' => 3,
            'slgThongBao' => 3,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'thi12345',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 2,
            'avatar' => 'avaDefault.jpg'
        ]);
        DB::table('TaiKhoan')->insert([
            'id' => 3,
            'holot' => 'Mai Tuấn',
            'ten' => 'Vũ',
            'gioiTinh' => 'M',
            'ngSinh' => '1994-12-30',
            'email' => 'maituanvu.com@gmail.com',
            'sdt' => '0121234345656',
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Hoàn Kiếm',
            'phuong' => 'Phường Hàng Đào',
            'diaChi' => '44 Tân Hiệp Phát',
            'tinhTrangHoatDong' => 1,
            'slgPhongTroSoHuu' => 4,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'vu1234',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 1,
            'avatar' => 'avaDefault.jpg'
        ]);
        DB::table('TaiKhoan')->insert([
            'id' => 4,
            'holot' => 'Mai Kim',
            'ten' => 'Anh',
            'gioiTinh' => 'F',
            'ngSinh' => '1996-12-30',
            'email' => 'anh123123@gmail.com',
            'sdt' => '01234345656',
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Ba Đình',
            'phuong' => 'Phường Quán Thánh',
            'diaChi' => '44 Tân Hiệp Phát',
            'tinhTrangHoatDong' => 1,
            'slgPhongTroSoHuu' => 3,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'anh1234',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 1,
            'avatar' => 'avaDefault.jpg'
        ]);
        DB::table('TaiKhoan')->insert([
            'id' => 5,
            'holot' => 'Trần Thị',
            'ten' => 'A',
            'gioiTinh' => 'F',
            'ngSinh' => '1996-07-05',
            'email' => 'ahoang@gmail.com',
            'sdt' => '0122345678',
            'tinh' => 'Hà Nội',
            'quan' => 'Quận Hai Bà Trưng',
            'phuong' => 'Phường Bách Khoa',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => 1,
            'slgPhongTroSoHuu' => 2,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'a12345678',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 2,
            'avatar' => 'avaDefault.jpg'
        ]);
        DB::table('TaiKhoan')->insert([
            'id' => 6,
            'holot' => 'Trần Văn',
            'ten' => 'B',
            'gioiTinh' => 'M',
            'ngSinh' => '1996-08-05',
            'email' => 'bhoang@gmail.com',
            'sdt' => '0122345678',
            'tinh' => 'TP Đà Nẵng',
            'quan' => 'Quận Hải Châu',
            'phuong' => 'Phường Hải Châu I',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => 0,
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'b12345678',
            'matkhau' => bcrypt('1234'),
            'loaiTK' => 2,
            'avatar' => 'avaDefault.jpg'
        ]);
    }
}
