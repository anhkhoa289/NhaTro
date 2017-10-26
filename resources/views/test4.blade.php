<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

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
            {!! Form::select('quan',$quan, null, ['class' => 'form-control', 
            'data-error'=>'Không được bỏ trống', 'required',
            'onchange' => 'updatePhuong(value)']) !!}
                        <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-md-4{{ $errors->has('phuong') ? ' has-error has-danger' : '' }}">
            {!! Form::label('phuong', 'Phường/Xã') !!}
            {!! Form::select('phuong', $phuong, null, ['class' => 'form-control',
            'data-error'=>'Không được bỏ trống', 'required',]) !!}
                        <div class="help-block with-errors"></div>
        </div>

<script type="text/javascript">
$("#tinh").prepend("<option value='' selected='selected'>Chọn tỉnh</option>");
$("#quan").prepend("<option value='' selected='selected'>Chọn quận</option>");
$("#phuong").prepend("<option value='' selected='selected'>Chọn phường</option>");
var quan = <?php echo json_encode($DiaPhuong[0]->quan); ?>;

function updatePhuong(value) {
    $("#phuong option").remove();
    for(i in quan)
        if(quan[i].tenQuan === value) {
            var phuong = quan[i].phuong;
            var parent = document.getElementById('phuong');
            for(j in phuong) {
                var ele = document.createElement('option');
                ele.value = phuong[j].tenPhuong;
                ele.innerText = phuong[j].tenPhuong;
                parent.appendChild(ele);
            }
            break;
        }
    $("#phuong").prepend("<option value='' selected='selected'>Chọn Phường</option>");
}

function getDiaPhuong(value) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "{{ action('TestController@getQuan') }}",
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
                ele.value = quan[i].tenQuan;
                ele.innerText = quan[i].tenQuan;
                $("#quan").append(ele);
            }
            $("#quan").prepend("<option value='' selected='selected'>Chọn quận</option>");
            updatePhuong(quan[0].tenQuan);
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
</body>
</html>