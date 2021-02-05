@extends('layout.frontend')
@section('title', 'Sửa Ghi Chú')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
@include('frontend.include.menuleft')
</aside>
@endsection
@section('content')
<form action="{{ route('users.update',$id)}}" method="post">
    @method('put')
    @csrf
    <table>
    
        <tr>
            <th style="width:300px">
                Tiêu đề :
            </th>
            <td>
                <input class="input" type="text" name="tieude" value="<?= $notes->tieu_de ?>" style="color: black;">
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top;">Nội dung : </th>
            <td> <textarea class="textarea" rows="5" cols="50" name="noidung" style="color: black;"><?= $notes->noi_dung ?></textarea>
            </td>
        </tr>
        <tr>
            <th></th>
            <th>
                Phân Loại:
                <select name="phanloai" class="btn btn-primary dropdown-toggle">
                    @foreach ($types as $key=>$value) <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $id) {
                                                                                                echo 'selected';
                                                                                            }; ?>><?= $value['chu_de'] ?></option>
                    @endforeach
                </select>
                Trạng thái:
                <select name="trangthai" class="btn btn-info dropdown-toggle">
                    <option value="1">Chia sẻ</option>
                    <option value="2">Ẩn </option>
                </select>
            </th>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="btn btn-warning" type="submit" value="Sửa">
                <a class="btn btn-success" href="{{ URL::previous() }}">Quay lại</a>
            </td>
        </tr>
    </table>
</form>
@endsection