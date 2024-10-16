<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    @include('lib-css')
    <style>
        .collapse .navbar-nav .nav-item:hover {
            background-color: #898989; /* Thay đổi màu nền khi hover */
            border-radius: 0.25rem; /* Tạo viền cong nhẹ nếu muốn */
        }

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
                        <img src="{{asset('asset/img/logo.png')}}" width="100" height="auto">
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm" style=""></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna</div>
                                <div class="mt-1 small text-secondary">UI Designer</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="./profile.html" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-tai-khoan')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Quản lý tài khoản</span>
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('danh-sach-san-pham')}}">
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
                            <span class="avatar avatar-sm"
                                style=""></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna</div>
                                <div class="mt-1 small text-secondary">UI Designer</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Status</a>
                            <a href="./profile.html" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="./settings.html" class="dropdown-item">Settings</a>
                            <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
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
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Profits",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93,
                    53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67
                ]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: [2, 1],
                dashArray: [0, 3],
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "May",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93,
                    53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67
                ]
            }, {
                name: "April",
                data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35,
                    41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37
                ]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Profits",
                data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93,
                    53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67
                ]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
                stacked: true,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Web",
                data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24,
                    29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6
                ]
            }, {
                name: "Social",
                data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4,
                    6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0
                ]
            }, {
                name: "Other",
                data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1,
                    2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6
                ]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19',
                '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24',
                '2020-07-25', '2020-07-26'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor(
                "green", 0.8)],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:on
    document.addEventListener("DOMContentLoaded", function() {
        const map = new jsVectorMap({
            selector: '#map-world',
            map: 'world',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: tabler.getColor('body-bg'),
                    stroke: tabler.getColor('border-color'),
                    strokeWidth: 2,
                }
            },
            zoomOnScroll: false,
            zoomButtons: false,
            // -------- Series --------
            visualizeData: {
                scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
                values: {
                    "AF": 16,
                    "AL": 11,
                    "DZ": 158,
                    "AO": 85,
                    "AG": 1,
                    "AR": 351,
                    "AM": 8,
                    "AU": 1219,
                    "AT": 366,
                    "AZ": 52,
                    "BS": 7,
                    "BH": 21,
                    "BD": 105,
                    "BB": 3,
                    "BY": 52,
                    "BE": 461,
                    "BZ": 1,
                    "BJ": 6,
                    "BT": 1,
                    "BO": 19,
                    "BA": 16,
                    "BW": 12,
                    "BR": 2023,
                    "BN": 11,
                    "BG": 44,
                    "BF": 8,
                    "BI": 1,
                    "KH": 11,
                    "CM": 21,
                    "CA": 1563,
                    "CV": 1,
                    "CF": 2,
                    "TD": 7,
                    "CL": 199,
                    "CN": 5745,
                    "CO": 283,
                    "KM": 0,
                    "CD": 12,
                    "CG": 11,
                    "CR": 35,
                    "CI": 22,
                    "HR": 59,
                    "CY": 22,
                    "CZ": 195,
                    "DK": 304,
                    "DJ": 1,
                    "DM": 0,
                    "DO": 50,
                    "EC": 61,
                    "EG": 216,
                    "SV": 21,
                    "GQ": 14,
                    "ER": 2,
                    "EE": 19,
                    "ET": 30,
                    "FJ": 3,
                    "FI": 231,
                    "FR": 2555,
                    "GA": 12,
                    "GM": 1,
                    "GE": 11,
                    "DE": 3305,
                    "GH": 18,
                    "GR": 305,
                    "GD": 0,
                    "GT": 40,
                    "GN": 4,
                    "GW": 0,
                    "GY": 2,
                    "HT": 6,
                    "HN": 15,
                    "HK": 226,
                    "HU": 132,
                    "IS": 12,
                    "IN": 1430,
                    "ID": 695,
                    "IR": 337,
                    "IQ": 84,
                    "IE": 204,
                    "IL": 201,
                    "IT": 2036,
                    "JM": 13,
                    "JP": 5390,
                    "JO": 27,
                    "KZ": 129,
                    "KE": 32,
                    "KI": 0,
                    "KR": 986,
                    "KW": 117,
                    "KG": 4,
                    "LA": 6,
                    "LV": 23,
                    "LB": 39,
                    "LS": 1,
                    "LR": 0,
                    "LY": 77,
                    "LT": 35,
                    "LU": 52,
                    "MK": 9,
                    "MG": 8,
                    "MW": 5,
                    "MY": 218,
                    "MV": 1,
                    "ML": 9,
                    "MT": 7,
                    "MR": 3,
                    "MU": 9,
                    "MX": 1004,
                    "MD": 5,
                    "MN": 5,
                    "ME": 3,
                    "MA": 91,
                    "MZ": 10,
                    "MM": 35,
                    "NA": 11,
                    "NP": 15,
                    "NL": 770,
                    "NZ": 138,
                    "NI": 6,
                    "NE": 5,
                    "NG": 206,
                    "NO": 413,
                    "OM": 53,
                    "PK": 174,
                    "PA": 27,
                    "PG": 8,
                    "PY": 17,
                    "PE": 153,
                    "PH": 189,
                    "PL": 438,
                    "PT": 223,
                    "QA": 126,
                    "RO": 158,
                    "RU": 1476,
                    "RW": 5,
                    "WS": 0,
                    "ST": 0,
                    "SA": 434,
                    "SN": 12,
                    "RS": 38,
                    "SC": 0,
                    "SL": 1,
                    "SG": 217,
                    "SK": 86,
                    "SI": 46,
                    "SB": 0,
                    "ZA": 354,
                    "ES": 1374,
                    "LK": 48,
                    "KN": 0,
                    "LC": 1,
                    "VC": 0,
                    "SD": 65,
                    "SR": 3,
                    "SZ": 3,
                    "SE": 444,
                    "CH": 522,
                    "SY": 59,
                    "TW": 426,
                    "TJ": 5,
                    "TZ": 22,
                    "TH": 312,
                    "TL": 0,
                    "TG": 3,
                    "TO": 0,
                    "TT": 21,
                    "TN": 43,
                    "TR": 729,
                    "TM": 0,
                    "UG": 17,
                    "UA": 136,
                    "AE": 239,
                    "GB": 2258,
                    "US": 4624,
                    "UY": 40,
                    "UZ": 37,
                    "VU": 0,
                    "VE": 285,
                    "VN": 101,
                    "YE": 30,
                    "ZM": 15,
                    "ZW": 5
                },
            },
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
    // @formatter:off
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
            chart: {
                type: "radialBar",
                fontFamily: 'inherit',
                height: 40,
                width: 40,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '75%'
                    },
                    track: {
                        margin: 0
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            colors: [tabler.getColor("blue")],
            series: [35],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 192,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Purchases",
                data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15,
                    14, 25, 32, 40, 55, 60, 48, 52, 70
                ]
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                type: 'datetime',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
            point: {
                show: false
            },
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-1'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [17, 24, 20, 10, 5, 1, 4, 18, 13]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-2'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [13, 11, 19, 22, 12, 7, 14, 3, 21]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-3'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [10, 13, 10, 4, 17, 3, 23, 22, 19]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-4'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [6, 15, 13, 13, 5, 7, 17, 20, 19]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-5'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-bounce-rate-6'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 24,
                animations: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            tooltip: {
                enabled: false,
            },
            stroke: {
                width: 2,
                lineCap: "round",
            },
            series: [{
                color: tabler.getColor("primary"),
                data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14]
            }],
        })).render();
    });
    // @formatter:on
    </script>
    @yield('scripts')
</body>

</html>