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
            'tenLoai' => 'DatCho',
            'mau' => 'Phòng trọ {0} của bạn có người đặt chỗ',
            'ghiChu' => '{0} = maPhong'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'PhanCongDuyet',
            'mau' => 'Phòng {0} đã được phân công cho bạn duyệt',
            'ghiChu' => '{0} = maPhong'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'DaDuyet',
            'mau' => 'Phòng {0} của bạn đã được duyệt',
            'ghiChu' => '{0} = maPhong'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'DaHuy'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'ChuyenNhuongDuyet'
        ]);
        DB::table('LoaiThongBao')->insert([
            'tenLoai' => 'PhanHoi'
        ]);
    }
}
