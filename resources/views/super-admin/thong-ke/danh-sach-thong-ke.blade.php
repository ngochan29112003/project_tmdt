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
                    <a href="{{ route('admin.reports') }}" class="nav-link text-dark">
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
                        <p class="fw-bold">{{ $totalAccounts }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng số đơn hàng</h4>
                        <p class="fw-bold">{{ $totalOrders }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng số sản phẩm</h4>
                        <p class="fw-bold">{{ $totalProducts }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm p-3 mb-4 bg-light">
                        <h4>Tổng doanh thu</h4>
                        <p class="fw-bold">{{ number_format($totalRevenue, 0, ',', '.') }} VND</p>
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
                    @foreach($customerReport as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->orders_count }}</td>
                        </tr>
                    @endforeach
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
                    @foreach($productReport as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->orders_count }}</td>
                        </tr>
                    @endforeach
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
                    @foreach($monthlyReport as $report)
                        <tr>
                            <td>{{ $report->month }}</td>
                            <td>{{ number_format($report->revenue, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
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
                    @foreach($quarterlyReport as $report)
                        <tr>
                            <td>{{ $report->quarter }}</td>
                            <td>{{ number_format($report->revenue, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
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
                    @foreach($yearlyReport as $report)
                        <tr>
                            <td>{{ $report->year }}</td>
                            <td>{{ number_format($report->revenue, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </main>
    </div>
</div>
@endsection
