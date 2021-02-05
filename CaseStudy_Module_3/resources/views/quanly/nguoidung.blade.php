@extends('layout.frontend')
@section('title', 'Phân Loại')
@section('content')
@section('menutop')
@include ('frontend.include.menutopadmin')
@endsection
@if (Session::has('error'))
<div class="login-fail">
    <p class="text-danger">{{ Session::get('error') }}</p>
</div>
@endif
<h1>DANH SÁCH NGƯỜI DÙNG</h1>
<br>
@if (Session::get('fail'))
<div class="login-fail">
    <h6 class="text-danger">{{ Session::get('fail') }}</h6>
</div>
@endif
@if (Session::get('success'))
<div class="login-fail">
    <h6 class="text-success">{{ Session::get('success') }}</h6>
</div>
@endif
<form action="{{route('searchuser')}}" method="get">
    @csrf
    <input type='tex' class="input" name="email">
    <select name="tinhtrang" class="btn btn-success dropdown-toggle">

        <option value="a">Tất cả</option>
        <option value="4a1">Đang Dùng</option>
        <option value="4a2">Đã Khóa</option>
    </select>
    <button style="height:37px" type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i></button>

</form>
<table class="table table">
    <thead>
        <th>STT</th>
        <th>ID</th>
        <th>Họ Và Tên </th>
        <th>Email</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ </th>
        <th>Năm Sinh</th>
        <th>Hình Ảnh</th>
        <th>Tình Trạng</th>
        <th>Hành Động</th>
    </thead>

    <tbody>

        <?php foreach ($users as $key => $value) : ?>
            <?php $ngayThang = strtotime($value['nam_sinh']) ?>
<?php  $items = ($users->currentPage()===1)?0:$users->perPage()?>
            <tr>
                <td>
                    <?= ++$key + $items ?>
                </td>
                <td>
                    <?= $value['id'] ?>
                </td>

                <td>
                    <?= $value['ho_ten'] ?>
                </td>
                <td>
                    <?= $value['email'] ?>
                </td>
                <td>
                    <?= $value['dien_thoai'] ?>
                </td>

                <td>
                    <?= $value['dia_chi'] ?>
                </td>
                <td>
                    <?= date('d/m/Y', $ngayThang) ?>
                </td>
                <td>
                    <img class="hinhdaidien" src="{{asset ('/')}}images/<?= ($value['hinh_anh']) ? $value['hinh_anh'] : 'anhgiaumat.jpeg' ?>">
                </td>
                <td>
                    <?= ($value['tinh_trang'] == '4a1') ? 'Đang Dùng' : 'Đã Khóa' ?>

                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('khoanguoidung',$value['id']) }}"><?= ($value['tinh_trang'] == '4a1') ? 'Khóa' : 'Mở' ?></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<h6 style="float: right;margin-right:15px;"> {{ $users->onEachSide(5)->links() }} </h6>
<h6 style="float: left;margin-right:15px;">Danh sách có {{ $users->total() }} người dùng </h6>
@endsection
