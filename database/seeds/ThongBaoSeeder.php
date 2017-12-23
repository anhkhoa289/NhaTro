<?php

use Illuminate\Database\Seeder;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ThongBao')->insert([
            'loaiTB' => 2,
            'TK_id' => 2,
            'maLienKet' => 7,
            'noiDung' => 'Phòng {0} đã được phân công cho bạn duyệt',
            'thGianCapNhat' => '2017-12-14 19:54:15'
        ]);
        DB::table('ThongBao')->insert([
            'loaiTB' => 2,
            'TK_id' => 2,
            'maLienKet' => 8,
            'noiDung' => 'Phòng {0} đã được phân công cho bạn duyệt',
            'thGianCapNhat' => '2017-12-14 19:59:15'
        ]);
        DB::table('ThongBao')->insert([
            'loaiTB' => 2,
            'TK_id' => 2,
            'maLienKet' => 9,
            'noiDung' => 'Phòng {0} đã được phân công cho bạn duyệt',
            'thGianCapNhat' => '2017-12-14 21:21:15'
        ]);
    }
}
