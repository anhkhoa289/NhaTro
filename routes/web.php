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
Route::get('test','TestController@getLoaiTaiKhoan');

Route::get('DangKyTaiKhoan', function () {
    return view('Account/DangKyTaiKhoan');
});
Route::get('DangNhap', 'AccountController@dangNhap');

Route::group(['prefix' => 'Account'], function () {
    Route::post('DangKy','AccountController@dangky');
});
