@extends('layout.frontend')
@section('title', 'Thêm Ghi Chú')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
@include('frontend.include.menuleft')
</aside>
@endsection('search')
@section('content')
<div class="">
    <form action="{{ route('users.store')}}" method="post">
        @csrf

        <table>
            <input type="hidden" name="iduser" value="<?= session('id') ?>" style="color: black;">
            <tr>
                <th style="width:250px">Tiêu đề :</th>
                <td><input class="input" type="text" name="tieude" value="" style="color: black;">
                <span class="text-danger">@error('tieude'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top;">Nội dung : </th>
                <td> <textarea class="textarea" rows="5" cols="50" name="noidung" style="color: black;"></textarea>
                <span class="text-danger">@error('noidung'){{$message}}@enderror</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td> Phân Loại:

                    <select name="phanloai" class="btn btn-primary dropdown-toggle">

                        @foreach ($types as $key=>$value) <option value="<?=$value['id'] ?>"><?= $value['chu_de'] ?></option>
                        @endforeach
                    </select>


                    Trạng thái:

                    <select name="trangthai" class="btn btn-info dropdown-toggle">
                        <option value="1">Chia sẻ</option>
                        <option value="2">Ẩn </option>
                    </select>
                </td>
            </tr>
            <tr>

                <td> <input type="hidden" value="1" name="hienthi"></td>
                <td>
                    <input type="submit" class="btn btn-success" value="Thêm">
                    <a href="{{route('users.index')}}" class="btn btn-warning">Hủy</a>
                </td>
            </tr>
        </table>

    </form>
</div>

@endsection