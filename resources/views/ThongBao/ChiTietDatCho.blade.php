@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<div class="chi-tiet-thong-bao">
    <div class="datcho">
        <div class="row thong-tin">
            <div class="col-md-12 ten-phong">{{$PhongTro->tenPhong}}</div>
            <div class="col-md-12">
                <span>Địa chỉ: </span>
                {{$PhongTro->diaChi}}
            </div>
            <div class="col-md-12">{{$PhongTro->phuong}}, {{$PhongTro->quan}}, {{$PhongTro->tinh}}</div>
                        
            <div class="col-md-12">
                <span>Tổng số phòng: </span>
                {{$PhongTro->tongSoPhong}}
            </div>
            <div class="col-md-12">
                <span>Số phòng trống: </span>
                {{$PhongTro->soPhongTrong}}
            </div>
            <div class="col-md-12">
                <span>Diện tích: </span>
                {{$PhongTro->dienTich}}
            </div>
            <div class="col-md-12">
                <span>Giá: </span>
                {{$PhongTro->gia}}
            </div>
            <div class="col-md-12 noidung">
                <span>Mô tả: </span>{{$PhongTro->noiDung}}

            </div>
                        
            @if($PhongTro->CTVduyet != null)
                <div class="col-md-12">
                    <span>Được duyệt bởi: </span> đã duyệt
                    {{--  {{$CTV->ten}}  --}}
                </div>
            @else
                <div class="col-md-12 chua-duyet">
                    <span>Phòng trọ này chưa được kiểm duyệt</span>
                </div>
            @endif
            <div class="col-md-12">
                <span>Số lượt liên hệ: </span>
                {{$PhongTro->luotClick}}
            </div>
            <div class="col-md-12">
                <span>Ngày đăng: </span>
                {{$PhongTro->created_at}}
            </div>
            <div class="hinh-anh">
                <img src="{{asset('storage/img/'.$PhongTro->pathImg)}}">
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Số điện thoại của khách hàng đã đặt chỗ</th>
                    <th>Đặt chỗ lúc</th>
                </tr>
            </thead>
            <tbody>
                @foreach($DanhSachDatCho as $v)
                    <tr>
                        <td>{{$v->sdtKhachHang}}</td>
                        <td>{{$v->thGianDatCho}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop