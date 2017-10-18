@extends('Layout.Master')
@section('title','Kết Quả Đăng Ký')
@section('main')
<div class="account">
    <h1>Kết quả đăng ký</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row form-xac-nhan">
                @if($kq !== null)
                    <p>Xin chào {{$kq->ho." ".$kq->ten}}.
                    @if($kq->tinhTrangHoatDong)
                        Tài khoản của bạn đã được kích hoạt</p>
                    @else
                        Vui lòng nhập mã kích hoạt nhận được từ tin nhắn</p>
                        {!! Form::open(['url' => 'Account/XacNhan', 'id'=>'kichhoat', 'data-toggle'=>"validator"]) !!}
                            <input name='id' type='hidden' value='{{$kq->id}}'>
                            <div class="form-group{{ isset($error) ? ' has-error has-danger' : '' }}">
                                {!! Form::text('maXacNhan', null, ['class' => 'form-control',
                                'data-error'=>'Không được bỏ trống', 'required']) !!}
                                <div class="help-block with-errors">{{ isset($error) ? $error : ''}}</div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Xác nhận', ['class' => 'btn btn-success']) !!}
                                <a class="btn btn-default" href="{{ URL::to('/')}}">Xác nhận sau</a>
                            </div>
                        {!! Form::close() !!}
                    @endif

                @else
                    <p>Đăng ký thất bại :(</p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop