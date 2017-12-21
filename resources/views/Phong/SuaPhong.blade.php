@extends('Layout.Master')
@section('main')
@section('title','Phòng')
<div class="phong">
    <h1>Sửa Phòng</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row sua-phong">
                
                {!! Form::open(['url' => 'Phong/SuaPhong', 'id'=>'suaPhong', 
                'enctype' => 'multipart/form-data', 'data-toggle'=>"validator"]) !!}

                    <div class="col-md-8">
                        <div class="row ">
                            <div class="form-group col-md-12">
                                {!! Form::label('photo1', 'Hình ảnh Đã Đăng') !!}
                            </div>
                            <div class="form-group col-md-12 contain-label">
                                <label>
                                    <img src="https://d2eip9sf3oo6c2.cloudfront.net/series/square_covers/000/000/049/full/EGH_LearnES6_Final.png?1496436434" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value', true) !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Javascript-shield.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://www.sitepen.com/blog/wp-content/uploads/2016/04/es6_symbols_header.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://es6.io/images/ES62.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://cdn-images-1.medium.com/max/800/1*u2JVthnmUUoVipuG4Lrs7w.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://cdn-images-1.medium.com/max/1600/1*WL-xq0VJ0FP2yG587ZyTtA.jpeg" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://cdn-images-1.medium.com/max/1600/1*d9ZrzuDf74IdubTPRHlFfA.jpeg" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://onsen.io/blog/content/images/2015/Nov/es6-webcomponents.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <img src="https://www.theinquirer.net/w-images/40bac794-6ed4-4eef-89c6-5405f0fd1d5c/0/googlecloudlogo-580x358.png" class="rounded"/>
                                    {!! Form::checkbox('name[]', 'value') !!}
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <div class="form-group col-md-12">
                                {!! Form::label('photo', 'Hình ảnh minh họa') !!}
                                <div class="file-loading">
                                    {!! Form::file('photo[]', ['class' => 'file', 'id' => 'photo', 'multiple', 
                                    'data-allowed-file-extensions' => '["jpg", "jpeg", "png"]']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ten-phong">
                            Tên Phòng: vvv...
                        </div>
                        <div class="form-group">
                            <span>Địa chỉ: </span>
                            Diaj chi cua tui
                        </div>
                        <div class="form-group">PhuongTinh Quan Huyen Xa Ap Thon Xom</div>
                        <div class="form-group noidung">
                            <span>Mô tả: </span>du thu hihihi hahaha
                            sdfadfasdf

                        </div>

                        <div class="row"> <!-- Phần Chỉnh Sửa-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('tongSoPhong', 'Tổng số phòng') !!}
                                    {!! Form::number('tongSoPhong', 1, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('soPhongTrong', 'Số phòng trống') !!}
                                    {!! Form::number('soPhongTrong', 1, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="clearfix visible-lg-block"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('dienTich', 'Diện tích phòng') !!}
                                    {!! Form::number('dienTich', 1, ['class' => 'form-control', 
                                    'data-error'=>'Không được bỏ trống', 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('gia', 'Giá') !!}
                                    {!! Form::number('gia', 1000000, ['class' => 'form-control', 
                                    'data-error'=>'Không được bỏ trống', 'required']) !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div> <!-- Phần Chỉnh Sửa-->

                        <div class="form-group">
                            {!! Form::submit('Đăng tin', ['class' => 'btn btn-success my-btn-success']) !!}
                            <a class="btn btn-default" href="{{ URL::to('/')}}">Hủy bỏ</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop