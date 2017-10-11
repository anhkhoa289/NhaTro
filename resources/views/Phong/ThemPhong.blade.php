@extends('Layout.Master')
@section('main')
@section('title','Thêm Phòng')
<div class="phong">
    <h1>Thêm Phòng</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                {!! Form::open(['url' => 'Phong/ThemPhong', 'id'=>'themPhong', 'enctype' => 'multipart/form-data', 'data-toggle'=>"validator"]) !!}
                    
                    <div class="form-group col-md-8">
                        {!! Form::label('photo', 'Hình ảnh minh họa') !!}
                        <div class="file-loading">
                            {!! Form::file('photo[]', ['class' => 'file', 'id' => 'photo', 'multiple', 
                            'data-allowed-file-extensions' => '["jpg", "jpeg", "png"]']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('tenPhong') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('tenPhong', 'Tên Phòng') !!}
                            {!! Form::text('tenPhong', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors">{{ $errors->has('tenPhong') ? $errors->first('tenPhong') : '' }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tongSoPhong', 'Tổng số phòng') !!}
                            {!! Form::number('tongSoPhong', 1, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('soPhongTrong', 'Số phòng trống') !!}
                            {!! Form::number('soPhongTrong', 1, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('gia') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('gia', 'Giá') !!}
                            {!! Form::number('gia', 1000000, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors">{{ $errors->has('gia') ? $errors->first('noiDung') : '' }}</div>
                        </div>
                        <div class="form-group{{ $errors->has('tinh') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('tinh', 'Tỉnh/Thành phố') !!}
                            {!! Form::text('tinh', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('quan') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('quan', 'Quận/Huyện') !!}
                            {!! Form::text('quan', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('phuong') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('phuong', 'Phường/Xã') !!}
                            {!! Form::text('phuong', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="clearfix visible-lg-block"></div>
                        <div class="form-group{{ $errors->has('diaChi') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('diaChi', 'Địa Chỉ') !!}
                            {!! Form::text('diaChi', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('noiDung') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('noiDung', 'Nội dung') !!}
                            {!! Form::textarea('noiDung', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors">{{ $errors->has('noiDung') ? $errors->first('noiDung') : '' }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Đăng tin', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop