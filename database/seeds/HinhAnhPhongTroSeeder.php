<?php

use Illuminate\Database\Seeder;

class HinhAnhPhongTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 1,
            'pathImg' => 'gIrBZaIbE80uYSn2clhI8VWvkrOTq9aU5BJ8hvwc.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 1,
            'pathImg' => 'Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 1,
            'pathImg' => 'K6mET8lPJPeNnwKLEBCzj6YctYUhTKnY7iVQEakc.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 2,
            'pathImg' => 'E2TJPvLOyQoI7PwMKtsmjyNs9pRnbLp5JCOWL2yW.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 2,
            'pathImg' => 'HRwpEYn4HhSqWmZi3RH8B2nTXjvq8qIqKAhKUQp9.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 2,
            'pathImg' => 'NWJyz3x79uOPP0nBtff9veaqu83L0dz79nX8LuKh.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 3,
            'pathImg' => 'gIrBZaIbE80uYSn2clhI8VWvkrOTq9aU5BJ8hvwc.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 3,
            'pathImg' => 'Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpeg'
        ]);
        DB::table('HinhAnhPhongTro')->insert([
            'maPhong' => 3,
            'pathImg' => 'K6mET8lPJPeNnwKLEBCzj6YctYUhTKnY7iVQEakc.jpeg'
        ]);
    }
}
