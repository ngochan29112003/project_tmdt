<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
    @include('lib-css')
</head>
<body class="d-flex flex-column">
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark">
                <img src="{{asset('asset/img/icon.png')}}" height="70" alt="">
            </a>
        </div>
        <form class="card card-md" id="formcapnhatmatkhau" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Cập nhật mật khẩu</h2>
                <div class="mb-3">
                    <label class="form-label">Email đăng ký</label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="Nhập email đã đăng ký" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mã xác nhận</label>
                    <div class="d-flex">
                        <input type="text" id="maxacnhan" name="maxacnhan" class="form-control me-2" placeholder="Nhập mã xác nhận" required disabled>
                        <button type="button" id="sendCodeButton" class="btn btn-danger">Gửi mã</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu mới</label>
                    <input type="password" id="pwd-input" name="MatKhau" class="form-control" placeholder="Mật khẩu mới" required disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập lại mật khẩu mới</label>
                    <input type="password" name="repwd" class="form-control" placeholder="Nhập lại mật khẩu mới" id="re-pwd" required disabled>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-danger w-100" disabled>Cập nhật mật khẩu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('lib-js')
<script>
    $(document).ready(function () {
        $('#sendCodeButton').click(function () {
            $.ajax({
                url: '{{ route('send.verification.code') }}',
                method: 'POST',
                data: { Email: $('#email').val(), _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Thành công");
                        $("#maxacnhan, #pwd-input, #re-pwd, .form-footer button").prop("disabled", false);
                    } else {
                        toastr.error(response.message, "Lỗi");
                    }
                },
                error: function () {
                    toastr.error("Đã xảy ra lỗi rồi", "Lỗi");
                }
            });
        });

        $('#formcapnhatmatkhau').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('update.password') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Thành công");
                    } else {
                        toastr.error(response.message, "Lỗi");
                    }
                },
                error: function () {
                    toastr.error("Đã xảy ra lỗi", "Lỗi");
                }
            });
        });
    });
</script>
</body>
</html>
