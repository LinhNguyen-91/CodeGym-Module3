@extends('layout.frontend')
@section('title', 'Bạn Bè')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
    @include('frontend.include.menuleft')

</aside>
@endsection
@section('content')

    <form action="{{ route('friends.index')}}" method="get">
        @csrf
        <input style="width:300px;height:30px" type="email" name="email" placeholder="Nhập email tìm kiếm" value="{{old('email')}}">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
        <a class="btn btn-warning" href="{{route('users.index') }}">Hủy</a>
        <input class="btn btn-success" type="submit" value="Tìm">
    </form>

@endsection