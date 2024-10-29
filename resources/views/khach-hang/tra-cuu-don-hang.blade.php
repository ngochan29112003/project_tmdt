@extends('khach-hang.master')
@section('contents')
    <body>
    <div class="container-xxl py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-white border rounded shadow-sm p-4">
                <div class="text-center mb-4">
                    <img src="#" class="rounded-circle mb-2" alt="User Avatar" width="80" height="80">
                    <h6 class="fw-bold">User</h6>
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
                <h1 class="fw-bold text-danger">Quản lý đơn hàng</h1>
                <ul class="nav nav-tabs mt-3 bg-white">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" href="#">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mới</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đang xử lý</a>
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
                    <img src="#" alt="No Orders" class="mb-3" width="120">
                    <p>Quý khách chưa có đơn hàng nào.</p>
                    <button class="btn btn-danger">Tiếp tục mua hàng</button>
                </div>
            </main>
        </div>
    </div>
    </body>
@endsection
