<!-- trang thanh-toan-thanh-cong.blade.php -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo thanh toán</title>
</head>
<body>
    <h1>{{ $message }}</h1>
    @if(isset($maDH) && isset($soTien))
        <p>Mã đơn hàng: {{ $maDH }}</p>
        <p>Số tiền đã thanh toán: {{ number_format($soTien, 0, ',', '.') }} VND</p>
    @endif
    <a href="{{ route('home') }}">Quay lại trang chủ</a>
</body>
</html>
