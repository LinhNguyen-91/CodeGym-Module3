<!-- <div class="cd-slider-nav">
    <nav class="navbar">
        <div class="tm-navbar-bg">
            <a class="navbar-brand text-uppercase" href="{{route ('users.index')}}"><i class="fa fa-gears tm-brand-icon"></i>XIN CHÀO <?= session('user') ?>
            </a>

            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                &#9776;
            </button>
            <div class="collapse navbar-toggleable-md text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item active selected">
                        <a class="nav-link" href="#0" data-no="1">Trang Chủ<span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="2">Đổi Mật Khẩu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="3">Sửa Thông Tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="4">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#0" data-no="5">Đăng Xuất</a>
                    </li>
                   
                </ul>
            </div>
        </div>

    </nav>
</div>  -->

<header class="row" id="header">
    <div class="col-sm-12">
        <div class="tieude">
            <h1>ỨNG DỤNG GHI CHÚ</h1>
        </div>
        <div id="ngaythang">
            <script>
                var myVar = setInterval(myTimer, 1000);

                function myTimer() {
                    var d = new Date();
                    document.getElementById("ngaythang").innerHTML = d;
                }
            </script>
        </div>
    </div>
</header>
<nav class="navbar navbar-inverse" style="background-color: #CCFF99;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route ('users.index')}}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{route('gioithieu') }}"><span class="glyphicon glyphicon-list-alt"></span>Giới Thiệu</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Liên hệ</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Góp ý</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Hỏi đáp</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span></span>Xin chào <?= session('user') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('doimatkhaunguoidung')}}">Đổi Mật Khẩu</a></li>
                        <li><a href="{{ route('suathongtinnguoidung')}}">Sửa Thông Tin</a></li>
                        <li><a href="{{ route('danganhnguoidung')}}">Đổi Ảnh Đại Diện</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('dangnhapquanly')}}">Admin</a></li>
                        <li><a href="{{route('dangxuatnguoidung')}}">Đăng xuất</a></li>

                    </ul>
                </li>
                <li class="hinhdaidien"><img src="{{asset ('/')}}images/<?= $hinh = (session('hinhanh')) ? session('hinhanh') : 'anhgiaumat.jpeg' ?>"></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- <span class="glyphicon glyphicon-user"> -->