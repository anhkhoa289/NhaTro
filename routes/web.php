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
Route::get('testreact', function() {
    return view('testReact');
});
Route::get('testreact2', function() {
    return view('testReact');
});
///////////////////////////////////////////////////////////////////

/*
|---------------------------------------------------------------------------------------------------------
|- General
|---------------------------------------------------------------------------------------------------------
*/
Route::get('/', 'PhongController@trangChu');
Route::post('getTinhs','DiaPhuongController@getTinhs');
Route::post('getQuan','DiaPhuongController@getQuan');
Route::post('TrangChuReact', 'PhongController@trangChuReact');
Route::get('CanhBao', 'AccountController@canhBao');
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
Route::group(['prefix' => 'Account', 'middleware' => ['kiemTraDangNhap', 'kiemTraKhoaTaiKhoan']], function () {

    Route::get('ThongBao','TrangCaNhanController@thongBao');
    Route::get('UpdateThongBao','TrangCaNhanController@updateThongBao'); // AJAX
    Route::get('ThongBaoChiTiet/{loaiTB}/{TB_id}','TrangCaNhanController@thongBaoChiTiet');

    Route::get('PhongCuaToi','TrangCaNhanController@phongCuaToi');
    Route::get('render', 'TrangCaNhanController@phongCuaToiRender'); // AJAX

    Route::post('delete','TrangCaNhanController@xoaPhong')
        ->middleware('kiemTraTinhTrangHoatDongTaiKhoan'); // AJAX
    Route::post('hide','TrangCaNhanController@anPhong')
        ->middleware('kiemTraTinhTrangHoatDongTaiKhoan'); // AJAX
    Route::get('update/{maPhong}','TrangCaNhanController@capNhatPhongTro')
        ->middleware('kiemTraTinhTrangHoatDongTaiKhoan');

    Route::post('capnhatphong','TrangCaNhanController@updatePhongTro')
        ->middleware('kiemTraTinhTrangHoatDongTaiKhoan');


    Route::get('XacThucTaiKhoan','TrangCaNhanController@xacThucTaiKhoan');
    
    Route::view('CapNhatAvatar', 'Account.updateAvatar'); // chưa có
});
/*
|---------------------------------------------------------------------------------------------------------
|- Phòng Trọ
|---------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'Phong', 'middleware' => ['kiemTraDangNhap', 'kiemTraKhoaTaiKhoan']], function () {
    Route::view('ThemPhong', 'Phong.ThemPhong', ['DiaPhuong' => app('DiaPhuong')])
        ->middleware('kiemTraTinhTrangHoatDongTaiKhoan');
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

/*
|---------------------------------------------------------------------------------------------------------
|- CTV
|---------------------------------------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'CTV', 
    'middleware' => [
        'kiemTraDangNhap', 
        'kiemTraTinhTrangHoatDongTaiKhoan',
        'kiemTraCTVvaAdmin',
        'kiemTraKhoaTaiKhoan'
    ]
], function () {
    Route::get('DanhSachPhongDuyet','CTVController@viewDanhSachPhongDuyet');
    Route::post('GetDanhSachPhongDuyet','CTVController@danhSachPhongDuyet');
    Route::post('UpdateTinhTrangDuyet','CTVController@updateTinhTrangDuyet');
    
});

/*
|---------------------------------------------------------------------------------------------------------
|- Admin
|---------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'Admin', 'middleware' => ['kiemTraDangNhap','kiemTraAdmin']], function () {
    Route::get('QuanTri','AdminController@quanTri');
    Route::get('CapNhatTaiKhoan','AdminController@viewCapNhatTK');
    Route::post('CapNhatLTK','AdminController@capNhatLTK');
    Route::get('KiemTra','AdminController@kiemTra'); // AJAX
    
});