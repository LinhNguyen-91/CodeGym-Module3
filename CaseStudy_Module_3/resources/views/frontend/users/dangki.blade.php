@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
@include('frontend.include.menuleft')
</aside>
@endsection
@section('content')
<h1> ĐĂNG KÍ NGƯỜI DÙNG</h1>
@if (Session::get('fail'))
<div class="login-fail">
    <h6 class="text-danger">{{ Session::get('fail') }}</h6>
</div>
@endif
<form action="{{route('dangki')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <th>Nhập email:</th>
            <td style="width:400px"><a class="icon"><span class="glyphicon glyphicon-envelope"></span></a> <input class="input" type="email" style="color:black"  value="{{old('email')}}" name="email">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th style="width:200px">Họ và tên:</th>
            <td style="width:400px"><a class="icon"><span class="glyphicon glyphicon-user"></span></a> <input class="input" type="text" style="color:black" value="{{old('hoten')}}" name="hoten">
            <span class="text-danger">@error('hoten'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th style="width:200px">Nhập mật khẩu:</th>
            <td style="width:400px"><a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" style="color:black"  name="matkhau">
            <span class="text-danger">@error('matkhau'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th style="width:200px">Nhập lại mật khẩu:</th>
            <td style="width:400px"><a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" style="color:black" name="matkhau_confirmation">
            <span class="text-danger">@error('nhaplaimatkhau'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th> Số điện thoại </th>
            <td><a class="icon"><span class="glyphicon glyphicon-phone-alt"></span></a> <input class="input" type="number" style="color:black" value="{{old('dienthoai')}}" name="dienthoai"></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-home"></span></a><input class="input" type="text" style="color:black" value="{{old('diachi')}}" name="diachi">
            </td>
        </tr>
        <tr>
            <th>Ngày sinh </th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-gift"></span></a><input class="input" type="date" style="color:black" value="{{old('ngaysinh')}}" name="ngaysinh">
            </td>
        </tr>
        <tr>
            <th>Hình Ảnh:</th>
            <td> <input class="form-control" type="file" name="file" onchange="hienAnh(this)"></td>
        </tr>
        <tr>
            <td></td>
            <td><img id="hienanh" alt="" style="width:120px;height:100px"></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <a class="btn btn-warning" href="{{ route('users.index')}}">Hủy</a>
                <input class="btn btn-success" type="submit" value="Đăng Kí">
            </td>
        </tr>

    </table>

</form>
</div>
@endsection