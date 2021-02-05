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
<h1>GHI CHÚ CỦA '{{$email}}'</h1>
<br />
<article class="col-sm-12">
    <?php foreach ($notesFriend as $key => $value) : ?>

        <?php $ngayThang = strtotime($value['ngay_gio']) ?>
        <?php $trang = $notesFriend->currentPage();
        $items = ($trang === 1) ? 0 : $notesFriend->perPage() ?>
        <?php session(['trang' => $notesFriend->url($trang)]) ?>

        <div class="khoi3">
            <table>
                <tr>
                    <th><?= '--' . ++$key + $items . '--' ?></th>
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
                        <th><?= '--' . $key + $items . '--' ?></th>
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
                        <td><a href="{{route ('users.index') }}">Quay Về</a></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</article>
<h6 style="float: right;margin-right:15px;"> {{ $notesFriend->onEachSide(5)->links() }} </h6>
<h6 style="float: left;margin-left:50px;">Danh sách có {{ $notesFriend->total() }} ghi chú </h6>

@endsection