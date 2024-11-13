<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - PcStore</title>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}">
    @include('lib-css')
    <style>
        /*.collapse .navbar-nav .nav-item:hover {*/
        /*    background-color: #898989; !* Thay đổi màu nền khi hover *!*/
        /*    border-radius: 0.25rem; !* Tạo viền cong nhẹ nếu muốn *!*/
        /*}*/

    </style>
</head>

<body>
    <script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="white">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark pb-0">
                    <a href="{{route('super-admin-home')}}">
                        <img src="{{asset('asset/img/logo-admin.png')}}" width="100" height="auto">
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm" style=""></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Super Admin</div>
                                <div class="mt-1 small text-secondary">Quản trị người dùng</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
{{--                            <a href="#" class="dropdown-item">Status</a>--}}
                            <a href="./profile.html" class="dropdown-item">Profile</a>
{{--                            <a href="#" class="dropdown-item">Feedback</a>--}}
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('super-admin-home')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-chart-dots-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 3v18h18" />
                                        <path d="M9 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M13 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M18 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M21 3l-6 1.5" />
                                        <path d="M14.113 6.65l2.771 3.695" />
                                        <path d="M16 12.5l-5 2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Thống kê</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                       fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round"
                                       class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                              </span>
                                <span class="nav-link-title">
                                Quản lý tài khoản
                              </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('tai-khoan-admin')}}">
                                    Tài khoản admin
                                </a>
                                <a class="dropdown-item" href="{{route('tai-khoan-khach-hang')}}">
                                    Tài khoản khách hàng
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-phan-quyen-admin')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                      <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                      <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                      <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                      <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                      <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                      <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý quyền admin</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-danh-muc')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 4h6v6h-6z" />
                                        <path d="M14 4h6v6h-6z" />
                                        <path d="M4 14h6v6h-6z" />
                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    </svg>

                                </span>
                                <span class="nav-link-title">Quản lý danh mục</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-hang-san-xuat')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-building-factory-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21h18" />
                                        <path d="M5 21v-12l5 4v-4l5 4h4" />
                                        <path
                                            d="M19 21v-8l-1.436-9.574a.5 .5 0 0 0 -.495 -.426h-1.145a.5 .5 0 0 0 -.494 .418l-1.43 8.582" />
                                        <path d="M9 17h1" />
                                        <path d="M14 17h1" />
                                    </svg>

                                </span>
                                <span class="nav-link-title">Quản lý hãng sản xuất</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l18 0" />
                                        <path
                                            d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2-4h14l2 4" />
                                        <path d="M5 21l0-10.15" />
                                        <path d="M19 21l0-10.15" />
                                        <path d="M9 21v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý sản phẩm</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('danh-sach-san-pham')}}">
                                    Danh sách sản phẩm
                                </a>
                                <a class="dropdown-item" href="{{route('danh-sach-chi-tiet-san-pham')}}">
                                    Danh sách chi tiết sản phẩm
                                </a>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-don-hang')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17h-11v-14h-2" />
                                        <path d="M6 5l14 1l-1 7h-13" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý đơn hàng</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-van-chuyen')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M5 17h-2v-4m-1-8h11v12m-4 0h6m4 0h2v-6h-8m0-5h5l3 5" />
                                        <path d="M3 9l4 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý vận chuyển</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-bai-dang')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-http-post">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12h2a2 2 0 1 0 0-4h-2v8" />
                                        <path d="M12 8a2 2 0 0 1 2 2v4a2 2 0 1 1 -4 0v-4a2 2 0 0 1 2-2z" />
                                        <path
                                            d="M17 15a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý bài đăng</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-binh-luan')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 9h8" />
                                        <path d="M8 13h6" />
                                        <path
                                            d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-5l-5 3v-3h-2a3 3 0 0 1-3-3v-8a3 3 0 0 1 3-3h12z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý bình luận</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-tra-loi-binh-luan')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message-dots">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                      <path d="M12 11v.01" />
                                      <path d="M8 11v.01" />
                                      <path d="M16 11v.01" />
                                      <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3z" />
                                   </svg>
                                </span>
                                <span class="nav-link-title">Trả lời bình luận</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-khuyen-mai')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-dollar">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 21h-7a2 2 0 0 1-2-2v-12a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h12.5" />
                                        <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M19 21v1m0-8v1" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Khuyến mãi</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-bao-cao')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/mail-opened -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1-2-2v-14a2 2 0 0 1 2-2h7l5 5v11a2 2 0 0 1-2 2z" />
                                        <path d="M9 17h6" />
                                        <path d="M9 13h6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Báo cáo</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-phuong-thuc-thanh-toan')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 19h-6a3 3 0 0 1 -3-3v-8a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v4.5" />
                                        <path d="M3 10h18" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16l3 3l-3 3" />
                                        <path d="M7.005 15h.005" />
                                        <path d="M11 15h2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Phương thức thanh toán</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last ms-auto">
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                            data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path
                                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Last updates</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-red d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 1</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        Change deprecated html tags to text decoration classes (#29604)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 2</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        justify-content:between ⇒ justify-content:space-between (#29734)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions show">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 3</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        Update change-version.js (#29736)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Example 4</a>
                                                    <div class="d-block text-secondary text-truncate mt-n1">
                                                        Regenerate package-lock.json (#29730)
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="list-group-item-actions">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
{{--                            <span class="avatar avatar-sm"--}}
{{--                                style=""></span>--}}
                            <img class="avatar avatar-m" src="{{asset('asset/img/user.jpg')}}">
                            <div class="d-none d-xl-block ps-2">
                                <div>Super Admin</div>
                                <div class="mt-1 small text-secondary">Quản trị người dùng</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
{{--                            <a href="#" class="dropdown-item">Status</a>--}}
                            <a href="{{route('khach-hang-home')}}" class="dropdown-item">Trang chủ</a>
{{--                            <div class="dropdown-divider"></div>--}}
                            <a href="{{route('logout')}}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            @yield('contents')
        </div>
    </div>
    @include('lib-js')
    @yield('scripts')
</body>

</html>
