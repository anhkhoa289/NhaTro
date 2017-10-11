@extends('Layout.Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">

    <h1>Đăng ký tài khoản</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                {!! Form::open(['url' => 'Account/DangKy', 'id'=>'dangKy', 'data-toggle'=>"validator"]) !!}{{----}}
                    <div class="form-group col-md-4{{ $errors->has('holot') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('holot', 'Họ lót') !!}
                        {!! Form::text('holot', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('ten') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('ten', 'Tên') !!}
                        {!! Form::text('ten', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="form-group col-md-12">
                        {!! Form::label('gioiTinh', 'Giới tính') !!}
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'M') !!} Nam</label>
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'F') !!} Nữ</label>
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'U', true) !!} Không xác định</label>
                    </div>

                    <div class="form-group col-md-4{{ $errors->has('ngSinh') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('ngSinh', 'Ngày Sinh') !!}
                        <div class='input-group date' id='ngaySinh' 
                            data-date-format="yyyy-mm-dd">
                            {!! Form::text('ngSinh', null, ['class' => 'form-control',
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="form-group col-md-4{{ $errors->has('tinh') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('tinh', 'Tỉnh/Thành phố') !!}
                        {!! Form::text('tinh', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('quan') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('quan', 'Quận/Huyện') !!}
                        {!! Form::text('quan', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('phuong') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('phuong', 'Phường/Xã') !!}
                        {!! Form::text('phuong', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-8 {{ $errors->has('diaChi') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('diaChi', 'Địa Chỉ') !!}
                        {!! Form::text('diaChi', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    {{--  <div class="form-group col-md-4">
                        {!! Form::label('cmnd', 'CMND') !!}
                        {!! Form::number('cmnd', null, ['class' => 'form-control', 
                        'data-error'=>'Phải có 9 chữ số', 'data-minlength'=>'9', 'maxlength'=>'9','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>  --}}
                    <div class="form-group col-md-4">
                        {!! Form::label('sdt', 'Số điện thoại') !!}
                        {!! Form::number('sdt', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-8{{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control',
                        'data-remote-error'=>'Email này đã được sử dụng',
                        'data-remote'=>'/Account/DangKy/email']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-4{{ $errors->has('tenDangNhap') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('tenDangNhap', 'Tên Đăng Nhập') !!}
                        {!! Form::text('tenDangNhap', null, ['class' => 'form-control', 
                        'data-error'=>'Tối thiểu 6 ký tự', 'required', 'data-minlength'=>'6',
                        'data-remote-error'=>'Tên đăng nhập này đã được sử dụng',
                        'data-remote'=>'/Account/DangKy/tdn']) !!}
                        <div class="help-block with-errors">{{$errors->first('tenDangNhap')}}</div>
                    </div>
                    
                    <div class="form-group col-md-4{{ $errors->has('matkhau') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('matkhau', 'Mật Khẩu') !!}
                        {!! Form::password('matkhau', ['class' => 'form-control', 
                        'data-error'=>'Tối thiểu 6 ký tự', 'data-minlength'=>'6', 'required']) !!}
                        <div class="help-block with-errors">{{$errors->first('matkhau')}}</div>
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('nhaplaimatkhau', 'Nhập lại mật Khẩu') !!}
                        {!! Form::password(null, ['class' => 'form-control', 'id' => 'nhaplaimatkhau',
                        'data-match'=>'#matkhau', 'data-match-error'=>'Mật khẩu không trùng khớp', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-md-10">
                        {!! Form::submit('Đăng ký', ['class' => 'btn btn-success']) !!}
                        Bấm đăng ký nghĩa là bạn đồng ý với mọi điều khoản của chúng tôi
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(function () {
            /*$.fn.datepicker.dates['en'] = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                clear: "Clear",
                format: "mm/dd/yyyy",
                titleFormat: "MM yyyy", // Leverages same syntax as 'format'
                weekStart: 0
                };*/
            $('#ngaySinh').datepicker({
                language: 'vi'
                //startDate: '-3d'
            });
            /*$('#dangKy').validator({
                messages:{
                    email:{
                        remote:""
                    }
                }
            });*/
            /*$('#ngaySinh').dateptimeicker({
                locale: 'vi',
                viewMode: 'years'
            });*/
        });
    </script>
<!--
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
            null, ['class' => 'form-control', 'onchange' => 'log(value)']) !!}
        </div>
    <script type="text/javascript">
            function log(valuee) {
                var x = document.getElementById("phuong");
                console.log(valuee)
            }
        </script>
-->
@stop