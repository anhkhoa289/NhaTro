@extends('Layout.Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">
    <h1>Cập nhật tài khoản</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                {!! Form::open(['url' => 'Admin/CapNhatLTK', 'id'=>'dangKy']) !!}
                <div class="row">
                    <div class="col-md-12"><h4>Tìm người dùng có sẵn<h4></div>
                    <div class="form-group col-md-4">
                        {!! Form::label('search', 'Tìm kiếm') !!}
                        {!! Form::text('search', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', "required", 'onchange' => 'kiemtra()']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('loai', 'Loại tìm kiếm') !!}
                        {!! Form::select('loai', ['id' => 'ID', 'tdn' => 'Tên Đăng Nhập'], null, 
                        ['class' => 'form-control', 'onchange' => 'kiemtra()']) !!}
                    </div>
                </div>

                <div class="page-header"></div>

                <div class="row">
                    <div class="col-md-12"><h4>Cập nhật loại tài khoản</h4></div>
                    
                    <div class="form-group col-md-4">
                        {!! Form::label('loaiTK', 'Loại') !!}
                        {!! Form::select('loaiTK', $LoaiTaiKhoan, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <a class="btn btn-default" href="{{ URL::to('/')}}">Hủy bỏ</a>
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-success my-btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    $(':submit').attr('disabled', true);
    function kiemtra(input){
        $.ajax({
            type: 'GET',
            dataType: 'text',
            url: "/Admin/KiemTra",
            data: { 
                "_token": '{{ csrf_token() }}', 
                'search': $("#search").val(),
                'loai': $("#loai").val()
            },
            success : function (res,status) {
                console.log(res + " " + status);
                $("#search").parent().removeClass('has-error has-danger')
                $("#search").next().text('Tìm thấy')
                $(':submit').attr('disabled', false);
            },
            error : function () {
                $("#search").parent().addClass('has-error has-danger')
                $("#search").next().text('Không tìm thấy')
                $(':submit').attr('disabled', true);
            }
        })
    }
</script>
@stop