@extends('khach-hang.master')
@section('contents')
    <style>
        /* Ẩn các nút điều khiển carousel mặc định */
        .carousel-control-prev,
        .carousel-control-next {
            opacity: 0;
            transition: opacity 0.3s;
            background-color: rgba(0, 0, 0, 0.5); /* Màu đen mờ */
            border-radius: 50%; /* Làm cho nút tròn */
            width: 40px; /* Kích thước nhỏ gọn của nút */
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%; /* Đặt vị trí ở giữa theo chiều dọc */
            transform: translateY(-50%); /* Căn chỉnh giữa theo chiều dọc */
        }

        /* Hiển thị các nút khi rê chuột vào carousel */
        #productCarousel:hover .carousel-control-prev,
        #productCarousel:hover .carousel-control-next {
            opacity: 1;
        }

        /* Tùy chỉnh biểu tượng mũi tên */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1); /* Đổi màu biểu tượng sang trắng */
            width: 20px; /* Giảm kích thước biểu tượng */
            height: 20px;
        }

        /* Định dạng cho các phần tử bình luận */
        .comment {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }

        /* Định dạng cho nút gửi bình luận */
        .btn-submit {
            background-color: #dc3545;
            color: #fff;
        }

        /* Định dạng cho tiêu đề sản phẩm */
        h1 {
            font-size: 2rem;
        }
    </style>
    <div class="container my-5">
        <div class="row">
            <!-- Image Carousel and Thumbnails -->
            <div class="col-md-5 bg-white rounded shadow-sm p-3">
                <!-- Carousel -->
                <div id="productCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_1024x1024.webp') }}" class="d-block w-100 rounded" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_24_936cc341c90748bfa4fa7363b114291b_1024x1024.webp') }}" class="d-block w-100 rounded" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="d-block w-100 rounded" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_22_e4c822262b3d4946a6f427d02adebf8b_1024x1024.webp') }}" class="d-block w-100 rounded" alt="Image 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev btn btn-dark rounded-circle shadow-sm" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next btn btn-dark rounded-circle shadow-sm" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Thumbnails -->
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_1024x1024.webp') }}" class="img-thumbnail border-0" alt="Thumbnail 1" style="width: 80px; cursor: pointer;" onclick="changeImage(0)">
                    <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_24_936cc341c90748bfa4fa7363b114291b_1024x1024.webp') }}" class="img-thumbnail border-0" alt="Thumbnail 2" style="width: 80px; cursor: pointer;" onclick="changeImage(1)">
                    <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="img-thumbnail border-0" alt="Thumbnail 3" style="width: 80px; cursor: pointer;" onclick="changeImage(2)">
                    <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_22_e4c822262b3d4946a6f427d02adebf8b_1024x1024.webp') }}" class="img-thumbnail border-0" alt="Thumbnail 4" style="width: 80px; cursor: pointer;" onclick="changeImage(3)">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-7">
                <h1 class="fw-bold text-danger">PC GVN Intel i5-12400F / VGA RX 6500XT (H610)</h1>
                <p class="text-muted">2 đánh giá | <a href="#comments" class="text-danger">Xem đánh giá</a></p>
                <p class="text-danger fs-3 fw-bold">11.990.000₫ <span class="badge bg-danger ms-2">-8%</span></p>

                <div class="bg-light p-3 mb-3 rounded shadow-sm">
                    <p class="mb-1"><strong>Quà tặng khuyến mãi:</strong></p>
                    <ul class="ps-3 mb-0">
                        <li>Giảm 100k khi mua kèm PC + màn hình</li>
                    </ul>
                </div>

                <button class="btn btn-danger mb-3">Mua Ngay</button>
                <button class="btn btn-outline-danger mb-3">Trả Góp 0%</button>

                <!-- Product Specifications -->
                <div class="bg-light p-3 rounded mb-4 shadow-sm">
                    <h5 class="fw-bold">Thông tin sản phẩm</h5>
                    <ul class="list-unstyled">
                        <li><strong>CPU:</strong> Intel Core i5</li>
                        <li><strong>RAM:</strong> 16GB</li>
                        <li><strong>Storage:</strong> 512GB SSD</li>
                        <li><strong>Graphics:</strong> RX 6500XT</li>
                    </ul>
                </div>

                <p><strong>Ưu đãi đặc biệt:</strong></p>
                <ul class="ps-3">
                    <li>Bảo hành 36 tháng.</li>
                    <li>Hỗ trợ lắp đặt miễn phí.</li>
                    <li>Khuyến mãi giảm giá kèm sản phẩm.</li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="bg-light p-4 rounded mb-4 shadow-sm " style="width: 1300px">
                    <h2 class="fw-bold">Thông tin chi tiết</h2>
                    <p class="fw-bold">PC GVN Intel i5-12400F</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>CPU:</strong> Intel Core i5-12400F</li>
                                <li><strong>RAM:</strong> 16GB DDR4</li>
                                <li><strong>Storage:</strong> 512GB SSD</li>
                                <li><strong>Graphics:</strong> RX 6500XT</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>Chế độ bảo hành:</strong> 36 tháng</li>
                                <li><strong>Hỗ trợ lắp đặt:</strong> Miễn phí</li>
                                <li><strong>Khuyến mãi:</strong> Giảm giá kèm sản phẩm</li>
                                <li><strong>Thích hợp cho:</strong> Game thủ và công việc văn phòng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p><strong>Mô tả sản phẩm:</strong></p>
                        <p>
                            PC GVN Intel i5-12400F là một trong những lựa chọn tối ưu cho người dùng yêu thích công nghệ. Với cấu hình mạnh mẽ, sản phẩm này không chỉ phù hợp cho game thủ mà còn đáp ứng tốt cho nhu cầu làm việc văn phòng, chỉnh sửa video, và nhiều tác vụ đòi hỏi hiệu suất cao khác.
                        </p>
                        <p>
                            Thiết kế hiện đại và tản nhiệt hiệu quả giúp máy luôn vận hành mượt mà, mang đến trải nghiệm tuyệt vời cho người dùng. Bạn sẽ không phải lo lắng về việc máy bị nóng khi hoạt động trong thời gian dài.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h2 class="fw-bold mb-3">Sản phẩm tương tự</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="card-img-top" alt="Similar Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">PC GVN Intel i5-11400</h5>
                                    <p class="card-text text-danger fw-bold">9.990.000₫</p>
                                    <button class="btn btn-danger">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_24_936cc341c90748bfa4fa7363b114291b_1024x1024.webp') }}" class="card-img-top" alt="Similar Product 2">
                                <div class="card-body">
                                    <h5 class="card-title">PC GVN AMD Ryzen 5</h5>
                                    <p class="card-text text-danger fw-bold">10.490.000₫</p>
                                    <button class="btn btn-danger">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_22_e4c822262b3d4946a6f427d02adebf8b_1024x1024.webp') }}" class="card-img-top" alt="Similar Product 3">
                                <div class="card-body">
                                    <h5 class="card-title">PC GVN Intel i7-12700F</h5>
                                    <p class="card-text text-danger fw-bold">15.490.000₫</p>
                                    <button class="btn btn-danger">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="bg-light p-4 rounded shadow-sm">
                        <h2 class="fw-bold mb-4">Bình luận</h2>
                        <div class="comments-list mb-3" id="comments">
                            <div class="comment mb-3 p-3 border rounded">
                                <strong>Người dùng 1:</strong>
                                <p>Rất tốt, tôi hài lòng với sản phẩm này!</p>
                            </div>
                            <div class="comment mb-3 p-3 border rounded">
                                <strong>Người dùng 2:</strong>
                                <p>Chất lượng tuyệt vời, tôi khuyên bạn nên mua!</p>
                            </div>
                        </div>

                        <form id="commentForm" onsubmit="submitComment(event)">
                            <div class="mb-3">
                                <label for="commentInput" class="form-label">Thêm bình luận:</label>
                                <textarea id="commentInput" class="form-control" rows="3" placeholder="Nhập bình luận của bạn ở đây..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeImage(index) {
            const carousel = document.getElementById('productCarousel');
            const carouselItems = carousel.querySelectorAll('.carousel-item');
            carouselItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }
    </script>
@endsection
