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
<form action="{{ route('logout')}}" method="get">
    @csrf
    <h1> Bạn có muốn xóa đăng xuất? </h1>
    <a class="btn btn-warning" href="{{route('users.index') }}">Hủy</a>
    <input class="btn btn-success" type="submit" value="Đăng Xuất">
</form>
@endsection