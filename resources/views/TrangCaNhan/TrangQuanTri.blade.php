@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
@if(Session::get('TaiKhoan.loaiTK') === 3)
    <div class="btn-group btn-group-lg btn-group-justified">
        <div class="btn-group btn-group-lg dropdown">
            <button class="btn btn-success my-btn-success dropdown-toggle" data-toggle="dropdown">
                Tài khoản CTV
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{URL::to('Admin/dangky')}}">Cấp mới</a></li>
                <li><a href="{{URL::to('Admin/CapNhatTaiKhoan')}}">Cập nhật loại TK</a></li>
            </ul>
        </div>
        {{--  <a href="#Samsung" class="btn btn-success my-btn-success">Samsung</a>
        <a href="#Sony" class="btn btn-success my-btn-success">Sony</a>  --}}
    </div>
@endif
@stop