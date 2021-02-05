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
@if (Session::get('fail'))
<div class="login-fail">
    <h6 class="text-danger">{{ Session::get('fail') }}</h6>
</div>
@endif
<form action="{{route('danganh')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <th style="width:300px">Hình Ảnh:</th>
            <td style="width:300px"> <input class="form-control" type="file" name="file" onchange="hienAnh(this)"></td>
        </tr>
        <tr>
            <td></td>
            <td><img id="hienanh" alt="" style="width:120px;height:100px"></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <a class="btn btn-warning" href="{{ route('users.index')}}">Hủy</a>
                <input class="btn btn-success" type="submit" value="Đăng">
            </td>
        </tr>

    </table>

</form>
@endsection