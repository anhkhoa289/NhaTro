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

////////////////////////////////////////////////////////////////////
Route::get('testView', function () {
    return view('testView');
});
Route::get('test','TestController@testcode');
Route::post('test/val', 'TestController@testVal');
Route::get('test3/{str}','TestController@encrypt');
///////////////////////////////////////////////////////////////////


Route::get('/', function () {
    return view('HomePage');
});

Route::get('DangKyTaiKhoan', 'AccountController@viewDangKy');
Route::get('DangNhap', function () {
    return view('Account/DangNhap');
});
Route::get('DangXuat','AccountController@dangXuat');

Route::group(['prefix' => 'Account'], function () {
    Route::post('DangKy','AccountController@dangKy');
    Route::get('DangKy/tdn','AccountController@dangKyCheckTenDangNhap');
    Route::get('DangKy/email','AccountController@dangKyCheckEmail');
    Route::get('XacNhan','AccountController@xacNhan');
    Route::post('DangNhap','AccountController@dangNhap');
    Route::get('NguoiDung/{id}','AccountController@nguoiDung');
});
