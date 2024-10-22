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
</head>
<body  class=" d-flex flex-column">
<script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark">
                <img src="http://127.0.0.1:8000/asset/img/logo.png" height="70" alt=" ">
            </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Đăng nhập</h2>
                <form id="formdangnhap" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>
                        <input type="text" class="form-control" name="taikhoan" tabindex="1" placeholder="Tài khoản của bạn" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu
                            <span class="form-label-description">
                                <a href="">Quên mật khẩu</a>
                            </span></label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="pwd-input" name="password" class="form-control" tabindex="2" placeholder="Mật khẩu của bạn" autocomplete="off" required>
                            <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
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
                    <div class="form-footer">
                        <button type="submit" tabindex="3" class="btn btn-primary w-100">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center text-secondary mt-3">
            Bạn chưa có tài khoản? <a href="{{route('index.register')}}" tabindex="-1">Đăng ký</a>
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
