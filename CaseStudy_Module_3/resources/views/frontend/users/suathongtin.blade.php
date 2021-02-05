@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
@include('frontend.include.menuleft')
@endsection
@section('content')
<form action="{{route('suathongtin',$user['id'])}}" method="get">
    @csrf
    <table>
        <tr>
            <th style="width:300px">Họ và tên:</th>
            <td style="width:400px"> <a class="icon"><span class="glyphicon glyphicon-user"></span></a> <input class="input" type="text" value="{{$user['ho_ten']}}" style="color:black" name="hoten"></td>
        </tr>
        <tr>
            <th> Số điện thoại </th>
            <td><a class="icon"><span class="glyphicon glyphicon-phone-alt"></span></a> <input class="input" type="number" value="{{$user['dien_thoai']}}" style="color:black" name="dienthoai"></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>
                <a class="icon"><span class="glyphicon glyphicon-home"></span></a> <input class="input" type="text" value="{{$user['dia_chi']}}" style="color:black" name="diachi">
            </td>
        </tr>
        <tr>
            <th>Ngày sinh </th>
            <td>
                <a class="icon"> <span class="glyphicon glyphicon-gift"></span></a> <input class="input" type="date" value="{{$user['nam_sinh']}}" style="color:black" name="ngaysinh">
            </td>
        </tr>

        <tr>
            <th></th>
            <td>
                <a class="btn btn-success" href="{{ route('users.index') }}">Hủy</a>
                <input class="btn btn-warning" type="submit" value="Sửa">
            </td>
    </table>
</form>
@endsection