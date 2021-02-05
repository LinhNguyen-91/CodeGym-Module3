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

<form action="{{route('searchuser')}}" method="get">
    @csrf
    <input type='tex' class="input" name="email">
    <select name="tinhtrang" class="btn btn-success dropdown-toggle">

        <option value="">Tất cả</option>
        <option value="1">Đang Dùng</option>
        <option value="2">Đã Khóa</option>
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
                    <?= ($value['tinh_trang'] == 1) ? 'Đang Dùng' : 'Đã Khóa' ?>

                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('khoanguoidung',$value['id']) }}"><?= ($value['tinh_trang'] == 1) ? 'Khóa' : 'Mở' ?></a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<h6 style="float: right;margin-right:15px;"> {{ $users->onEachSide(5)->links() }} </h6>


@endsection
<!-- @section('content2')
<form action="{{ route('doimatkhau')}}" method="get">
    @csrf
    <input type="email" value="{{session('user')}}" name="email">
    <input type="password" placeholder="Nhập mật khẩu củ" name="matkhaucu">
    <input type="password" placeholder="Nhập mật mới" name="matkhaumoi">
    <input type="password" placeholder="Nhập mật lại mật khẩu mới" name="nhaplai">

    <a href="{{ route('users.index')}}">Hủy</a>
    <input type="submit" value="Thay Đổi">
</form>
@endsection

@section('content3')
<form action="{{route('suathongtin')}}" method="get">
    @csrf
    <input type="text" value="{{session('hoten')}}" style="color:black" name="hoten">
    <input type="number" value="{{session('dienthoai')}}" style="color:black" name="dienthoai">
    <input type="text" value="{{session('diachi')}}" style="color:black" name="diachi">
    <input type="date" value="{{session('ngaysinh')}}" style="color:black" name="ngaysinh">


    <a href="{{ route('users.index')}}">Hủy</a>
    <input type="submit" value="Sửa">
</form>
@endsection

@section('content4')

<h1> Linh Đẹp Trai : 0979796091</h1>
<h4>nhatlinh.1791@gmail.com</h4>
@endsection

@section('content5')
<form action="{{ route('dangxuatquanly')}}" method="get">
    @csrf
    <h3> Bạn có muốn xóa đăng xuất? </h3>
    <a href="{{ route('index')}}">Hủy</a>
    <input type="submit" value="Đăng Xuất">
</form>

@endsection -->