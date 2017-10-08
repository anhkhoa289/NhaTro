@extends('/../Layout/Master')
@section('title','Danh Sách Người Dùng')
@section('main')

<h1>Test View</h1>
<p>
URL gốc của url:{{url('/')}}<br>
Đường dẫn gốc của thư viện công cộng: {{public_path()}}
</p>
    {!! Form::open(['url' => 'test', 'name' => "myForm", 'id'=>'myForm',
    'onsubmit'=>"return validateForm()",
    'data-toggle'=>"validator" ]) !!}
        <div class="form-group">
            {!! Form::label('ho', 'Họ') !!}
            {!! Form::text('ho', null, ['class' => 'form-control', 'data-remote'=>"/test/val"]) !!}
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            {!! Form::label('ten', 'Tên') !!}
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
            <div class="help-block with-errors"></div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group  col-md-10">
            {!! Form::submit('Đăng ký', ['class' => 'btn btn-default']) !!}
            Bấm đăng ký nghĩa là bạn đồng ý với mọi điều khoản của chúng tôi
        </div>
    {!! Form::close() !!}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <script>
        //$('#myForm').validator();
    </script>


@stop