@extends('/../Layout/Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">
</div>
    <h1>Đăng ký</h1>

    {!! Form::open(['url' => 'Account/DangKy', "class" => "form-inline"]) !!}
        {!! Form::label('tenLoai', 'Tên Loại') !!}
        {!! Form::text('tenLoai', null, ['class' => 'form-control']) !!}
    {!! Form::close() !!}
@stop