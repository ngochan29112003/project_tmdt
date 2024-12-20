@extends('khach-hang.master')
@section('contents')
    <style>
        .hover-red {
            transition: background-color 0.3s, color 0.3s;
        }

        .hover-red:hover {
            background-color: #f8d7da;
            color: #dc3545;
        }
    </style>
    <body>
    <div class="container-xxl py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-white border rounded flex-wrap shadow-sm p-4">
                <div class="text-center mb-4">
                    <img src="{{asset('asset/img/user.jpg')}}" class="rounded-circle mb-2" alt="User Avatar" width="80" height="80">
                    <h3 class="fw-bold">chị Bảy</h3>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-dark hover-red">
                            <i class="bi bi-geo-alt-fill me-2"></i>Số địa chỉ
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-dark hover-red">
                            <i class="bi bi-briefcase-fill me-2"></i>Quản lý đơn hàng
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-dark hover-red">
                            <i class="bi bi-eye-fill me-2"></i>Sản phẩm đã xem
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 p-4">
                <h1 class="fw-bold text-danger" >Quản lý đơn hàng</h1>
                <ul class="nav nav-tabs flex-wrap mt-3 bg-white">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" href="#">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang xử lý</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang soạn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang chờ vận chuyển</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang vận chuyển</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hoàn thành</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hủy</a>
                    </li>
                </ul>

                <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="Tìm đơn hàng theo Mã đơn hàng">
                    <button class="btn btn-outline-secondary">Tìm đơn hàng</button>
                </div>

                <div class="text-center mt-5 bg-white">
                    <img src="{{asset('asset/img/no_oder.jpg')}}" alt="No Orders" class="mb-3" width="120">
                    <p>Quý khách chưa có đơn hàng nào.</p>
                    <a class="btn btn-danger" href="{{ route('home-page') }}">Tiếp tục mua hàng</a>
                </div>
            </main>
        </div>
    </div>
    </body>
@endsection
