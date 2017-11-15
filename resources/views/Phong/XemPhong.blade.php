@extends('Layout.Master')
@section('main')
@section('title','Phòng')
<div class="phong">
    <div class="row">
        <div class="col-md-12">
            <div class="row xem-phong">
                <div class="col-md-7">
                    <div id="HinhAnhPhongTro" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @if($photos !== null)
                                @for($i = 0; $i<$photos->count(); $i++)
                                    <li data-target="#HinhAnhPhongTro" data-slide-to="{{$i}}" 
                                        class="{{$i===0 ? 'active':''}}"></li>
                                @endfor
                            @else
                                <li data-target="#HinhAnhPhongTro" data-slide-to="0" 
                                    class="active"></li>
                            @endif
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @if($photos !== null)
                                @for($i = 0; $i<$photos->count(); $i++)
                                    <div class="item {{$i===0 ? 'active':''}}">
                                        <img src="{{asset('storage/img/'.$photos[$i])}}" 
                                            alt="photo">
                                    </div>
                                @endfor
                            @else
                                <div class="item active">
                                    <img src="{{asset('storage/img/'.$PhongTro->pathImg)}}" 
                                        alt="photo">
                                </div>
                            @endif
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#HinhAnhPhongTro" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#HinhAnhPhongTro" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-5 thong-tin">
                    <div class="row">
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
                        
                        @if(!($CTV === null))
                            <div class="col-md-12">
                                <span>Được duyệt bởi: </span>
                                {{$CTV->ten}}
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
                        <div class="col-md-12">
                            <div class="btn-group btn-group-lg btn-group-justified">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success my-btn-success" onclick="hienso(this)">
                                        Hiện số điện thoại
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success my-btn-success"
                                    data-toggle="modal" data-target="#dat-cho">Đăng ký đặt chỗ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- thong-tin --}}
            </div> {{-- xem-phong --}}
        </div>
    </div>
</div>

<!-- Modal -->
<div id="dat-cho" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng ký đặt chỗ</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" role="form">
                    <div class="form-group">
                        {!! Form::label('sdtKhachHang', 'Nhập số điện thoại của bạn') !!}
                        {!! Form::text('sdtKhachHang', null, ['class' => 'form-control', 
                        'data-error'=>'không được bỏ trống', 'required',
                        'data-remote-error'=>"Số điện thoại đang chờ liên hệ. \nVui lòng chờ 5 phút hoặc sử dụng số điện thoại khác.",
                        'data-remote'=>'/KhachHang/CheckSDT']) !!}
                        <div class="help-block with-errors" style="white-space: pre-line">Lưu ý nếu đặt chỗ thành công, số điện thoại của bạn sẽ bị khóa 5 phút</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class='btn btn-success my-btn-success' id="dangKy">Đăng ký</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
            </div>
        </div>

    </div>
</div>
<div id="xac-nhan" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng ký đặt chỗ</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" role="form">
                    <div class="form-group">
                        {!! Form::label('maXacNhan', 'Nhập mã xác nhận nhận được qua tin nhắn') !!}
                        {!! Form::text('maXacNhan', null, ['class' => 'form-control', 
                        'data-error'=>'không được bỏ trống', 'required']) !!}
                        <div id="thongbaoxacnhan" class="help-block with-errors" style="white-space: pre-line"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thay đổi số điện thoại</button>
                <button type="button" class='btn btn-success my-btn-success' id="xacNhan">Xác nhận</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
            </div>
        </div>

    </div>
</div>
<div id="thong-bao" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng ký đặt chỗ</h4>
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
    var clickHienSo = false;
    function hienso(sdt){
        sdt.innerHTML = "{{$chuNha->sdt}}";
        $(sdt).addClass("hien-so");
        capNhatLuotClick();
    }

    $("#dangKy").click(function(){
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
        });
    });

    $('#xacNhan').click(function(){
        $.ajax({
            type : 'POST',
            dataType: 'text',
            url: "{{URL::to('KhachHang/XacNhan')}}",
            data: { 
                "_token": '{{ csrf_token() }}', 
                'sdtKhachHang': $("#sdtKhachHang").val(),
                'maXacNhan': $("#maXacNhan").val(),
                'maPhong': {{$PhongTro->maPhong}},
                'chuNha': {{$PhongTro->chuNha}}
            },
            success : function(res){
                if(res === 'success') {
                    $("#xac-nhan").modal('hide');
                    clickHienSo = false;
                    capNhatLuotClick();
                    $("#maXacNhan").val(null);
                    thongBao('Đặt chỗ thành công');
                }
                else { 
                    $('#thongbaoxacnhan').text('Mã xác nhận không chính xác');
                    $('#thongbaoxacnhan').parent().addClass('has-error has-danger');
                }
            }
        })
    })
    function thongBao(notice) {
        $('#thong-bao').find('span').text(notice);
        $('#thong-bao').modal('show');
        window.setTimeout(function(){
            $('#thong-bao').modal('hide');
        }, 7000);
    }
    function capNhatLuotClick() {
        if(!clickHienSo){
            clickHienSo = true;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{URL::to('Phong/LuotClick')}}",
                data: { 
                    "_token": '{{ csrf_token() }}', 
                    'maPhong': {{$PhongTro->maPhong}}
                },
                //success : function (res){
                        //console.log(res.name);
                    //}
                //success : function (data, status){
                        //console.log(data + " " + status);
                    //}
            });
        }
    }
</script>
@stop