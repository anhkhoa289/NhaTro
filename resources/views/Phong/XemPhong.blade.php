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
                            <span>Số điện thoại liên hệ: </span>
                            {{$chuNha->sdt}}
                        </div>
                        <div class="col-md-12">
                            <span>Dành cho CTV: </span>
                            <div id="ForCTV"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-group btn-group-lg btn-group-justified">
                                {{--  <div class="btn-group">
                                    <button type="button" class="btn btn-success my-btn-success" onclick="hienso(this)">
                                        Hiện số điện thoại
                                    </button>
                                </div>  --}}
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success my-btn-success"
                                    data-toggle="modal" data-target="#dat-cho">Đăng ký đặt chỗ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- thong-tin --}}


                {{-- ReactJs app --}}
                <div id="dat-cho-react"></div>
                
                <script>
                    var clickHienSo = false, maPhong = {{$PhongTro->maPhong}}, chuNha = {{$PhongTro->chuNha}}
                    var cND = {{$ChucNanngDuyet}}
                    var phongDuyet = <?php echo json_encode($PhongTro); ?>
                </script>
                <script src="{{asset('js/app/XemPhong.js')}}"></script>


            </div> {{-- xem-phong --}}
        </div>
    </div>
</div>

<script>
    function hienso(sdt){
        sdt.innerHTML = "{{$chuNha->sdt}}";
        $(sdt).addClass("hien-so");
        capNhatLuotClick();
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