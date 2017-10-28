@extends('Layout.Master')
@section('title',Session::get('TaiKhoan.ten'))
@section('main')
<div class="account">
    <div class="row">
        <div class="col-md-12">
            <div class="row trang-ca-nhan">

            
                <div class="col-md-3 thanh-ben">{{--  thanh bên  --}}
                    <div class="avatar">
                        <a href="{{ URL::to('Account/NguoiDung/'.Session::get('TaiKhoan.id'))}}">
                            <img src="{{asset('img/user_1.jpg')}}" alt="user_1">
                        </a>
                    </div>
                    <div class="name">
                        <h1>{{Session::get('TaiKhoan.ten')}}</h1>
                    </div>
                </div>{{--  hết thanh bên  --}}

                <div class="col-md-9 trang-chinh">
                    <nav class="underline-nav" data-pjax="" role="navigation">
                        <a href="{{ URL::to('Account/NguoiDung/'.Session::get('TaiKhoan.id'))}}" 
                            class="underline-nav-item {{Request::is('Account/NguoiDung/*')?'selected':''}}" 
                            aria-selected="true" role="tab">
                            Tổng quan</a>
                        <a href="#" class="underline-nav-item " aria-selected="false" role="tab">
                            Thông báo <span class="Counter">11</span></a>
                        <a href="#" class="underline-nav-item " aria-selected="false" role="tab">
                            Phòng trọ của tôi <span class="Counter">0</span></a>
                        <a href="{{ URL::to('Account/DanhSachDatCho/')}}" 
                            class="underline-nav-item {{Request::is('Account/DanhSachDatCho*')?'selected':''}}" 
                            aria-selected="false" role="tab">
                            Danh sách đăng ký đặt chỗ <span class="Counter">{{$soLuongKhachHangDatCho}}</span></a>
                        <a href="#" class="underline-nav-item " aria-selected="false" role="tab">
                            Following <span class="Counter">0</span></a>
                    </nav>
                    
                    @yield('trangCaNhan')

                </div>

            </div>{{--  trang-ca-nhan  --}}
        </div>
    </div>
</div>

@stop