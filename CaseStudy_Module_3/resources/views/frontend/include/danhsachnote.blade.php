@if (Session::get('success'))
<div class="login-fail">
    <h6 class="text-success">{{ Session::get('success') }}</h6>
</div>
<br />
@endif

<article class="col-sm-9">
    <?php foreach ($notes as $key => $value) : ?>
        <?php $ngayThang = strtotime($value['ngay_gio']) ?>
        <?php $trang = $notes->currentPage();
        $items = ($trang === 1) ? 0 : $notes->perPage() ?>
        <?php session(['trang' => $notes->url($trang)]) ?>

        <div class="khoi3">
            <table>

                <tr>
                    <th><?= '--' . ++$key + $items . '--' ?></th>
                    <td><?=($value['trang_thai']==1)?'Chia Sẻ':'Ẩn' ?></td>
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
                        <td><a href="{{ route('users.edit',$value['id']) }}"> Sửa</a></td>
                        <td></td>
                        <td><a href="{{route ('users.show',$value['id']) }}">Xóa</a></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
    
</article>
<h6 style="float: right;margin-right:25px;">Bạn có {{ $notes->total() }} ghi chú </h6>