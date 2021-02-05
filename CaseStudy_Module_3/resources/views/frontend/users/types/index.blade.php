@extends('layout.frontend')
@section('title', 'Phân Loại')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
    @include('frontend.include.menuleft')
</aside>
@endsection
@section('content')
@if (Session::get('success'))
<div class="login-fail">
    <h6 class="text-success">{{ Session::get('success') }}</h6>
</div>
@endif

<br />
<article class="col-sm-9">
    <table class="table table">
        <thead>
            <th>STT</th>
            <th>Chủ Đề</th>
            <th>Miêu tả</th>
            <th>Thao Tác</th>
        </thead>

        <tbody>

            <?php foreach ($types as $key => $value) : ?>

                <tr>
                    <td>
                        <?= ++$key ?>
                    </td>

                    <td>
                        <?= $value['chu_de'] ?></a>
                    </td>
                    <td>
                        <?= $value['mieu_ta'] ?>
                    </td>
                    <td>

                        <a class="btn btn-warning" href="{{ route('types.edit',$value['id']) }}">Sửa</a>
                        <a class="btn btn-danger" href="{{route ('types.show',$value['id']) }}">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
    <div class="" style="float: right;">
        <a href="{{route ('types.create')}}" class="btn btn-success">Thêm</a>
        <a href="{{route ('users.index')}}" class="btn btn-success">Quay lại</a>
    </div>
</article>
@endsection