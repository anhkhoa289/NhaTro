<?php

use Illuminate\Database\Seeder;

class LoaiThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'DatCho'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'PhanCongDuyet'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'PhanHoi'
        ]);
    }
}
