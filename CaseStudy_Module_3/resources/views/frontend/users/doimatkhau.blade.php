@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
@include('frontend.include.menuleft')
@endsection
@section('content')
@if (Session::has('fail'))
<div class="login-fail">
    <p class="text-danger">{{ Session::get('fail') }}</p>
</div> <br/>
@endif
<form action="{{ route('doimatkhau')}}" method="get">
    @csrf
    <table>
        <tr>
            <th style="width:300px"> Nhập Email: </th>
            <td style="width:400px"><a class="icon"><span class="glyphicon glyphicon-envelope"></span></a> <input class="input" type="email" value="{{session('user')}}" name="email">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>Mật khẩu cũ: </th>
            <td><a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" name="matkhaucu">
            <span class="text-danger">@error('matkhaucu'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>Mật khẩu mới:</th>
            <td><a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" name="matkhaumoi">
            <span class="text-danger">@error('matkhaumoi'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>Nhập lại mật khẩu mới: </th>
            <td><a class="icon"><span class="glyphicon glyphicon-lock"></span></a> <input class="input" type="password" name="matkhaumoi_confirmation">
            <span class="text-danger">@error('matkhaumoi.confirmed'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a class="btn btn-warning" href="{{ route('users.index') }}">Hủy</a>
                <input class="btn btn-success" type="submit" value="Thay Đổi">
            </td>
        </tr>
    </table>
</form>

@endsection