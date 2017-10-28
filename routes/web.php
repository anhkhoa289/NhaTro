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
/*
|---------------------------------------------------------------------------------------------------------
|- 04/10/2017              
|- by anhkhoa289          
|---------------------------------------------------------------------------------------------------------
*/


////////////////////////////////////////////////////////////////////
Route::get('testView', function () {
    return view('testView');
});
Route::get('test','TestController@testcode');
Route::post('test/val', 'TestController@testVal');
Route::get('test3/{str}','TestController@encrypt');
Route::get('mongo','TestController@mongo');
Route::post('getQuan','TestController@getQuan');
///////////////////////////////////////////////////////////////////

/*
|---------------------------------------------------------------------------------------------------------
|- General
|---------------------------------------------------------------------------------------------------------
*/
Route::get('/', 'PhongController@trangChu');
Route::post('getQuan','DiaPhuongController@getQuan');

/*
|---------------------------------------------------------------------------------------------------------
|- Tài Khoản
|---------------------------------------------------------------------------------------------------------
*/
Route::get('DangKyTaiKhoan', 'AccountController@viewDangKy');
Route::get('DangNhap', function () {
    return view('Account.DangNhap');
});
Route::get('DangXuat','AccountController@dangXuat');

Route::group(['prefix' => 'Account'], function () {
    Route::post('DangKy','AccountController@dangKy');
    Route::get('DangKy/tdn','AccountController@dangKyCheckTenDangNhap');// AJAX
    Route::get('DangKy/email','AccountController@dangKyCheckEmail');// AJAX
    Route::post('XacNhan','AccountController@xacNhan');
    Route::post('DangNhap','AccountController@dangNhap');
});
Route::group(['prefix' => 'Account', 'middleware' => 'kiemTraDangNhap'], function () {
    Route::get('NguoiDung/{id}','TrangCaNhanController@nguoiDung');
    Route::get('DanhSachDatCho','TrangCaNhanController@danhSachDatCho');
    Route::view('CapNhatAvatar', 'Account.updateAvatar'); // chưa có
});
/*
|---------------------------------------------------------------------------------------------------------
|- Phòng Trọ
|---------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'Phong', 'middleware' => 'kiemTraDangNhap'], function () {
    Route::view('ThemPhong', 'Phong.ThemPhong', ['DiaPhuong' => app('DiaPhuong')]);
    Route::post('ThemPhong','PhongController@themPhong');

});
Route::group(['prefix' => 'Phong'], function(){
    Route::get('{maPhong}', 'PhongController@xemPhong');
    Route::post('LuotClick', 'PhongController@capNhatLuotClick');// AJAX
});


/*
|---------------------------------------------------------------------------------------------------------
|- Khách Hàng
|---------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'KhachHang'], function () {
    Route::get('CheckSDT','KhachHangController@checkSDT');
    Route::post('DangKy','KhachHangController@dangKyDatCho');
    Route::post('XacNhan','KhachHangController@maXacNhan');
    
});