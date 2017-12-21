@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<div class="phong-cua-toi" id="myapp">
    {{--  <ul class="new-ul">
        @foreach($PhongTroCuaToi as $v)
            <li>
                <a href="{{URL::to('Phong/' . $v->maPhong )}}">
                    <div class="img-nhatro">
                        <div style="background-image:url({{asset('storage/img/'. $v->pathImg)}})"></div>
                    </div>
                    <div class="noi-dung">
                        <div class="title">{{$v->tenPhong}}</div>
                        {{$v->noiDung}}
                    </div>
                </a>
            </li>
        @endforeach
            <li>
                <div>
                    <div class="img-nhatro">
                        <div style="background-image:url(http://localhost:8000/storage/img/3/Qzn84KzvUptwcfXnkERosl1hz3qv97eSmC7idZlx.jpeg)"></div>
                    </div>
                    <div class="noi-dung">
                        <div class="title">{$v->tenPhong}</div>
                        {$v->noiDung}
                    </div>
                    <div class="chevron">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div class="table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Số điện thoại của khách hàng đã đặt chỗ</th>
                                    <th>Đặt chỗ lúc</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>0213892</td>
                                        <td>12321321</td>
                                    </tr>
                                    <tr>
                                        <td>0213892</td>
                                        <td>12321321</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </li>
            <li class="the-end">Không còn phòng để hiển thị</li>
    </ul>  --}}
</div>
<script src="{{asset('js/app/PhongCuaToi.js')}}"></script>
@stop