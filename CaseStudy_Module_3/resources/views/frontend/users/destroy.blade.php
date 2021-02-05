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
<form action="{{ route('users.destroy',$id)}}" method="post">
    @method('delete')
    @csrf
    <h1> Bạn có muốn xóa ghi chú '{{$note->tieu_de}}'? </h1>
    <a href="{{ URL::previous() }}"class="btn btn-success">Quay lại</a>
    <input class="btn btn-danger" type="submit" value="Xóa">
</form>
@endsection