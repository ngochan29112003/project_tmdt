<!doctype html>
<html lang="en">
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
        <form class="card card-md" id="formdangky" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Tạo tài khoản</h2>
                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" id="hoten" name="HoTen" class="form-control" placeholder="Nhập họ tên" required>
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label class="form-label">Giới tính</label>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="radio" name="GioiTinh" id="GioiTinh" value="Nam" required>--}}
{{--                        <label class="form-check-label" for="nam">--}}
{{--                            Nam--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="radio" name="GioiTinh" id="GioiTinh" value="Nữ" required>--}}
{{--                        <label class="form-check-label" for="nu">--}}
{{--                            Nữ--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="mb-3">
                    <label class="form-label">Tài khoản</label>
                    <input type="text" id="taikhoan" name="TenDangNhap" class="form-control" placeholder="Nhập tài khoản" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="Nhập email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="number" id="sodienthoai" name="SDT" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="pwd-input" name="MatKhau" class="form-control" placeholder="Mật khẩu" required>
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" id="togglePwdVisibility">
                                <svg xmlns="http://www.w3.org/2000/svg" id="showPwdIcon" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" id="hidePwdIcon" class="icon d-none" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/>
                                    <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87"/>
                                    <path d="M3 3l18 18"/>
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" name="repwd" class="form-control" placeholder="Nhập lại mật khẩu" id="re-pwd" required>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-danger w-100" >Tạo tài khoản</button>
                </div>
            </div>
        </form>
        <div class="text-center text-secondary mt-3">
            Bạn đã có tài khoản? <a href="{{route('index.login')}}" tabindex="-1">Đăng nhập</a>
        </div>
    </div>
</div>
@include('lib-js')
<script>
    document.getElementById('togglePwdVisibility').addEventListener('click', function (e) {
        e.preventDefault();
        const passwordInput = document.getElementById('pwd-input');
        const showIcon = document.getElementById('showPwdIcon');
        const hideIcon = document.getElementById('hidePwdIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showIcon.classList.add('d-none');
            hideIcon.classList.remove('d-none');
        } else {
            passwordInput.type = 'password';
            showIcon.classList.remove('d-none');
            hideIcon.classList.add('d-none');
        }
    });

    $('#formdangky').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route('add-account') }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message, "Thành công");
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                } else {
                    toastr.error(response.message, "Lỗi");
                }
            },
            error: function (xhr) {
                var response = xhr.responseJSON;
                if (xhr.status === 400 && response && response.message) {
                    toastr.error(response.message, "Lỗi");
                } else {
                    toastr.error("Đã xảy ra lỗi", "Lỗi");
                }
            }
        });
    });
</script>
</body>
</html>
