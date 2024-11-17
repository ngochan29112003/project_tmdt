<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mã xác nhận tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #e74c3c;
        }
        p {
            color: #555;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Mã xác nhận của bạn là: {{ $code  }}</h1>
    <p>Mã này có hiệu lực trong vòng 3 phút.</p>
    <p>Chúc bạn một ngày tốt lành!<br>
        Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.</p>
</div>
</body>
</html>
