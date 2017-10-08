@extends('/../Layout/Master')
@section('title','Danh Sách Người Dùng')
@section('main')

<h1>Test View</h1>
<p>
URL gốc của url:{{url('/')}}<br>
Đường dẫn gốc của thư viện công cộng: {{public_path()}}
</p>
{!! Form::open(['url' => 'Account/DangKy', "class" => "form-inline"]) !!}
        {!! Form::label('tenLoai', 'Tên Loại') !!}
        {!! Form::text('tenLoai', null, ['class' => 'form-control']) !!}
    {!! Form::close() !!}

@stop