<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  Bootstrap and Font Awesome sass  --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--  datepicker  --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.standalone.css')}}">
    {{--  file input  --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap-fileinput/fileinput.css')}}">
    {{--  Mice  --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--  jquery, Bootstrap.js and Mice  --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    {{--  datepicker  --}}
    <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/moment-with-locales.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.vi.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/validator.js')}}"></script>
    {{--  file input  --}}
    <script type="text/javascript" src="{{asset('js/bootstrap-fileinput/plugins/piexif.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-fileinput/plugins/sortable.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-fileinput/plugins/purify.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-fileinput/fileinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-fileinput/locales/vi.js')}}"></script>
    {{--  Popper.js  --}}
    <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>

    {{--  <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>  --}}
    <title>Nhà Trọ | @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-phongtro">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="{{ URL::to('/')}}">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Session::has('TaiKhoan'))
                    <li><a href="{{ URL::to('Phong/ThemPhong')}}">
                        <span class="glyphicon glyphicon-plus"></span> Thêm phòng trọ
                    </a></li>
                    <li class="user">
                        <a href="{{ URL::to('Account/NguoiDung/'.Session::get('TaiKhoan.id'))}}">
                            <img src="{{asset('storage/img/user_1.jpg')}}" alt="{{Session::get('TaiKhoan.ten')}}"> {{Session::get('TaiKhoan.ten')}}
                        </a>
                    </li>
                    <li><a href="{{ URL::to('DangXuat')}}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                    @else
                    <li><a href="{{ URL::to('DangKyTaiKhoan')}}"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                    <li><a href="{{ URL::to('DangNhap')}}"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('main')
    </div>


</body>
</html>
