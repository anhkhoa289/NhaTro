@extends('Layout.Master')
@section('title','Đăng Ký Tài Khoản')
@section('main')
<div class="account">

    <h1>Đăng ký tài khoản</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                {!! Form::open(['url' => 'Account/DangKy', 'id'=>'dangKy', 'data-toggle'=>"validator"]) !!}{{----}}
                    <div class="form-group col-md-4{{ $errors->has('holot') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('holot', 'Họ lót') !!}
                        {!! Form::text('holot', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('ten') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('ten', 'Tên') !!}
                        {!! Form::text('ten', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="form-group col-md-12">
                        {!! Form::label('gioiTinh', 'Giới tính') !!}
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'M') !!} Nam</label>
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'F') !!} Nữ</label>
                        <label class="radio-inline">{!! Form::radio('gioiTinh', 'U', true) !!} Không xác định</label>
                    </div>

                    <div class="form-group col-md-4{{ $errors->has('ngSinh') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('ngSinh', 'Ngày Sinh') !!}
                        <div class='input-group date' id='ngaySinh' 
                            data-date-format="yyyy-mm-dd">
                            {!! Form::text('ngSinh', null, ['class' => 'form-control',
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="clearfix visible-lg-block"></div>
                    @php
                    foreach($DiaPhuong as $v) {
                        $tinh[$v->tenTinh] = $v->tenTinh;
                    }
                    foreach($DiaPhuong[0]->quan as $v) {
                        $quan[$v->tenQuan] = $v->tenQuan;
                    }
                    foreach($DiaPhuong[0]->quan[0]->phuong as $v) {
                        $phuong[$v->tenPhuong] = $v->tenPhuong;
                    }
                    @endphp
                    <div class="form-group col-md-4{{ $errors->has('tinh') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('tinh', 'Tỉnh/Thành phố') !!}
                        {!! Form::select('tinh',$tinh, "Hà Nội", ['class' => 'form-control',
                        'data-error'=>'Không được bỏ trống', 'required',
                        'onchange' => 'getDiaPhuong(value)']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('quan') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('quan', 'Quận/Huyện') !!}
                        {!! Form::select('quan', [null], null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required',
                        'onchange' => 'updatePhuong(value)']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('phuong') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('phuong', 'Phường/Xã') !!}
                        {!! Form::select('phuong', [null], null, ['class' => 'form-control',
                        'data-error'=>'Không được bỏ trống', 'required',]) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-8 {{ $errors->has('diaChi') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('diaChi', 'Địa Chỉ') !!}
                        {!! Form::text('diaChi', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    {{--  <div class="form-group col-md-4">
                        {!! Form::label('cmnd', 'CMND') !!}
                        {!! Form::number('cmnd', null, ['class' => 'form-control', 
                        'data-error'=>'Phải có 9 chữ số', 'data-minlength'=>'9', 'maxlength'=>'9','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>  --}}
                    <div class="form-group col-md-4 input-sdt{{ $errors->has('sdt') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('sdt', 'Số điện thoại') !!}
                        {!! Form::number('sdt', null, ['class' => 'form-control', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors">{{$errors->first('sdt')}}</div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-8{{ $errors->has('email') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control',
                        'data-remote-error'=>'Email này đã được sử dụng',
                        'data-remote'=>'/Account/DangKy/email']) !!}
                        <div class="help-block with-errors">{{$errors->first('email')}}</div>
                    </div>
                    <div class="clearfix visible-lg-block"></div>
                    <div class="form-group col-md-4{{ $errors->has('tenDangNhap') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('tenDangNhap', 'Tên Đăng Nhập') !!}
                        {!! Form::text('tenDangNhap', null, ['class' => 'form-control', 
                        'data-error'=>'Tối thiểu 6 ký tự', 'required', 'data-minlength'=>'6',
                        'data-remote-error'=>'Tên đăng nhập này đã được sử dụng',
                        'data-remote'=>'/Account/DangKy/tdn']) !!}
                        <div class="help-block with-errors">{{$errors->first('tenDangNhap')}}</div>
                    </div>
                    
                    <div class="form-group col-md-4{{ $errors->has('matkhau') ? ' has-error has-danger' : '' }}">
                        {!! Form::label('matkhau', 'Mật Khẩu') !!}
                        {!! Form::password('matkhau', ['class' => 'form-control', 
                        'data-error'=>'Tối thiểu 6 ký tự', 'data-minlength'=>'6', 'required']) !!}
                        <div class="help-block with-errors">{{$errors->first('matkhau')}}</div>
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('nhaplaimatkhau', 'Nhập lại mật Khẩu') !!}
                        {!! Form::password(null, ['class' => 'form-control', 'id' => 'nhaplaimatkhau',
                        'data-match'=>'#matkhau', 'data-match-error'=>'Mật khẩu không trùng khớp', 
                        'data-error'=>'Không được bỏ trống', 'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-md-12">
                        <a class="btn btn-default" href="{{ URL::to('/')}}">Hủy bỏ</a>
                        {!! Form::submit('Đăng ký', ['class' => 'btn btn-success my-btn-success']) !!}
                        Bấm đăng ký nghĩa là bạn đồng ý với mọi điều khoản của chúng tôi
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(function () {
            /*$.fn.datepicker.dates['vi'] = {
                days: ["Sunnday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
                months: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                monthsShort: ["Th1", "Th2", "Th3", "Th4", "Th5", "Th6", "Th7", "Th8", "Th9", "Th10", "Th11", "Th12"],
                today: "Hôm nay",
                clear: "Clear",
                format: "dd/mm/yyyy",
                titleFormat: "MM yyyy", // Leverages same syntax as 'format'
                weekStart: 0
                };*/
            $('#ngaySinh').datepicker({
                language: 'vi'
                //startDate: '-3d'
            });
            /*$('#dangKy').validator({
                messages:{
                    email:{
                        remote:""
                    }
                }
            });*/
            /*$('#ngaySinh').dateptimeicker({
                locale: 'vi',
                viewMode: 'years'
            });*/
        });

        $("#tinh").prepend("<option value='' selected='selected'>Chọn tỉnh</option>");
        $("#quan").prepend("<option value='' selected='selected'>Chọn quận</option>");
        $("#phuong").prepend("<option value='' selected='selected'>Chọn phường</option>");
        var quan = <?php echo json_encode($DiaPhuong[0]->quan); ?>;

        function updatePhuong(value) {
            $("#phuong option").remove();
            for(i in quan)
                if(quan[i].tenQuan === value) {
                    var phuong = quan[i].phuong
                    var parent = document.getElementById('phuong')
                    for(j in phuong) {
                        var ele = document.createElement('option')
                        ele.value = phuong[j].tenPhuong
                        ele.innerText = phuong[j].tenPhuong
                        parent.appendChild(ele)
                    }
                    break;
                }
            $("#phuong").prepend("<option value='' selected='selected'>Chọn Phường</option>");
        }

        function getDiaPhuong(value) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{ action('DiaPhuongController@getQuan') }}",
                data: { 
                    "_token": '{{ csrf_token() }}', 
                    'tenTinh': value
                },
                success : function (res) {
                    quan = res;
                    $("#quan option").remove();
                    for(i in quan) {
                        //var ele = "<option value='" + res[i].tenQuan + "'>" + res[i].tenQuan + "</option>";
                        var ele = document.createElement("option");
                        ele.value = quan[i].tenQuan
                        ele.innerText = quan[i].tenQuan
                        $("#quan").append(ele);
                    }
                    $("#quan").prepend("<option value='' selected='selected'>Chọn quận</option>");
                    updatePhuong(quan[0].tenQuan)
                },
                error : function () {
                    $("#quan option").remove();
                    $("#phuong option").remove();
                    $("#quan").prepend("<option value='' selected='selected'>Chọn quận</option>");
                    $("#phuong").prepend("<option value='' selected='selected'>Chọn phường</option>");
                }
            });
        }
    </script>

@stop