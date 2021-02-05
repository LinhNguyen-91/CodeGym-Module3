<aside class="col-sm-3">

    <div class="panel panel-default">
        <div class="panel-heading" style="color: blue;">
            <span class="glyphicon glyphicon-th-list"></span>
            <strong>Tổng Hợp</strong>
        </div>
        <div class="list-group">
            <a href="{{route('index')}}" class="list-group-item">Người Dùng</a>
            <a href="{{route ('types.index')}}" class="list-group-item">Ghi Chú</a>
            <a href="{{route ('notesdelete.index')}}" class="list-group-item">Phân Loại</a>
            <a href="{{ route('friends.create')}}" class="list-group-item">Người Dung Đã Khóa</a>
  
        </div>
    </div>
    <form action="{{route('search')}}" method="get">
        @csrf
        Nhập email tìm kiếm:
        <input type='text' style=" background-color:#CCFF99;border-radius:3px" class="form-control" name="tieude">
        <button style="height:30px" type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i></button>

    </form>
</aside>