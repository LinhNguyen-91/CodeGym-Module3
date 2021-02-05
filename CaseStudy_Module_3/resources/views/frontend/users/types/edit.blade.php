@extends('layout.frontend')
@section('title', 'Sửa Phân Loại')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">

@include('frontend.include.menuleft')
</aside>
@endsection
@section('content')
<form action="{{ route('types.update',$id)}}" method="post">
    @method('put')
    @csrf
    <table>
        <tr>
            <th style="width:250px"> Chủ Đề :</th>
            <td><input class="input" type="text" name="chude" value="<?= $types->chu_de ?>" style="color: black;"></td>
        </tr>
        <tr>
            <th>
                Miêu Tả :</th>
            <td> <textarea class="textarea" rows="5" cols="50" name="mieuta" style="color: black;"><?= $types->mieu_ta ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td> <input class="btn btn-warning" type="submit" value="Sửa">
                <a class="btn btn-success" href="{{  route ('types.index') }}">Hủy</a>
            </td>
        <tr>
    </table>
</form>
@endsection