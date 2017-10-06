@extends('/../Layout/Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">
</div>
    <h1>Đăng ký</h1>

    {!! Form::open(['url' => 'Account/DangKy']) !!}
        <div class="form-group">
            {!! Form::label('holot', 'Họ lót') !!}
            {!! Form::text('holot', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('ten', 'Tên') !!}
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>

        <label class="radio-inline">{!! Form::radio('gioiTinh', 'M') !!} Nam</label>
        <label class="radio-inline">{!! Form::radio('gioiTinh', 'F') !!} Nữ</label>
        <label class="radio-inline">{!! Form::radio('gioiTinh', 'U', true) !!} Không xác định</label>

        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
                //$('#datetimepicker1').data("DateTimePicker");
            });
        </script>
        <div class="form-group">
            {!! Form::label('matkhau', 'Mật Khẩu') !!}
            {!! Form::password('matkhau', ['class' => 'form-control']) !!}
        </div>
        <div class="checkbox">
            <label>
                {!! Form::checkbox('chect', 'value') !!}
                Remember me
            </label>
        </div>
        {!! Form::submit('Đăng ký', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@stop