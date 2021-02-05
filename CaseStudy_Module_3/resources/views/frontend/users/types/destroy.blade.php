@extends('layout.frontend')
@section('title', 'Xóa Chủ Đề')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">

@include('frontend.include.menuleft')
</aside>
@endsection
@section('content')

<form action="{{ route('types.destroy',$id)}}" method="post">
    @method('delete')
    @csrf
    <h1> Nếu bạn xóa chủ đề '{{$type->chu_de}}' thì những ghi chú liên quan chủ đề này cũng bị xóa .
    Bạn có thật sự muốn xóa chủ đề ? </h1>
    
    <a class="btn btn-success" href="{{ route ('types.index') }}">Hủy</a>
    <input class="btn btn-danger" type="submit" value="Xóa">
</form>
@endsection