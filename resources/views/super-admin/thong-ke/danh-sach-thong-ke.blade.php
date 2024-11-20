@extends('super-admin.master')
@section('contents')
<div class="container-xl p-5">
    <!-- Header Section -->
    <div class="row justify-content-between align-items-center mb-5">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-7 mb-0">Dashboard</h1>
        </div>
        <div class="col-12 col-md-auto">
            <div class="col-12 col-md-auto">
                <div class="d-flex gap-3">
                    <select class="mw-100 form-select custom-select" id="salesFrom" aria-label="Sales from"
                        style="width: 200px;">
                        <option value="0" selected>Tháng</option>
                        <option value="1">Quý</option>
                        <option value="2">Năm</option>
                    </select>
                </div>
            </div>

        </div>
    </div>

    <!-- -------------------------------------------------------------- -->
    <div class="row gx-2 align-items-stretch">
        <!-- Khách hàng -->
        <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
            <div class="card card-raised bg-primary text-white h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">101</div>
                            <div class="card-text">Khách hàng</div>
                        </div>
                        <div class="icon-circle bg-white text-primary d-flex justify-content-center align-items-center"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3zM8 9a4 4 0 0 0-4 4v2h8V13a4 4 0 0 0-4-4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-arrow-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 12a.5.5 0 0 1-.5-.5V3.707L4.354 7.854a.5.5 0 0 1-.708-.708l4-4a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1-.708.708L8.5 3.707V11.5A.5.5 0 0 1 8 12z" />
                            </svg>
                            <div class="caption fw-500 me-2">3%</div>
                            <div class="caption">so với tháng trước</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sản phẩm -->
        <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
            <div class="card card-raised bg-warning text-white h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">120</div>
                            <div class="card-text">Sản phẩm</div>
                        </div>
                        <div class="icon-circle bg-white text-warning d-flex justify-content-center align-items-center"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-bag" viewBox="0 0 16 16">
                                <path
                                    d="M10 0a1 1 0 0 0-1 1v1h-2V1a1 1 0 0 0-2 0v1H2a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10V1a1 1 0 0 0-1-1zM4 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1h-8V1zM2 3h12v11H2V3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-arrow-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 4a.5.5 0 0 1 .5.5V12.293l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 12.293V4.5A.5.5 0 0 1 8 4z" />
                            </svg>
                            <div class="caption fw-500 me-2">3%</div>
                            <div class="caption">so với tháng trước</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Đơn hàng -->
        <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
            <div class="card card-raised bg-secondary text-white h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-5 text-white">50</div>
                            <div class="card-text">Đơn hàng</div>
                        </div>
                        <div class="icon-circle bg-white text-secondary d-flex justify-content-center align-items-center"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 0a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V0zM2 1v12h12V1H2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-arrow-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 12a.5.5 0 0 1-.5-.5V3.707L4.354 7.854a.5.5 0 0 1-.708-.708l4-4a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1-.708.708L8.5 3.707V11.5A.5.5 0 0 1 8 12z" />
                            </svg>
                            <div class="caption fw-500 me-2">3%</div>
                            <div class="caption">so với tháng trước</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doanh thu -->
        <div class="col-xxl-3 col-md-6 col-sm-12 mb-3">
            <div class="card card-raised bg-info text-white h-100">
                <div class="card-body p-3 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="me-2">
                            <div class="display-6 text-white text-wrap text-break">
                                <span>1.000.000.000</span>
                                VNĐ
                            </div>
                            <div class="card-text">Doanh thu</div>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5V12.293l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 12.293V4.5A.5.5 0 0 1 8 4z" />
                            </svg>
                            <div class="caption fw-500 me-2">3%</div>
                            <div class="caption">so với tháng trước</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->

    <!-- Biểu đồ phân tích doanh thu -->
    <div class="row gx-5">
        <!-- Biểu đồ phân tích doanh thu -->
        <div class="col-lg-8 mb-5">
            <div class="card card-raised h-100">
                <div class="card-header bg-primary text-white px-4">
                    <h2 class="card-title text-white mb-0">Biểu đồ tăng trưởng</h2>
                </div>
                <div class="card-body p-4">
                    <canvas id="dashboardBarChart"></canvas>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="#!" class="text-primary">Xuất báo cáo</a>
                </div>
            </div>
        </div>


        <!-- Biểu đồ sản phẩm -->
        <div class="col-lg-4 mb-5">
            <div class="card card-raised h-100">
                <div class="card-header bg-primary text-white px-4">
                    <h2 class="card-title text-white mb-0">Biểu đồ tổng sản phẩm</h2>
                </div>
                <div class="card-body p-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="#!" class="text-primary">Xuất báo cáo</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng khách hàng -->
    <div class="card card-raised mb-5">
        <div class="card-header bg-primary text-white px-4">
            <h2 class="card-title text-white mb-0">Lịch sử mua hàng của khách hàng</h2>
        </div>
        <div class="card-body p-4">
            <div class="card-footer bg-transparent">
                <a href="#!" class="text-primary">Xuất báo cáo</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col-2">STT</th>
                            <th class="col-2">Họ và tên</th>
                            <th class="col-2">SĐT</th>
                            <th class="col-3">Số đơn đã đạt</th>
                            <th class="col-3">Số tiền đã mua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Unity Pugh</td>
                            <td>9958</td>
                            <td>10</td>
                            <td>500,000 VND</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Theodore Duran</td>
                            <td>8971</td>
                            <td>15</td>
                            <td>1,200,000 VND</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kylie Bishop</td>
                            <td>3147</td>
                            <td>8</td>
                            <td>350,000 VND</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Willow Gilliam</td>
                            <td>3497</td>
                            <td>12</td>
                            <td>700,000 VND</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Blossom Dickerson</td>
                            <td>5018</td>
                            <td>5</td>
                            <td>250,000 VND</td>
                        </tr>
                        <!-- Thêm dữ liệu nếu cần -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dữ liệu cho biểu đồ tăng trưởng qua từng ngày
        var ctx = document.getElementById('dashboardBarChart').getContext('2d');
        var dashboardBarChart = new Chart(ctx, {
            type: 'line', // Sử dụng biểu đồ đường
            data: {
                labels: ['21/11/2024', '22/11/2024', '23/11/2024', '24/11/2024', '25/11/2024', '26/11/2024', '27/11/2024', '28/11/2024', '29/11/2024', '30/11/2024'], // Các ngày
                datasets: [{
                    label: 'Đơn hàng đã bán',
                    data: [2, 3, 5, 7, 8, 6, 10, 11, 9, 15], // Số đơn hàng đã bán theo từng ngày
                    borderColor: 'rgba(54, 162, 235, 1)', // Màu của đường đơn hàng
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền
                    fill: false, // Không có nền phía dưới đường
                    tension: 0.1
                }, {
                    label: 'Sản phẩm mới',
                    data: [1, 2, 4, 6, 5, 8, 6, 7, 9, 21], // Số sản phẩm mới thêm vào từng ngày
                    borderColor: 'rgba(255, 99, 132, 1)', // Màu của đường sản phẩm mới
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền
                    fill: false, // Không có nền phía dưới đường
                    tension: 0.1
                }, {
                    label: 'Khách hàng mới',
                    data: [1, 2, 3, 10, 3, 5, 6, 7, 8, 9], // Số khách hàng mới mỗi ngày
                    borderColor: 'rgba(153, 102, 255, 1)', // Màu của đường khách hàng mới
                    backgroundColor: 'rgba(153, 102, 255, 0.2)', // Màu nền
                    fill: false, // Không có nền phía dưới đường
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Biểu đồ tròn cho sản phẩm
        var ctxPie = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Đã bán', 'Tồn kho'],
                datasets: [{
                    data: [70, 30], // Dữ liệu cho sản phẩm đã bán và chưa bán
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            }
        });
    </script>

    @endsection