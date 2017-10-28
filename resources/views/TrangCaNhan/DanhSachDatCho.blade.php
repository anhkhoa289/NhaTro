@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên Phòng</th>
            <th>Số Lượng khách đặt chỗ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($PhongTroCuaToi as $v)
            <tr class="{{$v->luotDatCho>0 ? 'not-read' : ''}}">
                <td>{{$v->tenPhong}}</td>
                <td>{{$v->luotDatCho}}</td>
                <td>
                    <button class="btn btn-default" onclick="updateSDT({{$v->maPhong}})">Xem số điện thoại</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="xem-sdt" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xem Số điện thoại</h4>
            </div>
            <div class="modal-body">
                <span></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
        </div>

    </div>
</div>
<script>
    $.ajax({
        type: 'POST',
            dataType: 'text',
            url: "{{URL::to('KhachHang/DangKy')}}",
            data: { 
                "_token": '{{ csrf_token() }}', 
                'sdtKhachHang': $("#sdtKhachHang").val()
            },
            success : function (res) {
                $('#dat-cho').modal('hide');
                capNhatLuotClick();
                if(res === 'success')
                    $("#xac-nhan").modal('show');
                else
                    thongBao(res)
            }
    })
</script>
@stop