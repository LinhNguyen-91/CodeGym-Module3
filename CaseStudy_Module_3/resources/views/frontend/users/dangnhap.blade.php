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
<h1 style="color:rgb(172, 12, 12)"> Đăng Nhập</h1>
@if (Session::get('fail'))
<div class="login-fail">
    <h6 class="text-danger">{{ Session::get('fail') }}</h6>
</div>
@endif
@if (Session::get('success'))
<div class="login-fail">
    <h6 class="text-success">{{ Session::get('success') }}</h6>
</div>
@endif
<form action="{{route('login')}}" method="get">
    @csrf
    <table>
        <tr>
            <th style="width:250px">Email :</th>
            <td><a class="icon"><span class="glyphicon glyphicon-envelope"></span></a> <input class="input" type="text" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>
                Mật Khẩu:</th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" name="matkhau" value="{{old('matkhau')}}">
                <span class="text-danger">@error('matkhau'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="btn btn-success" type="submit" value="Đăng nhập">
                <a class="btn btn-warning" href="{{ route('dangkinguoidung')}}">Đăng Kí </a>
            </td>
        </tr>
    </table>
</form>
@endsection