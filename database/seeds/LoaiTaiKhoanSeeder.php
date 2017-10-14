<?php

use Illuminate\Database\Seeder;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'KhachHang'
        ]);
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'CTV'
        ]);
        DB::table('LoaiTaiKhoan')->insert([
            'tenLoai' => 'Admin'
        ]);
    }
}
