@extends('Layout.Master')
@section('title',Session::get('TaiKhoan.ten'))
@section('main')
<div class="account">
    <div class="row">
        <div class="col-md-12">
            <div class="row trang-ca-nhan">

                <div class="col-md-3 thanh-ben">{{--  thanh bên  --}}
                    <div class="avatar">
                        <a href="{{ URL::to('Account/NguoiDung')}}">
                            <img src="{{asset('img/user_1.jpg')}}" alt="user_1">
                        </a>
                    </div>
                    <div class="name">
                        <h1>{{Session::get('TaiKhoan.ten')}}</h1>
                    </div>
                </div>{{--  hết thanh bên  --}}

                <div class="col-md-9 trang-chinh">
                    <nav class="underline-nav" data-pjax="" role="navigation">
                        <a aria-selected="true" role="tab" href="{{ URL::to('Account/NguoiDung')}}" 
                            class="underline-nav-item {{Request::is('Account/NguoiDung')?'selected':''}}">
                            Tổng quan
                        </a>
                        <a aria-selected="false" role="tab" href="{{ URL::to('Account/ThongBao')}}" 
                            class="underline-nav-item {{Request::is('Account/ThongBao*')?'selected':''}}">
                            Thông báo 
                            <span class="Counter">{{Session::get('TaiKhoan.slgThongBao')}}</span></a>
                        <a aria-selected="false" role="tab" href="{{ URL::to('Account/PhongCuaToi')}}" 
                            class="underline-nav-item {{Request::is('Account/PhongCuaToi*')?'selected':''}}">
                            Phòng trọ của tôi 
                            <span class="Counter">{{Session::get('TaiKhoan.slgPhongTroSoHuu')}}</span>
                        </a>
                        <a aria-selected="false" role="tab" href="{{ URL::to('Account/DanhSachDatCho/')}}" 
                            class="underline-nav-item {{Request::is('Account/DanhSachDatCho*')?'selected':''}}" >
                            Danh sách đăng ký đặt chỗ 
                            <span class="Counter">{{Session::get('TaiKhoan.slgDatCho')}}</span>
                        </a>
                        <a  aria-selected="false" role="tab" href="#" class="underline-nav-item">
                            Following 
                            <span class="Counter">0</span>
                        </a>
                    </nav>
                    
                    @yield('trangCaNhan')

                </div>

            </div>{{--  trang-ca-nhan  --}}
        </div>
    </div>
</div>

@stop