<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('LoaiTaiKhoan')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'KhachHang'
        ]);
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'CTV'
        ]);
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'Admin'
        ]);

        DB::table('TaiKhoan')->insert([
            'holot' => 'Nguyễn Hữu Anh',
            'ten' => 'Khoa',
            'gioiTinh' => 'M',
            'ngSinh' => '1994-09-28',
            'email' => 'anhkhoa2890@gmail.com',
            'sdt' => '01299223590',
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Hòa Cường Bắc',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => '1',
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'anhkhoa289',
            'matkhau' => '1234',
            'loaiTK' => 3
        ]);
        DB::table('TaiKhoan')->insert([
            'holot' => 'Nguyễn Hoàng Minh',
            'ten' => 'Thi',
            'gioiTinh' => 'F',
            'ngSinh' => '1996-03-05',
            'email' => 'thihoang@gmail.com',
            'sdt' => '0122345678',
            'tinh' => 'tp Đà Nẵng',
            'quan' => 'Hải Châu',
            'phuong' => 'Hòa Cường Bắc',
            'diaChi' => '44 Huỳnh Tấn Phát',
            'tinhTrangHoatDong' => '1',
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'thi12345',
            'matkhau' => '1234',
            'loaiTK' => 2
        ]);
        DB::table('TaiKhoan')->insert([
            'holot' => 'Mai Tuấn',
            'ten' => 'Vũ',
            'gioiTinh' => 'M',
            'ngSinh' => '1994-12-30',
            'email' => 'maituanvu.com@gmail.com',
            'sdt' => '0121234345656',
            'tinh' => 'Hà Nội',
            'quan' => 'Ba Đình',
            'phuong' => 'Hàng trống',
            'diaChi' => '44 Tân Hiệp Phát',
            'tinhTrangHoatDong' => '1',
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'vu1234',
            'matkhau' => '1234',
            'loaiTK' => 1
        ]);
        DB::table('TaiKhoan')->insert([
            'holot' => 'Mai Kim',
            'ten' => 'Anh',
            'gioiTinh' => 'F',
            'ngSinh' => '1996-12-30',
            'email' => 'anh123123@gmail.com',
            'sdt' => '01234345656',
            'tinh' => 'Hà Nội',
            'quan' => 'Ba Đình',
            'phuong' => 'Hàng trống',
            'diaChi' => '44 Tân Hiệp Phát',
            'tinhTrangHoatDong' => '1',
            'maKichHoat'=> str_random(6),
            'tenDangNhap' => 'anh1234',
            'matkhau' => '1234',
            'loaiTK' => 1,
            'CTVHoTro' => 'thi12345'
        ]);
    }
}
