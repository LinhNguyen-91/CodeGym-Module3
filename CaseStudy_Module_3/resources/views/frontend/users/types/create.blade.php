@extends('layout.frontend')
@section('title', 'Thêm Phân Loại')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
@include('frontend.include.menuleft')
</aside>
@endsection
@section('content')
<form action="{{ route('types.store')}}" method="post">
    @csrf
    <table>
        <input type="hidden" name="iduser" value="<?= session('id') ?>" style="color: black;">

        <tr>
            <th style="width:250px">Chủ Đề :</th>
            <td><input class="input" type="text" name="chude" value="" style="color: black;">
            <span class="text-danger">@error('chude'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <th>
                Miêu Tả :</th>
            <td>
                <textarea class="textarea" rows="5" cols="50" name="mieuta" style="color: black;"></textarea>
            </td>
        </tr>
        <tr>
            <th></th>
            <td> <input class="btn btn-success" type="submit" value="Thêm">
                <a class="btn btn-warning" href="{{ route ('types.index') }}">Hủy</a>
            </td>
        </tr>
    </table>
</form>
@endsection