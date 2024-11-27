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

        .paid-status {
            color: white;
            background-color: #28a745;
            /* Green for "Paid" */
            padding: 5px;
            border-radius: 3px;
            font-weight: bold;
        }

        .unpaid-status {
            color: white;
            background-color: #dc3545;
            /* Red for "Unpaid" */
            padding: 5px;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>

    <body>
    <div class="container-xxl py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-white border rounded flex-wrap shadow-sm p-4">
                <div class="text-center mb-4">
                    <img src="{{asset('asset/img/user.jpg')}}" class="rounded-circle mb-2" alt="User Avatar" width="80"
                         height="80">
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
                    <li>
                        <a class="btn btn-danger" href="{{ route('home-page') }}">Tiếp tục mua hàng</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 p-4">

                <!-- Thông báo thành công hoặc lỗi -->
                <!-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif -->

                <h1 class="fw-bold text-danger">Quản lý đơn hàng</h1>
                <ul class="nav nav-tabs flex-wrap mt-3 bg-white">
                    <li class="nav-item">
                        <button class="nav-link btn-all">Tất cả</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-1">Đang xử lý</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-2">Đang soạn hàng</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-3">Đang chờ vận chuyển</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-4">Đang vận chuyển</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-5">Hoàn thành</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn-6">Đã hủy</button>
                    </li>
                </ul>

                <!-- <div class="input-group my-3">
                    <input type="text" class="form-control" placeholder="Tìm đơn hàng theo Mã đơn hàng">
                    <button class="btn btn-outline-secondary">Tìm đơn hàng</button>
                </div> -->

                <!-- Nơi hiển thị danh sách đơn hàng -->
                <div id="order-list" class="mt-4">
                    <!-- Dữ liệu đơn hàng sẽ được hiển thị ở đây -->
                </div>

                <div id="no-orders" class="text-center mt-5 bg-white" style="display: none;">
                    <img src="{{asset('asset/img/no_oder.jpg')}}" alt="No Orders" class="mb-3" width="120">
                    <p>Quý khách chưa có đơn hàng nào.</p>
                    <a class="btn btn-danger" href="{{ route('home-page') }}">Tiếp tục mua hàng</a>
                </div>

                <!-- <div class="text-center mt-5 bg-white">
                    <img src="{{asset('asset/img/no_oder.jpg')}}" alt="No Orders" class="mb-3" width="120">
                    <p>Quý khách chưa có đơn hàng nào.</p>
                    <a class="btn btn-danger" href="{{ route('home-page') }}">Tiếp tục mua hàng</a>
                </div> -->
            </main>
        </div>
    </div>
    </body>

@endsection
@section("scripts")
    <script>
        $(document).ready(function () {
            // Load all orders initially when the page loads
            loadAllOrders();

            // Event for "Tất cả" button
            $('.btn-all').on('click', function () {
                loadAllOrders();
            });

            // Event for the status buttons
            $('.btn-1').on('click', function () {
                loadOrdersByStatus(1);  // Trạng thái 1 (Đang xử lý)
            });
            $('.btn-2').on('click', function () {
                loadOrdersByStatus(2);  // Trạng thái 2 (Đang soạn hàng)
            });
            $('.btn-3').on('click', function () {
                loadOrdersByStatus(3);  // Trạng thái 3 (Đang chờ vận chuyển)
            });
            $('.btn-4').on('click', function () {
                loadOrdersByStatus(4);  // Trạng thái 4 (Đang vận chuyển)
            });
            $('.btn-5').on('click', function () {
                loadOrdersByStatus(5);  // Trạng thái 5 (Hoàn thành)
            });
            $('.btn-6').on('click', function () {
                loadOrdersByStatus(6);  // Trạng thái 6 (Đã hủy)
            });

            // Function to load all orders
            function loadAllOrders() {
                $.ajax({
                    url: '{{ route('all-data') }}',  // The URL to fetch all orders
                    method: 'GET',
                    success: function (response) {
                        if (response.length === 0) {
                            $('#order-list').hide();  // Ẩn danh sách đơn hàng
                            $('#no-orders').show();   // Hiển thị thông báo "chưa có đơn hàng"
                        } else {
                            $('#order-list').show();  // Hiển thị lại danh sách đơn hàng
                            displayOrders_ALL(response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Có lỗi xảy ra: " + error);
                        $('#order-list').hide();
                        $('#no-orders').show(); // Hiển thị thông báo lỗi
                    }
                });
            }

            // Function to load orders by status
            function loadOrdersByStatus(trangthai) {
                $.ajax({
                    url: '{{ route('get-donhang-trangthai', ':trangthai') }}'.replace(':trangthai', trangthai),
                    method: 'GET',
                    success: function (response) {
                        // Xóa hết danh sách đơn hàng cũ
                        $('#order-list').html('');  // Xóa tất cả các đơn hàng hiện tại

                        // Kiểm tra nếu không có đơn hàng nào
                        if (response.length === 0 || response.message === 'No orders found') {
                            $('#order-list').hide();  // Ẩn danh sách đơn hàng
                            $('#no-orders').show();   // Hiển thị thông báo "chưa có đơn hàng"
                        } else {
                            $('#order-list').show();  // Hiển thị lại danh sách đơn hàng
                            displayOrders_TT(response);  // Hiển thị danh sách đơn hàng mới
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Có lỗi xảy ra: " + error);
                        $('#order-list').hide();  // Ẩn danh sách đơn hàng
                        $('#no-orders').show();   // Hiển thị thông báo lỗi
                    }
                });
            }

            // Function to display the orders
            function displayOrders_TT(orders) {
                var orderListHtml = '';
                orders.forEach(function (order) {
                    var formattedTotal = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(order.TongTien);

                    var thanhToanStatusClass = order.ThanhToan.trim() === '1' ? 'paid-status' : 'unpaid-status';
                    var thanhToanStatusText = order.ThanhToan.trim() === '1' ? 'Đã thanh toán' : 'Chưa thanh toán';

                    orderListHtml += `
                    <div class="order-item border rounded p-4 mb-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Mã đơn:</strong> ${order.MaDH}</p>
                                <p><strong>SĐT:</strong> ${order.SDT}</p>
                                <p><strong>Địa chỉ đơn hàng:</strong> ${order.DiaChiGiaoHang}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>PTTT:</strong> ${order.TenPTTT}</p>
                                <p><strong>Ngày mua:</strong> ${order.NgayTaoDH}</p>
                                <p><strong>Tổng tiền:</strong> ${formattedTotal}</p>
                                <p class="${thanhToanStatusClass}"><strong>Trạng thái thanh toán:</strong> ${thanhToanStatusText}</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        ${order.TenPTTT === 'Thanh toán trực tuyến' && order.ThanhToan === '0' && order.MaTT != 6 ? `
                        <form action="{{ route('thanh-toan-vnpay') }}" method="POST">
                            @csrf
                    <input type="hidden" id="ma_don_hang" name="redirect" value="${order.MaDH}">
                            <button type="submit" class="btn btn-primary">Thanh toán Online</button>
                        </form>
                        ` : ''}
                         ${(order.MaTT === 1 || order.MaTT === 2) && order.ThanhToan === '0' ? `
                        <button class="btn btn-danger mt-2 cancel-order-btn" data-id="${order.MaDH}">Hủy đơn</button>
                        ` : ''}
                    </div>
                    `;
                });
                $('#order-list').html(orderListHtml);
                $('#no-orders').hide();  // Hide "no orders" message
            }

            function displayOrders_ALL(orders) {
                var orderListHtml = '';
                orders.forEach(function (order) {
                    var formattedTotal = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(order.TongTien);

                    // Determine the payment status class based on payment status
                    var thanhToanStatusClass = order.ThanhToan.trim() === '1' ? 'paid-status' : 'unpaid-status';
                    var thanhToanStatusText = order.ThanhToan.trim() === '1' ? 'Đã thanh toán' : 'Chưa thanh toán';

                    orderListHtml += `
                    <div class="order-item border rounded p-4 mb-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Mã đơn:</strong> ${order.MaDH}</p>
                                <p><strong>SĐT:</strong> ${order.SDT}</p>
                                <p><strong>Địa chỉ đơn hàng:</strong> ${order.DiaChiGiaoHang}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>PTTT:</strong> ${order.TenPTTT}</p>
                                <p><strong>Ngày mua:</strong> ${order.NgayTaoDH}</p>
                                <p><strong>Tổng tiền:</strong> ${formattedTotal}</p>
                                <p class="${thanhToanStatusClass}"><strong>Trạng thái thanh toán:</strong> ${thanhToanStatusText}</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        ${order.TenPTTT === 'Thanh toán trực tuyến' && order.ThanhToan === '0' && order.MaTT != 6 ? `
                        <form action="{{ route('thanh-toan-vnpay') }}" method="POST">
                            @csrf
                    <input type="hidden" id="ma_don_hang" name="redirect" value="${order.MaDH}">
                            <button type="submit" class="btn btn-primary">Thanh toán Online</button>
                        </form>
                        ` : ''}
                         ${(order.MaTT === 1 || order.MaTT === 2) && order.ThanhToan === '0' ? `
                        <button class="btn btn-danger mt-2 cancel-order-btn" data-id="${order.MaDH}">Hủy đơn</button>
                        ` : ''}
                    </div>
                    `;
                });
                $('#order-list').html(orderListHtml);
                $('#no-orders').hide();  // Hide "no orders" message
            }
        });

        $('#order-list').on('click', '.cancel-order-btn', function () {
            var maDH = $(this).data('id'); // Lấy mã đơn hàng từ nút
            var orderItem = $(this).closest('.order-item'); // Lấy phần tử đơn hàng

            // Hiển thị thông báo xác nhận với Swal
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn hủy đơn hàng này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu AJAX để hủy đơn hàng
                    $.ajax({
                        url: '{{ route('huy-don-hang', ':id') }}'.replace(':id', maDH),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Đã hủy đơn hàng thành công");

                                // Xóa hoặc cập nhật trạng thái đơn hàng trên giao diện
                                orderItem.remove();
                                if ($('#order-list').children().length === 0) {
                                    $('#no-orders').show(); // Hiển thị thông báo nếu không còn đơn hàng
                                }
                            } else {
                                toastr.error(response.message, "Hủy đơn không thành công");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("Đã xảy ra lỗi khi hủy đơn hàng", "Error");
                        }
                    });
                }
            });
        });

    </script>
@endsection

