@extends('Layout.Master')
@section('title','Kết Quả Đăng Ký')
@section('main')
<div class="account">
    <h1>Cảnh Báo</h1>
    <ul class='canh-bao'>
        @foreach($data as $v)
            <li>{{$v}}</li>
        @endforeach
    </ul>
</div>
@stop