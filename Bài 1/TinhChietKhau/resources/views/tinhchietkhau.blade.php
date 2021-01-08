<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Chiết Khấu</title>
</head>
<body>
    <h1>Nhập thông tinh</h1>
    <form action="/tinhchietkhau" method="POST">
        @csrf
        <p>
            <input type="text" name="tensanpham" placeholder="Tên sản phẩm">
        </p>
        <p>
            <input type="number" name="gia" placeholder="Giá sản phẩm">
        </p>
        <p>
            <input type="number" name="tyle" placeholder="Tỷ lệ (phần trăm)">
        </p>
        <p>
            <button type="submit">Tính</button>
        </p>
    </form>
</body>
</html>