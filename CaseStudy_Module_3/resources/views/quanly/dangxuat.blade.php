@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutopadmin')
@endsection

@section('content')
<form action="{{ route('logout')}}" method="get">
    @csrf
    <h1> Bạn có muốn xóa đăng xuất? </h1>
    <a class="btn btn-warning" href="{{ URL::previous() }}">Hủy</a>
    <input class="btn btn-success" type="submit" value="Đăng Xuất">
</form>
@endsection