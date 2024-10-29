<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
    @include('lib-css')
    <style>
        .form-control {
            border-radius: 5px;
        }
        .input-group-text {
            border-radius: 0 5px 5px 0;
        }
        .toggle-password {
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body  class=" d-flex flex-column">
<script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card" style="width: 800px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
        <div class="row g-0">
            <!-- Bên Trái: Mẫu Đăng Nhập -->
            <div class="col-md-6 p-4">
                <div class="text-center mb-4">
                    <a href="#" class="navbar-brand">
                        <img src="http://127.0.0.1:8000/asset/img/logo.png" height="50" alt="Logo">
                    </a>
                </div>
                <h3 class="text-center mb-4">Đăng Nhập</h3>
                <form id="formdangnhap">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" name="taikhoan" placeholder="Tên Đăng Nhập" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật Khẩu</label>
                        <div class="input-group">
                            <input type="password" id="pwd-input" name="password" class="form-control" placeholder="Mật khẩu của bạn" required>
                            <span class="input-group-text toggle-password" title="Show password">
                                <a href="#" id="togglePassword" class="link-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="showPwdCheckbox" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" id="hidePwdCheckbox" class="icon d-none" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/>
                                        <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/>
                                        <path d="M3 3l18 18"/>
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <input type="checkbox" id="rememberMe">
                            <label for="rememberMe">Ghi Nhớ Tôi</label>
                        </div>
                        <a href="#" class="text-muted">Quên Mật Khẩu?</a>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-danger w-100">Đăng Nhập</button>
                    </div>
                </form>
            </div>
            <!-- Bên Phải: Thông Điệp Chào Mừng -->
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center text-white"
                 style="background: linear-gradient(135deg, #ff4b2b, #ff416c);
                        padding: 50px;
                        border-radius: 20px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);">
                <h2 class="mb-3 fw-bold" style="letter-spacing: 1px;">Chào Mừng Đến Với PC Store</h2>
                <p class="mb-4 fs-5">Bạn chưa có tài khoản? Hãy tham gia ngay!</p>
                <a href="{{route('index.register')}}"
                   class="btn btn-light btn-lg px-5 py-2 fw-semibold text-dark shadow-sm"
                   style="border-radius: 50px; transition: 0.3s ease;">
                    Đăng Ký
                </a>
            </div>
        </div>
    </div>
</div>
@include('lib-js')
<script>
    document.getElementById('showPwdCheckbox').addEventListener('click', function (e) {
        e.preventDefault();
        const passwordInput = document.getElementById('pwd-input');
        const hideIcon = document.getElementById('hidePwdCheckbox');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            hideIcon.classList.remove('d-none'); // Hiện biểu tượng "eye-off"
            this.classList.add('d-none'); // Ẩn biểu tượng "eye"
        }
    });

    document.getElementById('hidePwdCheckbox').addEventListener('click', function (e) {
        e.preventDefault();
        const passwordInput = document.getElementById('pwd-input');
        const showIcon = document.getElementById('showPwdCheckbox');

        if (passwordInput.type === 'text') {
            passwordInput.type = 'password';
            showIcon.classList.remove('d-none'); // Hiện biểu tượng "eye"
            this.classList.add('d-none'); // Ẩn biểu tượng "eye-off"
        }
    });

    $('#formdangnhap').submit(function (e) {
      e.preventDefault();

      $.ajax({
        url: '{{ route('login-action') }}',
        method: 'POST', // sử dụng POST để tránh lộ thông tin qua URL
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // thêm CSRF token
        },
        data: $(this).serialize(),
        success: function (response) {
          if (response.success) {
            toastr.success(response.message, "Thành công");
            setTimeout(function () {
              window.location.href = response.redirect; // Chuyển hướng người dùng
            }, 500);
          } else {
            toastr.error(response.message, "Lỗi");
          }
        },
        error: function (xhr) {
          // Sửa lỗi này bằng cách lấy thông báo chính xác từ phản hồi JSON
          if (xhr.status === 400) {
            var response = xhr.responseJSON;
            toastr.error(response.message, "Lỗi");
          } else {
            // Trường hợp lỗi khác (nếu có)
            toastr.error("An error occurred", "Lỗi");
          }
        }
      });
    });

</script>
</body>
</html>
