<!-- <h1 style="text-align: center">GHI CHÚ</h1><br />
<div class="tm-img-gallery-info-container">
    <form action="{{route('search')}}" method="post">
        @csrf
        <input tuype='text' name="tieude" placeholder="Tìm ...">

        <select name="phanloai" class="btn btn-primary dropdown-toggle">
            <option value="">Tất cả</option>
            @foreach ($types as $key=>$value) <option value="<?= $value['id'] ?>"><?= $value['chu_de'] ?></option>
            @endforeach
        </select>

        <input type="date" name="ngaythang">
        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>
    </form>
    <div style="float: right;">
        <a href="{{route ('users.create')}}" class="btn btn-primary">Thêm Note</a>
        <a href="{{route ('notesdelete.index')}}" class="btn btn-primary">Note Xóa </a>
        <a href="{{route ('types.index')}}" class="btn btn-primary">Phân Loại </a>
        <a href="{{ route('friends.create')}}" class="btn btn-primary">Bạn Bè </a>
    </div>

</div> -->
<aside class="col-sm-3">

    <div class="panel panel-default">
        <div class="panel-heading" style="color: blue;">
            <span class="glyphicon glyphicon-th-list"></span>
            <strong>Tổng Hợp</strong>
        </div>
        <div class="list-group">
            <a  href="{{route ('users.create')}}" class="list-group-item">Thêm Ghi Chú</a>
            <a  href="{{route ('types.index')}}" class="list-group-item">Phân Loại Ghi Chú</a>
            <a  href="{{route ('notesdelete.index')}}" class="list-group-item"> Ghi Chú Đã Xóa</a>
            <a  href="{{ route('friends.create')}}" class="list-group-item">Bạn Bè</a>
  
        </div>
    </div>
    <form action="{{route('search')}}" method="get">
        @csrf
        Nhập tiêu đề tìm kiếm:
        <input type='text' style=" background-color:#CCFF99;border-radius:3px" class="form-control" name="tieude">
        Chọn ngày tháng:
        <input style=" background-color:#CCFF99;border-radius:3px" type="date" class="form-control" name="ngaythang"> <br />
        Phân loại:
        <select name="phanloai" class="btn btn-success dropdown-toggle">

            <option value="-1">Tất cả</option>
            @foreach ($types as $key=>$value) <option value="<?=$value['id'] ?>"><?= $value['chu_de'] ?></option>
            @endforeach
        </select>
        <button style="height:30px" type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i></button>

    </form>
</aside>