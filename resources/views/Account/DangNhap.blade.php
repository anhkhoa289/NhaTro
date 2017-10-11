@extends('Layout.Master')
@section('title','Đăng Nhập')
@section('main')
<div class="account">
    <h1>Đăng Nhập</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="row form-dang-nhap">
                {!! Form::open(['url' => 'Account/DangNhap','id'=>'dangnhap', 'data-toggle'=>"validator"]) !!}
                    <div class="form-group{{ $errors->has('tenDangNhap') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('tenDangNhap', 'Tên đăng nhập') !!}
                        {!! Form::text('tenDangNhap', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors">{{$errors->first('tenDangNhap')}}</div>
                    </div>
                    <div class="form-group{{ $errors->has('matkhau') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('matkhau', 'Mật Khẩu') !!}
                        {!! Form::password('matkhau', ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors">{{$errors->first('matkhau')}}</div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Đăng nhập', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop