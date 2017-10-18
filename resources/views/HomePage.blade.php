@extends('Layout.Master')
@section('title','Trang Chủ')
@section('main')
<div class="homepage">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-approved">
                <div class="panel-heading">Đã duyệt</div>
                <div class="panel-body">
                
                    @php
                    $i = true;
                    @endphp
                    @foreach($daDuyet as $item)
                        @if($i)
                        <a class="bordering" href="{{URL::to('Phong/'.$item->maPhong)}}" style="border: 0px">
                        @php
                        $i = false;
                        @endphp
                        @else
                        <a class="bordering" href="{{URL::to('Phong/'.$item->maPhong)}}">
                        @endif
                        
                        <div class="row">
                            <div class="col-md-4 col-xs-12 img-nhatro">
                                <div class="col-md-12"
                                style="background-image:url({{asset('storage/img/'.$item->maPhong.'/'.$item->pathImg)}});">
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-12">{{$item->tenPhong}}</div>
                            <div class="col-md-8 col-xs-12">Giá: {{$item->gia}}</div>
                            <div class="col-md-8 col-xs-12">Diện tích: {{$item->dienTich}}</div>
                            <div class="col-md-8 col-xs-12">Địa chỉ: {{$item->diaChiPhongTro}}</div>
                            <div class="col-md-8 col-xs-12 img-ctv">
                                <span href="#">Duyệt bởi {{$item->ten}} 
                                    <img src="{{asset('storage/img/'.$item->avatar)}}" alt="{{$item->ten}}">
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
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