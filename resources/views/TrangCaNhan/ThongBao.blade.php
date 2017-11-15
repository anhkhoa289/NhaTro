@extends('Layout.TrangCaNhan')
@section('trangCaNhan')
<div class="thong-bao">
    <ul id="thong-bao">
        @foreach($ThongBao as $v)
            <li>
                <a href="{{URL::to('Account/ThongBaoChiTiet/' .$v->loaiTB . '/' . $v->TB_id)}}">
                    <div class="img-nhatro">
                        <div style="background-image:url({{asset('storage/img/'. $v->pathImg)}})"></div>
                    </div>
                    <div class="noi-dung">{{str_replace("{0}",$v->tenPhong,$v->noiDungTB)}}</div>
                </a>
            </li>
        @endforeach
        @if(count($ThongBao) < 10)
            <li class="the-end">Không còn thông báo để hiển thị</li>
        @endif
    </ul>
</div>
<script>
var skip = ({{count($ThongBao)}} < 10 ? 0 : {{count($ThongBao)}});
console.log(skip)
$(window).scroll(function() {
   if(($(window).scrollTop() + $(window).height() == $(document).height()) && skip>0) {
        // $(window).scrollTop()     -- Tọa độ của màn hình hiện tại (tính từ đầu document đến vị trí đầu hiện tại)
        // $(window).height()        -- Chiều cao của màn hình hiện tại
        // $(document).height()      -- Chiều cao của tài liệu
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{URL::to('Account/UpdateThongBao')}}",
            data: { 
                "_token": '{{ csrf_token() }}', 
                'skip': skip
            },
            success : function (res) {
                if(res.length>0) {
                    skip += res.length;
                    
                    for(x in res) {
                        var divImginner = document.createElement("div");
                        //var imgpath = "url(" + location.protocol + "//" + location.host + "/storage/img/" + res[x].maLienKet + "/" + res[x].pathImg + ")"
                        var imgpath = "url(" + "{{asset('storage/img/')}}" + "/" + res[x].pathImg + ")"
                        divImginner.style.backgroundImage = imgpath;

                        var divImg = document.createElement("div");
                        divImg.className = "img-nhatro";
                        divImg.append(divImginner);

                        var noiDungTB = res[x].noiDungTB;
                        var divND = document.createElement("div");
                        divND.className = "noi-dung";
                        divND.innerHTML = noiDungTB.replace("{0}", res[x].tenPhong);
                        
                        var a = document.createElement('a');
                        a.href = "ThongBaoChiTiet/"+res[x].TB_id;
                        a.append(divImg);
                        a.append(divND);

                        var li = document.createElement('li')
                        li.append(a);

                        $("#thong-bao").append(li);
                    }
                }
                else {
                    skip = 0;
                    var li = document.createElement('li')
                    li.className = "the-end"
                    li.innerText = "Không còn thông báo để hiển thị"
                    $("#thong-bao").append(li);
                }
            }
        });
    }
});
</script>
@stop