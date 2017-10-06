@extends('/../Layout/Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">
</div>
    <h1>Đăng ký tài khoản</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="row">
    {!! Form::open(['url' => 'Account/DangKy']) !!}
        <div class="form-group col-md-4">
            {!! Form::label('holot', 'Họ lót') !!}
            {!! Form::text('holot', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('ten', 'Tên') !!}
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-md-12">
            {!! Form::label('gioiTinh', 'Giới tính') !!}
            <label class="radio-inline">{!! Form::radio('gioiTinh', 'M') !!} Nam</label>
            <label class="radio-inline">{!! Form::radio('gioiTinh', 'F') !!} Nữ</label>
            <label class="radio-inline">{!! Form::radio('gioiTinh', 'U', true) !!} Không xác định</label>
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('ngSinh', 'Ngày Sinh') !!}
            <div class='input-group date' id='datetimepicker1'>
                {!! Form::text('ngSinh', null, ['class' => 'form-control']) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        <div class="clearfix visible-lg-block"></div>

        <div class="form-group col-md-4">
            {!! Form::label('tinh', 'Tỉnh/Thành phố') !!}
            {!! Form::select('tinh',['01' => 'Hà Nội', '02'=> 'Sài Gòn', '04'=>'Đà Nẵng'], 
            null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('quan', 'Quận/Huyện') !!}
            {!! Form::select('quan',['01' => 'Hải Châu', '02'=> 'Sơn Trà', '04'=>'Thanh Khê'], 
            null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('phuong', 'Phường/Xã') !!}
            {!! Form::select('phuong',['01' => 'Hòa Cường Băc', '02'=> 'Hòa Thuận Tây', '04'=>'Thuận Phước'], 
            null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('cmnd', 'CMND') !!}
            {!! Form::number('cmnd', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('sdt', 'Số điện thoại') !!}
            {!! Form::number('sdt', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group  col-md-4">
            {!! Form::label('matkhau', 'Mật Khẩu') !!}
            {!! Form::password('matkhau', ['class' => 'form-control']) !!}
        </div>

        <div class="clearfix"></div>

        <div class="form-group  col-md-10">
            {!! Form::submit('Đăng ký', ['class' => 'btn btn-default']) !!}
            Bấm đăng ký nghĩa là bạn đồng ý với mọi điều khoản của chúng tôi
        </div>
    {!! Form::close() !!}
    </div>
    </div>
</div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@stop