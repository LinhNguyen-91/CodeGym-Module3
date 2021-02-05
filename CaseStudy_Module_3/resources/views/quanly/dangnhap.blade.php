@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutopadmin')
@endsection

@section('content')

<h1> ĐĂNG NHẬP TRANG QUẢN LÝ</h1>
<br/>
@if (Session::has('fail'))
<div class="login-fail">
    <p class="text-danger">{{ Session::get('fail') }}</p>
</div>
@endif
<form action="{{route('quanly')}}" method="post">
    @csrf
    <table>
        <tr>
            <th style="width:400px">
                Email :
            </th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-envelope"></span></a> <input class="input" type="text" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </td>
        <tr>
            <th>
                Mật Khẩu:
            </th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" name="matkhau" value="{{old('matkhau')}}">
                <span class="text-danger">@error('matkhau'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
                <input class="btn btn-success" type="submit" value="Đăng nhập">
            </td>
        </tr>
    </table>

</form>
@endsection