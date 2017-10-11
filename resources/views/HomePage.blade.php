@extends('Layout.Master')
@section('title','Trang Chủ')
@section('main')
<div class="homepage">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-approved">
                <div class="panel-heading">Đã duyệt</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 img-nhatro">
                            <img src="{{asset('storage/img/ava_01.jpg')}}" alt="Avatar 01">
                        </div>
                        <div class="col-md-8 col-xs-12">Phòng trọ hạng sang</div>
                        <div class="col-md-8 col-xs-12">Giá tiền: 3 000 000 VNĐ</div>
                        <div class="col-md-8 col-xs-12">Địa chỉ: Bắc Mỹ An</div>
                        <div class="col-md-8 col-xs-12 img-ctv">
                            <a href="#">Duyệt bởi Meomeo <img src="{{asset('storage/img/user_2.jpg')}}" alt="CTV-01"></a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">Panel Footer</div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-notapproved">
                <div class="panel-heading">Chưa duyệt</div>
                <div class="panel-body">Panel Content</div>
                <div class="panel-footer">Panel Footer</div>
            </div>
        </div>
    </div>
</div>
@stop