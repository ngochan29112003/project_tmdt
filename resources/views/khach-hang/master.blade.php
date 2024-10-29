@php use Illuminate\Support\Facades\DB; @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
    <title>Trang chủ</title>
    <!-- CSS files -->
    @include('lib-css')

    <style>
        .login-link {
            padding: 10px;
            /* Add padding to make the hover effect larger */
            border-radius: 5px;
            /* Optional rounded corners */
            transition: background-color 0.3s ease;
            /* Smooth transition */
        }

        .login-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Add a light background color on hover */
        }

        .col:hover .bi {
            transform: scale(1.2);
            color: #FFD700;
            transition: transform 0.2s ease, color 0.2s ease;
        }
    </style>
</head>
<?php
    $infoUser = DB::table('taikhoan')
        ->where('MaTK', session('MaTK'))
        ->first();

    $countCart = DB::table('chitietgiohang')
        ->join('giohang','giohang.MaGH','=','chitietgiohang.MaGH')
        ->where('MaTK', session('MaTK'))
        ->sum('chitietgiohang.SLSanPham');
?>
<body>
    <script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none bg-warning">
            <div class="container-xl p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal m-0 p-0">
                    <a href="{{route('home-page')}}">
                        <img src="{{asset('asset/img/logo.png')}}" height="60" alt=" "> </a>
                </h1>

                <!-- Add Search Bar with new style -->
                <form class="d-flex mx-auto" role="search" style="max-width: 366px; width: 100%;">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Bạn cần tìm gì?" aria-label="Search"
                            style="border-radius: 20px 0 0 20px; box-shadow: none; border: 1px solid #ddd;">
                        <button class="btn btn-light" type="submit"
                            style="border-radius: 0 20px 20px 0; border: 1px solid #ddd; border-left: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="navbar-nav flex-row order-md-last mx-1">
                    <div class="nav-item d-none d-md-flex">
                        <div class="row align-items-center d-flex">
                            <div class="col m-auto">
                                <a href="#" class="cart-icon text-decoration-none d-flex align-items-center">
                                    <span class="">
                                        <i class="bi bi-geo-alt fs-2 text-white shake-icon"></i>
                                    </span> 
                                    <span class="ms-1 text-white fw-bold fs-5">Hệ thống showroom</span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="cart-icon text-decoration-none d-flex align-items-center">
                                    <span>
                                        <i class="bi bi-telephone fs-2 text-white"></i>
                                    </span>
                                    <span class="ms-1 text-white fw-bold fs-5">Liên hệ 21004092</span> </a>
                            </div>
                            <div class="col">
                                <a href="{{route('tra-cuu-don-hang')}}"
                                    class="cart-icon text-decoration-none d-flex align-items-center">
                                    <span>
                                        <i class="bi bi-truck fs-2 text-white"></i>
                                    </span>
                                    <span class="ms-1 text-white fw-bold fs-5">Tra cứu đơn hàng</span> </a>
                            </div>
                            <div class="col">
                                <a href="{{route('gio-hang')}}"
                                    class="cart-icon text-decoration-none d-flex align-items-center">
                                    <span>
                                        <i class="bi bi-cart fs-2 text-white"></i>
                                    </span>
                                    <span class="ms-1 text-white fw-bold fs-5">Giỏ hàng</span>
                                    <span class="badge ms-1" style="background-color: #FFEB3B">{{$countCart}}</span> </a>
                            </div>
                            @if(session()->has('MaTK'))
                               <div class="col">
                                   <div class="nav-item dropdown">
                                       <a href="#" class="cart-icon text-decoration-none d-flex align-items-center" data-bs-toggle="dropdown"
                                          aria-label="Open user menu">
                                           <span>
                                               <i class="bi bi-person fs-2 text-white"></i>
                                           </span>
                                           <div class="d-none d-xl-block ms-1">
                                               <div class="text-white fs-5">Xin chào</div>
                                               <span class="text-white fs-5 fw-bold">{{$infoUser->HoTen}}</span>
                                           </div>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                           @if($infoUser->VaiTro == 1)
                                               <a href="{{route('super-admin-home')}}" class="dropdown-item">Quản lý SuperAdmin</a>
                                           @elseif($infoUser->VaiTro == 2)
                                               <a href="{{route('admin-home')}}" class="dropdown-item">Quản lý Admin</a>
                                           @endif
                                           <a href="{{route('thong-tin-tai-khoan')}}" class="dropdown-item">Thông tin tài khoản</a>
                                           <a href="{{route('logout')}}" class="dropdown-item">Đăng xuất</a>
                                       </div>
                                   </div>
                               </div>
                            @else
                                <div class="col">
                                    <a href="{{route('index.login')}}"
                                        class="cart-icon text-decoration-none d-flex align-items-center login-link rounded-pill">
                                        <span>
                                            <i class="bi bi-person fs-2 text-white"></i>
                                        </span>
                                        <span class="ms-1 text-white fw-bold fs-5">Đăng nhập</span> </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <div class="row flex-fill align-items-center">
                            <div class="col">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('home-page')}}" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                </svg>
                                            </span> <span class="nav-link-title"> Trang chủ </span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-laptop">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 19l18 0" />
                                                    <path
                                                        d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                                                </svg>
                                            </span> <span class="nav-link-title"> Laptop </span> </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-devices-pc">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 5h6v14h-6z" />
                                                    <path d="M12 9h10v7h-10z" />
                                                    <path d="M14 19h6" />
                                                    <path d="M17 16v3" />
                                                    <path d="M6 13v.01" />
                                                    <path d="M6 16v.01" />
                                                </svg>
                                            </span> <span class="nav-link-title">PC</span> </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-imac">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M3 4a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-12z" />
                                                    <path d="M3 13h18" />
                                                    <path d="M8 21h8" />
                                                    <path d="M10 17l-.5 4" />
                                                    <path d="M14 17l.5 4" />
                                                </svg>
                                            </span> <span class="nav-link-title">Màn hình máy tính</span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cpu">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 5m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                                                <path d="M9 9h6v6h-6z" />
                                                <path d="M3 10h2" />
                                                <path d="M3 14h2" />
                                                <path d="M10 3v2" />
                                                <path d="M14 3v2" />
                                                <path d="M21 10h-2" />
                                                <path d="M21 14h-2" />
                                                <path d="M14 21v-2" />
                                                <path d="M10 21v-2" />
                                            </svg>
                                            <span class="nav-link-title">Bộ nhỡ lưu trữ</span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-keyboard">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M2 6m0 2a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-16a2 2 0 0 1 -2 -2z" />
                                                    <path d="M6 10l0 .01" />
                                                    <path d="M10 10l0 .01" />
                                                    <path d="M14 10l0 .01" />
                                                    <path d="M18 10l0 .01" />
                                                    <path d="M6 14l0 .01" />
                                                    <path d="M18 14l0 .01" />
                                                    <path d="M10 14l4 .01" />
                                                </svg>
                                            </span> <span class="nav-link-title">
                                                Bàn phím
                                            </span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-mouse-2">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 3m0 4a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-4a4 4 0 0 1 -4 -4z" />
                                                    <path d="M12 3v7" />
                                                    <path d="M6 10h12" />
                                                </svg>
                                            </span> <span class="nav-link-title">
                                                Chuột - Lót chuột
                                            </span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-headset">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 14v-3a8 8 0 1 1 16 0v3" />
                                                    <path d="M18 19c0 1.657 -2.686 3 -6 3" />
                                                    <path
                                                        d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />
                                                    <path
                                                        d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />
                                                </svg>
                                            </span> <span class="nav-link-title">
                                                Tai nghe - Loa
                                            </span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-help"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                            aria-expanded="false">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-gamepad-2">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z" />
                                                    <path
                                                        d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232" />
                                                    <path d="M8 9v2" />
                                                    <path d="M7 10h2" />
                                                    <path d="M14 10h2" />
                                                </svg>
                                            </span> <span class="nav-link-title">
                                                Phụ kiện
                                            </span> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a> <a class="dropdown-item" href="">

                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            @yield('contents')
        </div>
    </div>
    {{--col-sm-12 col-md-6 col-lg-2 col-lg--}}
    <footer class="main-footer mt-3 bg-white">
        <div class="main-footer-top">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center ">
                    <div class="col-sm-12 col-md-6 col-lg-2 col-lg mt-4">
                        <div class="footer-col footer-link toggle-footer toggle-first">
                            <div class="footer-title">
                                <h4>Về GEARVN </h4>
                                <span class="icon-title"></span>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li class="item">
                                        <a href="/pages/gioi-thieu-gearvn" title="Giới thiệu">Giới thiệu</a>
                                    </li>
                                    <li class="item">
                                        <a href="https://tuyendung.gearvn.com/" title="Tuyển dụng">Tuyển dụng</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/black-friday" title="Black Friday 2024">Black Friday 2024</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2 col-lg mt-4">
                        <div class="footer-col footer-link toggle-footer">
                            <div class="footer-title active">
                                <h4>Chính sách </h4>
                                <span class="icon-title"></span>
                            </div>
                            <div class="footer-content" style="display: block;">
                                <ul>
                                    <li class="item">
                                        <a href="/pages/chinh-sach-bao-hanh" title="Chính sách bảo hành">Chính sách bảo
                                            hành</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/chinh-sach-giao-hang" title="Chính sách giao hàng">Chính sách
                                            giao hàng</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/chinh-sach-bao-mat" title="Chính sách bảo mật">Chính sách bảo
                                            mật</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2 col-lg mt-4">
                        <div class="footer-col footer-link toggle-footer">
                            <div class="footer-title">
                                <h4>Thông tin </h4>
                                <span class="icon-title"></span>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li class="text">
                                        <a href="/pages/he-thong-showroom-gearvn" title="Hệ thống cửa hàng">Hệ thống cửa
                                            hàng</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/huong-dan-mua-hang" title="Hướng dẫn mua hàng">Hướng dẫn mua
                                            hàng</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/huong-dan-thanh-toan-gearvn" title="Hướng dẫn thanh toán">Hướng
                                            dẫn thanh toán</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/huong-dan-tra-gop" title="Hướng dẫn trả góp">Hướng dẫn trả
                                            góp</a>
                                    </li>
                                    <li class="item">
                                        <a href="/pages/trung-tam-ho-tro-tra-cuu-thong-tin-bao-hanh-san-pham-chinh-hang"
                                            title="Tra cứu địa chỉ bảo hành">Tra cứu địa chỉ bảo hành</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2 col-lg mt-4">
                        <div class="footer-col footer-block toggle-footer">
                            <div class="footer-title">
                                <h4>TỔNG ĐÀI HỖ TRỢ <span>(8:00 - 21:00)</span></h4>
                            </div>
                            <div class="footer-content">
                                <div class="list-info">
                                    <p><span>Mua hàng:</span> <a href="tel:19005301">1900.5301 <span> </span> </a></p>
                                    <p><span>Bảo hành: </span> <a href="tel:19005325">1900.5325 <span> </span> </a><br>
                                    </p>
                                    <p><span>Khiếu nại: </span> <a href="tel:18006173">1800.6173 <span> </span> </a><br>
                                        <span>Email: </span> <a href="mailto:cskh@gearvn.com">cskh@gearvn.com</a>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Libs JS -->
    @include('lib-js')
    @yield('scripts')

</body>

</html>