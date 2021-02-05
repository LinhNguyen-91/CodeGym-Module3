@extends('layout.frontend')
@section('title', 'ỨNG DỤNG GHI CHÚ')
@section('menutop')
@include ('frontend.include.menutop')
@endsection
@section('search')
<aside class="col-sm-3">
    <iframe frameborder="0" marginwidth="0" marginheight="0" src="http://thienduongweb.com/tool/weather/?r=1&w=1&g=1&col=1&d=" width="100%" height="1000px" scrolling="no"></iframe>
</aside>
@endsection
@section('content')
<aside class="col-sm-9">
    <div class="hinh1">
        <img class="bando" src="https://static-gcdn.basecdn.net/landing/base.vn/image/note/visual.note.svg">
        <h4>Ứng Dụng Ghi Chú Nhanh</h4>
        <p style="width:300px">Ghi chú nhanh chóng thông tin, ý tưởng, công việc
            và truy cập ứng dụng mọi lúc mọi nơi.
        </p>
    </div>
    <div class="hinh1">
        <img class="bando" src="https://static-gcdn.basecdn.net/landing/base.vn/image/note/graphic-1.svg">
        <h4>Ghi Chú Dễ Dàng</h4>
        <p style="width:300px">Tạo ghi chú công việc và ghi lại các ý tưởng với thao tác đơn giản.
        </p>
    </div>
    <div class="hinh1">
        <img class="bando" src="https://static-gcdn.basecdn.net/landing/base.vn/image/note/graphic-2.svg">
        <h4>Chia Sẻ Với Mọi Người</h4>
        <p style="width:300px">Chia sẻ những ý tưởng, công việc của bạn với đồng nghiệp thông qua ứng dụng ghi chú.
        </p>
    </div>
    <div class="hinh1">
        <img class="bando" src="https://static-gcdn.basecdn.net/landing/base.vn/image/note/graphic-3.svg">
        <h4>Truy Cập Trên Mọi Thiết Bị</h4>
        <p style="width:300px">Ghi chú trên điện thoại, máy tính bảng và máy tính của bạn. Mọi thông tin đều được lưu trữ giúp bạn có thể truy cập trên mọi thiết bị.
        </p>
    </div>
   
</aside>
@endsection