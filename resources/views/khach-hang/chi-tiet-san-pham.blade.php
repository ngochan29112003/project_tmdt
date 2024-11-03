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
                <h1 class="fw-bold text-primary">PC GVN Intel i5-12400F / VGA RX 6500XT (H610)</h1>
                <p class="text-muted">2 đánh giá | <a href="#comments" class="text-primary">Xem đánh giá</a></p>
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

        <!-- Product Specifications and Similar Products Section -->
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="bg-light p-3 rounded mb-4 shadow-sm">
                    <h2 class="fw-bold">Thông tin chi tiết</h2>
                    <p><strong>PC GVN Intel i5-12400F</strong></p>
                    <p>Chi tiết kỹ thuật sản phẩm: CPU, RAM, ổ cứng, đồ họa, v.v.</p>
                </div>
            </div>
        </div>

        <!-- Suggested Products Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h2 class="fw-bold mb-3">Sản phẩm tương tự</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="img-thumbnail me-3" style="width: 80px; height: 80px;" alt="Related Product 1">
                            <div>
                                <p class="mb-0 fw-semibold">PC Gaming 1</p>
                                <a href="#"><small class="text-muted">Chi tiết sản phẩm</small></a>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="img-thumbnail me-3" style="width: 80px; height: 80px;" alt="Related Product 2">
                            <div>
                                <p class="mb-0 fw-semibold">PC Gaming 2</p>
                                <a href="#"><small class="text-muted">Chi tiết sản phẩm</small></a>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_23_c6832c0dded9424e83cd361ffce6c901_1024x1024.webp') }}" class="img-thumbnail me-3" style="width: 80px; height: 80px;" alt="Related Product 3">
                            <div>
                                <p class="mb-0 fw-semibold">PC Gaming 3</p>
                                <a href="#"><small class="text-muted">Chi tiết sản phẩm</small></a>
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
            const carousel = document.querySelector('#productCarousel .carousel-inner');
            const items = carousel.querySelectorAll('.carousel-item');
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }


        function changeImage(index) {
            const carousel = document.querySelector('#productCarousel .carousel-inner');
            const items = carousel.querySelectorAll('.carousel-item');
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }

        function submitComment(event) {
            event.preventDefault(); // Ngăn chặn gửi form
            const commentInput = document.getElementById('commentInput');
            const commentsDiv = document.getElementById('comments');

            // Tạo phần bình luận mới
            const newComment = document.createElement('div');
            newComment.classList.add('comment', 'mb-2');
            newComment.innerHTML = `<strong>Bạn:</strong><p>${commentInput.value}</p>`;

            // Thêm bình luận vào danh sách bình luận
            commentsDiv.appendChild(newComment);

            // Xóa nội dung trong ô nhập
            commentInput.value = '';
        }

        //Khi bấm vào phần xem aánh giá sẽ cuộn xuống
        document.querySelector('a[href="#comments"]').addEventListener('click', function(event) {
            event.preventDefault();
            const target = document.getElementById('comments');
            target.scrollIntoView({ behavior: 'smooth' });
        });


    </script>
@endsection
