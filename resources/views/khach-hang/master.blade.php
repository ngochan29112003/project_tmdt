@php use Illuminate\Support\Facades\DB; @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .background-header{
            background-color: #E30019;
        }
        .icon-tabler-cpu {
            opacity: 0.7; /* Tạo hiệu ứng nhạt hơn */
            color: #706b6b; /* Chọn màu nhạt tùy ý */
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

    $DMSP_HSX = DB::table('danhmucsanpham as d')
        ->join('hangsanxuat as h', 'd.MaHSX', '=', 'h.MaHSX')
        ->select('d.TenDM', DB::raw('GROUP_CONCAT(h.TenHSX) AS HangSanXuat'))
        ->where('d.TrangThaiDM', '=', 'Hiện')
        ->where('h.TrangThaiHSX', '=', 'Hiện')
        ->groupBy('d.TenDM')
        ->get();
    // dd($DMSP_HSX);


//$HSX_Laptop = DB::table('danhmucsanpham')
//    ->join('hangsanxuat', 'danhmucsanpham.MaHSX', '=', 'hangsanxuat.MaHSX')
//    ->where('danhmucsanpham.TenDM', '=', 'Laptop')
//    ->where('danhmucsanpham.TrangThaiDm', '=', 'Hiện') // Kiểm tra trạng thái danh mục
//    ->where('hangsanxuat.TrangThaiHSX', '=', 'Hiện') // Kiểm tra trạng thái hãng sản xuất
//    ->get();


?>
<body>
    <script src="{{asset('dist/js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none background-header">
            <div class="container-xl p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal m-0 p-0">
                    <a href="{{route('home-page')}}">
                        <img src="{{asset('asset/img/logo.png')}}" height="60" alt=" "> </a>
                </h1>

                <form class="d-flex mx-auto col-8 col-md-6 col-lg-5" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Bạn cần tìm gì?" aria-label="Search"
                               style="border-radius: 20px 0 0 20px; box-shadow: none; border: 1px solid #ddd;">
                        <button class="btn btn-light" type="submit"
                                style="border-radius: 0 20px 20px 0; border: 1px solid #ddd; border-left: 0;">
                            <i class="bi bi-search fs-3"></i>
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
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                           data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                           aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                     class="icon icon-tabler icons-tabler-outline icon-tabler-device-laptop">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path d="M3 19l18 0" />--}}
{{--                                                    <path--}}
{{--                                                        d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">Laptop</span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            @foreach($HSX_Laptop as $laptop)--}}
{{--                                                <a class="dropdown-item" href="">--}}
{{--                                                    {{ $laptop->TenHSX }}--}}
{{--                                                </a>--}}
{{--                                            @endforeach--}}

{{--                                            @if($HSX_Laptop->isEmpty())--}}
{{--                                                <span class="dropdown-item">Không có hãng nào</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
                                    @foreach($DMSP_HSX as $item)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#navbar-help"
                                               data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                               aria-expanded="false">
                                                <span class="nav-link-title">{{ $item->TenDM }}</span>
                                            </a>
                                            <div class="dropdown-menu">
                                                @if(!empty($item->HangSanXuat))
                                                    @foreach(explode(',', $item->HangSanXuat) as $hangSX) <!-- Loại bỏ khoảng trắng sau dấu phẩy -->
                                                    <a class="dropdown-item" href="#">
                                                        {{ $hangSX }}
                                                    </a>
                                                    @endforeach
                                                @else
                                                    <span class="dropdown-item">Không có hãng nào</span>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach



                                    {{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-devices-pc">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path d="M3 5h6v14h-6z" />--}}
{{--                                                    <path d="M12 9h10v7h-10z" />--}}
{{--                                                    <path d="M14 19h6" />--}}
{{--                                                    <path d="M17 16v3" />--}}
{{--                                                    <path d="M6 13v.01" />--}}
{{--                                                    <path d="M6 16v.01" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">PC</span> </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-imac">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path--}}
{{--                                                        d="M3 4a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-12z" />--}}
{{--                                                    <path d="M3 13h18" />--}}
{{--                                                    <path d="M8 21h8" />--}}
{{--                                                    <path d="M10 17l-.5 4" />--}}
{{--                                                    <path d="M14 17l.5 4" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">Màn hình máy tính</span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                 stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                 class="icon icon-tabler icons-tabler-outline icon-tabler-cpu">--}}
{{--                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                <path d="M5 5m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />--}}
{{--                                                <path d="M9 9h6v6h-6z" />--}}
{{--                                                <path d="M3 10h2" />--}}
{{--                                                <path d="M3 14h2" />--}}
{{--                                                <path d="M10 3v2" />--}}
{{--                                                <path d="M14 3v2" />--}}
{{--                                                <path d="M21 10h-2" />--}}
{{--                                                <path d="M21 14h-2" />--}}
{{--                                                <path d="M14 21v-2" />--}}
{{--                                                <path d="M10 21v-2" />--}}
{{--                                            </svg>--}}

{{--                                            <span class="nav-link-title">Bộ nhớ lưu trữ</span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-keyboard">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path--}}
{{--                                                        d="M2 6m0 2a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-16a2 2 0 0 1 -2 -2z" />--}}
{{--                                                    <path d="M6 10l0 .01" />--}}
{{--                                                    <path d="M10 10l0 .01" />--}}
{{--                                                    <path d="M14 10l0 .01" />--}}
{{--                                                    <path d="M18 10l0 .01" />--}}
{{--                                                    <path d="M6 14l0 .01" />--}}
{{--                                                    <path d="M18 14l0 .01" />--}}
{{--                                                    <path d="M10 14l4 .01" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">--}}
{{--                                                Bàn phím--}}
{{--                                            </span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-mouse-2">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path--}}
{{--                                                        d="M6 3m0 4a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-4a4 4 0 0 1 -4 -4z" />--}}
{{--                                                    <path d="M12 3v7" />--}}
{{--                                                    <path d="M6 10h12" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">--}}
{{--                                                Chuột - Lót chuột--}}
{{--                                            </span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-headset">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path d="M4 14v-3a8 8 0 1 1 16 0v3" />--}}
{{--                                                    <path d="M18 19c0 1.657 -2.686 3 -6 3" />--}}
{{--                                                    <path--}}
{{--                                                        d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />--}}
{{--                                                    <path--}}
{{--                                                        d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">--}}
{{--                                                Tai nghe - Loa--}}
{{--                                            </span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item dropdown">--}}
{{--                                        <a class="nav-link dropdown-toggle" href="#navbar-help"--}}
{{--                                            data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"--}}
{{--                                            aria-expanded="false">--}}
{{--                                            <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-device-gamepad-2">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path--}}
{{--                                                        d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z" />--}}
{{--                                                    <path--}}
{{--                                                        d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232" />--}}
{{--                                                    <path d="M8 9v2" />--}}
{{--                                                    <path d="M7 10h2" />--}}
{{--                                                    <path d="M14 10h2" />--}}
{{--                                                </svg>--}}
{{--                                            </span> <span class="nav-link-title">--}}
{{--                                                Phụ kiện--}}
{{--                                            </span> </a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a> <a class="dropdown-item" href="">--}}

{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
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
    <footer class="main-footer mt-3 bg-white text-dark">
        <div class="container-fluid ">
            <div class="row text-center text-md-start d-flex justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                    <h4 class="text-dark">Về PC Store</h4>
                    <ul class="list-unstyled">
                        <li class="text-dark">
                            <a href="#" title="Giới thiệu" class="text-dark">Giới thiệu</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Tuyển dụng" class="text-dark">Tuyển dụng</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Khuyến mãi" class="text-dark">Khuyến mãi</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                    <h4 class="text-dark">Chính sách</h4>
                    <ul class="list-unstyled">
                        <li class="text-dark">
                            <a href="#" title="Chính sách bảo hành" class="text-dark">Chính sách bảo hành</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Chính sách giao hàng" class="text-dark">Chính sách giao hàng</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Chính sách bảo mật" class="text-dark">Chính sách bảo mật</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                    <h4 class="text-dark">Thông tin</h4>
                    <ul class="list-unstyled">
                        <li class="text-dark">
                            <a href="#" title="Hệ thống cửa hàng" class="text-dark">Hệ thống cửa hàng</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Hướng dẫn mua hàng" class="text-dark">Hướng dẫn mua hàng</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Hướng dẫn thanh toán" class="text-dark">Hướng dẫn thanh toán</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Hướng dẫn trả góp" class="text-dark">Hướng dẫn trả góp</a>
                        </li>
                        <li class="text-dark">
                            <a href="#" title="Hướng dẫn bảo hành" class="text-dark">Hướng dẫn bảo hành</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                    <h4 class="text-dark">TỔNG ĐÀI HỖ TRỢ <span>(8:00 - 21:00)</span></h4>
                    <p class="text-dark"><span>Mua hàng:</span> <a href="#" class="text-dark">1900.5301</a></p>
                    <p class="text-dark"><span>Bảo hành:</span> <a href="#" class="text-dark">1900.5325</a></p>
                    <p class="text-dark"><span>Khiếu nại:</span> <a href="#" class="text-dark">1800.6173</a></p>
                    <p class="text-dark"><span>Email:</span> <a href="#" class="text-dark">cskh@storepc.com</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Libs JS -->
    @include('lib-js')
    @yield('scripts')

    <!-- Kiểm tra trạng thái đăng nhập bằng toastr -->
    <!-- Thiết lập toastr với nút đóng -->
    <!-- Kiểm tra trạng thái đăng nhập bằng SweetAlert2 với nút chuyển hướng đến trang đăng nhập -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Kiểm tra đăng nhập cho Tra cứu đơn hàng
        const orderTrackingLink = document.querySelector('a[href="{{route('tra-cuu-don-hang')}}"]');
        orderTrackingLink.addEventListener("click", function (event) {
            @if(!session()->has('MaTK'))
            event.preventDefault();
          Swal.fire({
            title: 'Yêu cầu đăng nhập',
            text: 'Bạn cần đăng nhập để tra cứu đơn hàng.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đăng nhập',
            cancelButtonText: 'Hủy'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "{{ route('index.login') }}";
            }
          });
            @endif
        });

        // Kiểm tra đăng nhập cho Giỏ hàng
        const cartLink = document.querySelector('a[href="{{route('gio-hang')}}"]');
        cartLink.addEventListener("click", function (event) {
            @if(!session()->has('MaTK'))
            event.preventDefault();
          Swal.fire({
            title: 'Yêu cầu đăng nhập',
            text: 'Bạn cần đăng nhập để vào giỏ hàng.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đăng nhập',
            cancelButtonText: 'Hủy'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "{{ route('index.login') }}";
            }
          });
            @endif
        });
      });
    </script>



</body>
</html>
