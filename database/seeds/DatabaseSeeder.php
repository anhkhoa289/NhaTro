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
        $this->call(LoaiTaiKhoanSeeder::class);
        $this->call(TaiKhoanSeeder::class);
        $this->call(PhongTroSeeder::class);
        $this->call(HinhAnhPhongTroSeeder::class);
        $this->call(LoaiThongBaoSeeder::class);
    }
}
