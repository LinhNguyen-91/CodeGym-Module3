@extends('layout.frontend')
@section('title', 'Xóa Ghi Chú')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
    @include('frontend.include.menuleft')
</aside>
@endsection
@section('content')

<form action="{{ route('notesdelete.update',$id)}}" method="post">
    @method('put')
    @csrf
    <h1> Bạn có muốn khôi phục ghi chú {{$note->tieu_de}}? </h1>

    <a class="btn btn-warning" href="{{ route('notesdelete.index')}}">Hủy</a>
    <input class="btn btn-success" type="submit" value="Khôi Phục">
</form>
@endsection