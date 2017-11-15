@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<div class="phong-cua-toi">
    <ul>
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
            <li class="the-end">Không còn phòng để hiển thị</li>
    </ul>
</div>
@stop