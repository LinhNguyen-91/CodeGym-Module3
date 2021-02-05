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
            <a class="navbar-brand" href="{{ route('index')}}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="color: red;">
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>Giới Thiệu</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Liên hệ</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Góp ý</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> Hỏi đáp</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span></span>Xin chào <?= session('user') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('formmatkhau.admin')}}">Đổi Mật Khẩu</a></li>
                        <li><a href="{{ route('formthongtin.admin')}}">Sửa Thông Tin</a></li>
 
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('dangxuat.admin')}}">Đăng xuất</a></li>

                    </ul>
                </li>
                <li class="hinhdaidien"><img src="{{asset ('/')}}images/<?= $hinh = (session('hinhanh')) ? session('hinhanh') : 'anhgiaumat.jpeg' ?>"></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- <span class="glyphicon glyphicon-user"> -->