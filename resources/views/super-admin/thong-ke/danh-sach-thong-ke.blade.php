@extends('super-admin.master')

@section('contents')
<div class="container-xxl py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-white border rounded flex-wrap shadow-sm p-4">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-dark">
                        <i class="bi bi-house-door-fill me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-dark">
                        <i class="bi bi-bar-chart-fill me-2"></i>Thống kê báo cáo
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 p-4">
            <h1 class="fw-bold text-danger">Báo cáo thống kê</h1>

            <!-- Tổng quan báo cáo -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng số tài khoản</h4>
                        <p class="fw-bold">1,200</p> <!-- Dữ liệu tĩnh có thể thay bằng dữ liệu động -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng số đơn hàng</h4>
                        <p class="fw-bold">850</p> <!-- Dữ liệu tĩnh -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng số sản phẩm</h4>
                        <p class="fw-bold">500</p> <!-- Dữ liệu tĩnh -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng doanh thu</h4>
                        <p class="fw-bold">1,500,000 VND</p> <!-- Dữ liệu tĩnh -->
                    </div>
                </div>
            </div>

            <!-- Báo cáo theo khách hàng (số đơn hàng giảm dần) -->
            <h3 class="fw-bold mt-4">Báo cáo theo khách hàng</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Số đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nguyễn Văn A</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Trần Thị B</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lê Văn C</td>
                        <td>15</td>
                    </tr>
                </tbody>
            </table>

            <!-- Báo cáo theo sản phẩm (bán chạy nhất) -->
            <h3 class="fw-bold mt-4">Báo cáo theo sản phẩm</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng bán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sản phẩm A</td>
                        <td>120</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sản phẩm B</td>
                        <td>110</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Sản phẩm C</td>
                        <td>95</td>
                    </tr>
                </tbody>
            </table>

            <!-- Báo cáo theo tháng -->
            <h3 class="fw-bold mt-4">Báo cáo theo tháng</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tháng 1</td>
                        <td>150,000 VND</td>
                    </tr>
                    <tr>
                        <td>Tháng 2</td>
                        <td>180,000 VND</td>
                    </tr>
                    <tr>
                        <td>Tháng 3</td>
                        <td>200,000 VND</td>
                    </tr>
                </tbody>
            </table>

            <!-- Báo cáo theo quý -->
            <h3 class="fw-bold mt-4">Báo cáo theo quý</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Quý</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Quý 1</td>
                        <td>500,000 VND</td>
                    </tr>
                    <tr>
                        <td>Quý 2</td>
                        <td>600,000 VND</td>
                    </tr>
                </tbody>
            </table>

            <!-- Báo cáo theo năm -->
            <h3 class="fw-bold mt-4">Báo cáo theo năm</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Năm</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024</td>
                        <td>1,200,000 VND</td>
                    </tr>
                    <tr>
                        <td>2023</td>
                        <td>1,000,000 VND</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</div>
@endsection
