@extends('Layout.Master')
@section('title','Kết Quả Đăng Ký')
@section('main')
<div class="account">
    <h1>Kết quả đăng ký</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row form-xac-nhan">
                @if($tinhTrang !== null)
                    <p>Xin chào {{$hoten}}.
                    @if($tinhTrang)
                        Tài khoản của bạn đã được kích hoạt</p>
                    @else
                        Vui lòng nhập mã kích hoạt nhận được từ tin nhắn</p>
                        {!! Form::open(['url' => 'Account/DangKy', 'id'=>'kichhoat', 'data-toggle'=>"validator"]) !!}
                            <div class="form-group">
                                {!! Form::text('ma', null, ['class' => 'form-control',
                                'data-error'=>'Không được bỏ trống', 'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Xác nhận', ['class' => 'btn btn-success']) !!}
                                <a class="btn btn-default my-btn-success" href="{{ URL::to('/')}}">Xác nhận sau</a>
                            </div>
                        {!! Form::close() !!}
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@stop