<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('HomePage');
});
Route::get('testView', function () {
    return view('testView');
});
Route::post('test','TestController@testValidate');
Route::post('test/val', 'TestController@testVal');

Route::get('DangKyTaiKhoan', 'AccountController@viewDangKy');
Route::get('DangNhap', 'AccountController@dangNhap');

Route::group(['prefix' => 'Account'], function () {
    Route::post('DangKy','AccountController@dangKy');
    Route::get('DangKy/tdn','AccountController@dangKyCheckTenDangNhap');
    Route::get('DangKy/email','AccountController@dangKyCheckEmail');
});
