@extends('/../Layout/Master')
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

                <div class="col-md-3 trang-chinh">
                    <nav class="underline-nav" data-pjax="" role="navigation">
                        <a href="/anhkhoa289" class="underline-nav-item selected" aria-selected="true" role="tab">
                            Overview</a>
                        <a href="/anhkhoa289?tab=repositories" class="underline-nav-item " aria-selected="false" role="tab">
                            Repositories<span class="Counter badge">11</span></a>
                        <a href="/anhkhoa289?tab=stars" class="underline-nav-item " aria-selected="false" role="tab">
                            Stars<span class="Counter">0</span></a>
                        <a href="/anhkhoa289?tab=followers" class="underline-nav-item " aria-selected="false" role="tab">
                            Followers<span class="Counter">0</span></a>
                        <a href="/anhkhoa289?tab=following" class="underline-nav-item " aria-selected="false" role="tab">
                            Following<span class="Counter">0</span></a>
                    </nav>
                </div>

            </div>{{--  trang-ca-nhan  --}}
        </div>
    </div>
</div>

@stop