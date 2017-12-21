@extends('Layout.Master')
@section('main')
@section('title','Thêm Phòng')
<div class="phong">
    <h1>Thêm Phòng</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                {!! Form::open(['url' => 'Phong/ThemPhong', 'id'=>'themPhong', 'enctype' => 'multipart/form-data', 'data-toggle'=>"validator"]) !!}
                    
                    <div class="form-group col-md-8">
                        {!! Form::label('photo', 'Hình ảnh minh họa') !!}
                        <div class="file-loading">
                            {!! Form::file('photo[]', ['class' => 'file', 'id' => 'photo', 'multiple', 
                            'data-allowed-file-extensions' => '["jpg", "jpeg", "png"]']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('tenPhong') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('tenPhong', 'Tên Phòng') !!}
                            {!! Form::text('tenPhong', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors">{{ $errors->has('tenPhong') ? $errors->first('tenPhong') : '' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('tongSoPhong', 'Tổng số phòng') !!}
                                    {!! Form::number('tongSoPhong', 1, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('soPhongTrong', 'Số phòng trống') !!}
                                    {!! Form::number('soPhongTrong', 1, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="clearfix visible-lg-block"></div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('dienTich') ? ' has-error has-danger' : '' }}">
                                    {!! Form::label('dienTich', 'Diện tích phòng') !!}
                                    {!! Form::number('dienTich', 1, ['class' => 'form-control', 
                                    'data-error'=>'Không được bỏ trống', 'required']) !!}
                                    <div class="help-block with-errors">
                                        {{ $errors->has('dienTich') ? $errors->first('dienTich') : '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('gia') ? ' has-error has-danger' : '' }}">
                                    {!! Form::label('gia', 'Giá') !!}
                                    {!! Form::number('gia', 1000000, ['class' => 'form-control', 
                                    'data-error'=>'Không được bỏ trống', 'required']) !!}
                                    <div class="help-block with-errors">
                                        {{ $errors->has('gia') ? $errors->first('gia') : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>





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
                        <div class="form-group{{ $errors->has('tinh') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('tinh', 'Tỉnh/Thành phố') !!}
                            {!! Form::select('tinh',$tinh, "Hà Nội", ['class' => 'form-control',
                            'data-error'=>'Không được bỏ trống', 'required',
                            'onchange' => 'getDiaPhuong(value)']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('quan') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('quan', 'Quận/Huyện') !!}
                            {!! Form::select('quan', [null], null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required',
                            'onchange' => 'updatePhuong(value)']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('phuong') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('phuong', 'Phường/Xã') !!}
                            {!! Form::select('phuong', [null], null, ['class' => 'form-control',
                            'data-error'=>'Không được bỏ trống', 'required',]) !!}
                            <div class="help-block with-errors"></div>
                        </div>






                        <div class="clearfix visible-lg-block"></div>
                        <div class="form-group{{ $errors->has('diaChi') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('diaChi', 'Địa Chỉ') !!}
                            {!! Form::text('diaChi', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group{{ $errors->has('noiDung') ? ' has-error has-danger' : '' }}">
                            {!! Form::label('noiDung', 'Nội dung') !!}
                            {!! Form::textarea('noiDung', null, ['class' => 'form-control', 
                            'data-error'=>'Không được bỏ trống', 'required']) !!}
                            <div class="help-block with-errors">{{ $errors->has('noiDung') ? $errors->first('noiDung') : '' }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Đăng tin', ['class' => 'btn btn-success my-btn-success']) !!}
                            <a class="btn btn-default" href="{{ URL::to('/')}}">Hủy bỏ</a>
                        </div>
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#photo").fileinput({
        language: "vi",
        maxFileCount: 10,
        maxFileSize: 200,
        allowedFileExtensions: ["jpg", "png", "jpeg", "gif"]
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