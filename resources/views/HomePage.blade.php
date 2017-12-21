@extends('Layout.Master')
@section('title','Trang Chủ')
@section('main')

<div class="homepage" id="app"></div>
<script src="{{asset('js/app/TrangChu.js')}}"></script>

{{--
    <div class="tim-kiem-but">
        <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
    </div>
    <div class="row" id="tim-kiem">
        <h2>Tìm kiếm theo</h2>
        <nav class="col-md-6 col-md-offset-3">
            <div class="row">
                <ul>
                    <li class="active"><a href="#">Tên phòng</a></li>
                    <li><a href="#">Địa phương</a></li>
                    <li><a href="#">Giá tiền</a></li>
                    <li><a href="#">Diện tích phòng</a></li>
                </ul>
            </div>
            <div class="row filter">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::select('giaTien', 
                        [
                            '2000000' => '< 2 000 000',
                            '3000000' => '2 000 000 - 3 000 000',
                            '4000000' => '3 000 000 - 4 000 000',
                            '5000000' => '4 000 000 - 5 000 000',
                            '6000000' => '5 000 000 - 6 000 000',
                            '7000000' => '> 6 000 000'
                        ], 
                        null, ['class' => 'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::select('giaTien', 
                        [
                            '10' => '<= 10 m',
                            '20' => '10 - 20',
                            '30' => '20 - 30',
                            '40' => '30 - 40',
                            '50' => '40 - 50',
                            '60' => '> 50'
                        ], 
                        null, ['class' => 'form-control'])!!}
                    </div>
                </div>

            </div>
        </nav>
    </div>
--}}

@stop