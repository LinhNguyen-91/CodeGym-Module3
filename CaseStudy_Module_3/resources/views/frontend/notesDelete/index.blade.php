@extends('layout.frontend')
@section('title', 'Ghi Chú Đã Xóa')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">

    <div class="panel panel-default">
        <div class="panel-heading" style="color: blue;">
            <span class="glyphicon glyphicon-th-list"></span>
            <strong>Tổng Hợp</strong>
        </div>
        <div class="list-group">
            <a style="color: blue; background-color:#CCFF99;" href="{{route ('users.create')}}" class="list-group-item">Thêm Ghi Chú</a>
            <a style="color: blue; background-color:#CCFF99;" href="{{route ('types.index')}}" class="list-group-item">Phân Loại Ghi Chú</a>
            <a style="color: blue; background-color:#CCFF99;" href="{{route ('notesdelete.index')}}" class="list-group-item"> Ghi Chú Đã Xóa</a>
            <a style="color: blue; background-color:#CCFF99;" href="{{ route('friends.create')}}" class="list-group-item">Bạn Bè</a>

        </div>
    </div>
    <form action="{{route('searchdelete')}}" method="get">
        @csrf
        Nhập tiêu đề tìm kiếm:
        <input type='text' style=" background-color:#CCFF99;border-radius:3px" class="form-control" name="tieude">
       
        <button style="height:30px" type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i></button>

    </form>
</aside>
@endsection
@section('content')
@if (Session::get('success'))
<div class="login-fail">
    <h6 class="text-success">{{ Session::get('success') }}</h6>
</div>
@endif

<article class="col-sm-9">
    <?php foreach ($notesDelete as $key => $value) : ?>
        <?php $ngayThang = strtotime($value['ngay_gio']) ?>
        <?php $trang = $notesDelete->currentPage();
        $items = ($trang === 1) ? 0 : $notesDelete->perPage() ?>
        <?php session(['trang' => $notesDelete->url($trang)]) ?>

        <div class="khoi3">
            <table>
                <tr>
                    <th><?= '--' . $value['id'] . '--' ?></th>
                    <td></td>
                    <td><?= date('d/m/Y', $ngayThang) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="height: 120px;"><?= $value['tieu_de'] ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?= $value['chu_de'] ?></td>
                    <td></td>
                </tr>
            </table>

            <div class="layer2">
                <table>
                    <tr>
                        <th><?= '--' . $value['id'] . '--' ?></th>
                        <td></td>
                        <td><?= date('d/m/Y', $ngayThang) ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 120px;">
                            <?= $value['noi_dung'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="{{ route('notesdelete.show',$value['id']) }}" style="color:blue">Khôi Phục</a></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endforeach; ?>

</article>
<h6 style="float: right;margin-right:15px;"> {{ $notesDelete->onEachSide(5)->links() }} </h6>
<h6 style="float: right;margin-right:15px;">Danh sách có {{ $notesDelete->total() }} ghi chú đã xóa </h6>
@endsection