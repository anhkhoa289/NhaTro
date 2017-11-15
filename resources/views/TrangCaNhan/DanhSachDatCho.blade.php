@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<div class="danh-sach-dat-cho">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Phòng</th>
                <th>Số điện thoại của khách hàng đã đặt chỗ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($PhongTroCuaToi as $v)
                <tr>
                    <td>
                        <div>
                            <div class="img-nhatro">
                                <div style="background-image:url({{asset('storage/img/'.$v->pathImg)}})"></div>
                            </div>
                            <div class="noi-dung">
                                <div class="title">{{$v->tenPhong}}</div>
                            </div>
                        </div>
                    </td>
                    <td>01234<br>01233<br>01238809<br>01238809<br>01238809<br>01238809</td>
                    <td>
                        <a class="btn btn-default" 
                            href="{{URL::to('Account/ThongBaoChiTiet/' .$v->loaiTB . '/' . $v->TB_id)}}">
                            Xem Chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop