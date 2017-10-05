@extends('/../Layout/Master')
@section('title','Danh Sách Người Dùng')
@section('main')

URL gốc của url:{{url('/')}}<br>
Đường dẫn gốc của thư viện công cộng: {{public_path()}}
@foreach($loai1 as $d)
    {{$d->loaiTK." - ".$d->tenLoai}}<br>
@endforeach

@foreach($loai2 as $d)
    {{$d->loaiTK." - ".$d->tenLoai}}<br>
@endforeach

@foreach($loai3 as $d)
    {{$d->loaiTK." - ".$d->tenLoai}}<br>
@endforeach

@foreach($loai4 as $d)
    {{$d->loaiTK." - ".$d->tenLoai}}<br>
@endforeach

<h1>
    loai5
</h1>
@foreach($loai5 as $d)
    {{$d->loaiTK." - ".$d->tenLoai}}<br>
@endforeach

{{$test}}


@stop