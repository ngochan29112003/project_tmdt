@extends('khach-hang.master')
@section('contents')

<<<<<<< Updated upstream
    <div class="d-flex justify-content-center my-5">
        <div class="row col-md-10 col-lg-8">
            <!-- Left Column: Product Image Carousel -->
            <div class="col-md-5">
                <div class="card">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <!-- Main Images Carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img id="mainImage" src="{{ asset('asset/img-product/2_b81eb507bdfe42b3bce05c0c9e3e92d0_medium.png') }}" class="d-block w-100 main-image" alt="Main Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('asset/img-product/artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png') }}" class="d-block w-100 main-image" alt="Main Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="d-block w-100 main-image" alt="Main Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="d-block w-100 main-image" alt="Main Image 4">
=======
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

        .rating {
            display: flex;
            direction: row-reverse;
            justify-content: flex-start;
        }

        .star i {
            color: gray; /* Màu mặc định khi chưa được đánh giá */
        }

        .star i.bi-star-fill {
            color: red; /* Màu đỏ khi ngôi sao được đánh giá */
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
                            <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhSP) }}" class="d-block w-100 rounded" alt="Ảnh chủ đề">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT1) }}" class="d-block w-100 rounded" alt="Ảnh chi tiết 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT2) }}" class="d-block w-100 rounded" alt="Ảnh chi tiết 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT3) }}" class="d-block w-100 rounded" alt="Ảnh chi tiết 3">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT4) }}" class="d-block w-100 rounded" alt="Ảnh chi tiết 4">
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
                    <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT1) }}" class="img-thumbnail border-0" alt="Ảnh chi tiết 1" style="width: 80px; cursor: pointer;" onclick="changeImage(0)">
                    <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT2) }}" class="img-thumbnail border-0" alt="Ảnh chi tiết 2" style="width: 80px; cursor: pointer;" onclick="changeImage(1)">
                    <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT3) }}" class="img-thumbnail border-0" alt="Ảnh chi tiết 3" style="width: 80px; cursor: pointer;" onclick="changeImage(2)">
                    <img src="{{ asset('asset/img-product/' . $list_sanpham->AnhCT4) }}" class="img-thumbnail border-0" alt="Ảnh chi tiết 4" style="width: 80px; cursor: pointer;" onclick="changeImage(3)">
                </div>
            </div>

            <!-- Product Details -->
             @if($list_sanpham)
                <div class="col-md-7">
                    <h1 class="fw-bold text-danger">{{$list_sanpham->TenSP}}</h1>
                    <p class="text-muted">2 đánh giá | <a href="#comments" class="text-danger">Xem đánh giá</a></p>
                    <p class="text-danger fs-3 fw-bold">{{number_format($list_sanpham->GiaBan, 0, ',', '.') }}₫ <span class="badge bg-danger ms-2">-8%</span></p>

                    <div class="bg-light p-3 mb-3 rounded shadow-sm">
                        <p class="mb-1"><strong>Quà tặng khuyến mãi:</strong></p>
                        <ul class="ps-3 mb-0">
                            <li>Giảm 100k khi mua kèm PC + màn hình</li>
                        </ul>
                    </div>

                    <button class="btn btn-danger mb-3" data-masp = "{{ $list_sanpham->MaSP }}" onclick = "addToCart(this);">Thêm vào giỏ hàng</button>

                    <!-- Product Specifications -->
                    <div class="bg-light p-3 rounded mb-4 shadow-sm">
                        <h5 class="fw-bold">Thông tin sản phẩm</h5>
                        <ul class="list-unstyled">
                            <li><strong>CPU:</strong>{{$list_ctsp->CPU}}</li>
                            <li><strong>RAM:</strong> {{$list_ctsp->Ram}}</li>
                            <li><strong>Storage:</strong> {{$list_ctsp->Storage}}</li>
                            <li><strong>Graphics:</strong> {{$list_ctsp->Graphics}}</li>
                        </ul>
                    </div>

                    <p><strong>Ưu đãi đặc biệt:</strong></p>
                    <ul class="ps-3">
                        <li>Bảo hành <a>{{$list_sanpham->ThoiGianBaoHanh}}</a></li>
                        <li>Hỗ trợ lắp đặt miễn phí.</li>
                        <li>Khuyến mãi giảm giá kèm sản phẩm.</li>
                    </ul>
                </div>
             @endif
            
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="bg-light p-4 rounded mb-4 shadow-sm " style="width: 1300px">
                    <h2 class="fw-bold">Thông tin chi tiết</h2>
                    <p class="fw-bold">PC GVN Intel i5-12400F</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>CPU:</strong>{{$list_ctsp->CPU}}</li>
                                <li><strong>RAM:</strong> {{$list_ctsp->Ram}}</li>
                                <li><strong>Storage:</strong> {{$list_ctsp->Storage}}</li>
                                <li><strong>Graphics:</strong> {{$list_ctsp->Graphics}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>Chế độ bảo hành:</strong> {{$list_sanpham->ThoiGianBaoHanh}}</li>
                                <li><strong>Hỗ trợ lắp đặt:</strong> Miễn phí</li>
                                <li><strong>Khuyến mãi:</strong> Giảm giá kèm sản phẩm</li>
                                <li><strong>Thích hợp cho:</strong> Game thủ và công việc văn phòng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p><strong>Mô tả sản phẩm:</strong></p>
                        <p>
                            {{$list_ctsp->MoTaSP}}
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
>>>>>>> Stashed changes
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Thumbnails Below the Main Image -->
                    <div class="card-body text-center mt-3">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('asset/img-product/2_b81eb507bdfe42b3bce05c0c9e3e92d0_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 1" data-bs-target="#productCarousel" data-bs-slide-to="0" onclick="updateMainImage(this.src)" style="width:100px;height:100px">
                            <img src="{{ asset('asset/img-product/artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 2" data-bs-target="#productCarousel" data-bs-slide-to="1" onclick="updateMainImage(this.src)" style="width:100px;height:100px">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 3" data-bs-target="#productCarousel" data-bs-slide-to="2" onclick="updateMainImage(this.src)" style="width:100px;height:100px">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 4" data-bs-target="#productCarousel" data-bs-slide-to="3" onclick="updateMainImage(this.src)" style="width:100px;height:100px">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Product Info -->
            <div class="col-md-7">
                <h3 class="fw-bold display-6 text-primary" style="font-size: 2rem;">Laptop HP Pavilion 15 eg0504TU i7 1165G7/8GB/512GB/Win11</h3>
                <h5 class="text-secondary">Thương hiệu: HP</h5>
                <div class="mb-2">
                    <!-- Star Rating -->
                    <span class="text-warning">
                        &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4 out of 5 stars -->
                    </span>
                </div>
                <h4 class="text-danger fw-bold fs-4" style="font-size: 1.5rem;">
                    <span class="text-decoration-line-through">20,000,000₫</span> <!-- Original Price -->
                    <span class="mx-2">18,900,000₫</span> <!-- Discounted Price -->
                    <span class="badge bg-danger">-5%</span> <!-- Discount Percentage -->
                </h4>

                <!-- Quantity Selector and Purchase Buttons -->
                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="me-3 fs-5">Số lượng:</label>
                    <input type="number" id="quantity" class="form-control" style="width: 80px;" min="1" value="1">
                </div>
                <div class="d-grid gap-2 d-md-flex">
                    <button class="btn btn-danger me-2 btn-lg px-4">Mua Ngay</button>
                    <button class="btn btn-outline-secondary btn-lg px-4">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Highlighted Features Section -->
    <div class="d-flex justify-content-center my-5">
        <div class="row col-md-10 col-lg-8">
            <div class="col-12 product-content card border-0">
                <div class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                    <h2 class="heading-bar__title fs-4 text-primary fw-bold">
                        ĐẶC ĐIỂM NỔI BẬT
                    </h2>
                </div>
                <div class="rte js-product-getcontent product_getcontent pos-relative p-3 border rounded shadow-sm" style="--maxHeightContent: 350px; background-color: #f9f9f9;">
                    <div id="content" class="content js-content fs-5 text-secondary">
                        <p>– CPU: Intel Core i7-1165G7<br>
                            – Màn hình: 15.6″ IPS (1920 x 1080)<br>
                            – RAM: 2 x 4GB DDR4 3200MHz<br>
                            – Đồ họa: Intel Iris Xe Graphics<br>
                            – Lưu trữ: 512GB SSD M.2 NVMe<br>
                            – Hệ điều hành: Windows 11<br>
                            – Pin: 3 cell 41 Wh Pin liền<br>
                            – Khối lượng: 1.6 kg
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="d-flex justify-content-center my-5">
        <div class="row col-md-10 col-lg-8">
            <div class="col-12 product-content card border-0">
                <div class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                    <h2 class="heading-bar__title fs-4 text-primary fw-bold">
                        BÌNH LUẬN
                    </h2>
                </div>

                <!-- Existing Comments Display -->
                <div id="commentsList" class="p-3">
                    <h5 class="text-secondary">Các bình luận:</h5>
                    <div class="list-group" id="commentContainer">
                        <!-- Example Comment -->
                        <div class="list-group-item border rounded-3 mb-2">
                            <h6 class="fw-bold">Nguyễn Văn A</h6>
                            <p class="text-secondary">Sản phẩm rất tốt, mình đã sử dụng và rất hài lòng!</p>
                        </div>
                        <div class="list-group-item border rounded-3 mb-2">
                            <h6 class="fw-bold">Trần Thị B</h6>
                            <p class="text-secondary">Giá cả hợp lý, dịch vụ giao hàng nhanh chóng!</p>
                        </div>
                    </div>
                </div>

                <!-- Comment Submission Form -->
                <div class="p-3 border-top mt-3">
                    <form id="commentForm">
                        <div class="mb-3">
                            <textarea class="form-control" id="commentText" rows="3" placeholder="Nội dung bình luận" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Gửi bình luận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style>
        /* Main Image Styling */
        .main-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Thumbnail Styling */
        .thumbnail-image {
            width: 30px; /* Set the width of the thumbnails to 30px */
            height: 30px; /* Set the height of the thumbnails to 30px */
            border-radius: 50%; /* Make the images circular */
            object-fit: cover; /* Ensure the image fits within the circle */
            cursor: pointer;
            transition: border 0.3s ease;
        }
        .thumbnail-image:hover {
            border: 2px solid #dc3545;
        }

        /* Disable pointer cursor on the comments section */
        #commentContainer {
            cursor: default; /* Changes the cursor to the default arrow */
        }

        /* Button and Text Styling */
        .btn-lg {
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
        }
        .btn-danger {
            background-color: #ff4a4a;
            border: none;
            font-weight: bold;
            border-radius: 8px;
        }
        .btn-outline-secondary {
            border: 2px solid #ccc;
            font-weight: bold;
            border-radius: 8px;
            color: #6c757d;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function updateMainImage(src) {
            const mainImage = document.querySelector('#mainImage');
            mainImage.src = src;
        }
<<<<<<< Updated upstream
=======


        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('mouseover', function() {
                const value = this.getAttribute('data-value');

                // Đổi tất cả các sao thành bi-star
                document.querySelectorAll('.star').forEach(s => {
                    s.querySelector('i').classList.remove('bi-star-fill');
                    s.querySelector('i').classList.add('bi-star');
                });

                // Đổi các sao tương ứng thành bi-star-fill
                for (let i = 0; i < value; i++) {
                    document.querySelectorAll('.star')[i].querySelector('i').classList.remove('bi-star');
                    document.querySelectorAll('.star')[i].querySelector('i').classList.add('bi-star-fill');
                }
            });

            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('rating').value = value; // Gán giá trị vào input ẩn

                // Cập nhật mức độ đánh giá bằng chữ
                const ratingText = document.getElementById('rating-text');
                switch (value) {
                    case '1':
                        ratingText.textContent = "Rất không hài lòng";
                        break;
                    case '2':
                        ratingText.textContent = "Không hài lòng";
                        break;
                    case '3':
                        ratingText.textContent = "Bình thường";
                        break;
                    case '4':
                        ratingText.textContent = "Tốt";
                        break;
                    case '5':
                        ratingText.textContent = "Xuất sắc";
                        break;
                    default:
                        ratingText.textContent = "Chưa có đánh giá";
                }

                // Đổi tất cả các sao thành bi-star
                document.querySelectorAll('.star').forEach(s => {
                    s.querySelector('i').classList.remove('bi-star-fill');
                    s.querySelector('i').classList.add('bi-star');
                });

                // Đổi các sao tương ứng thành bi-star-fill
                for (let i = 0; i < value; i++) {
                    document.querySelectorAll('.star')[i].querySelector('i').classList.remove('bi-star');
                    document.querySelectorAll('.star')[i].querySelector('i').classList.add('bi-star-fill');
                }
            });
        });

        // Reset lại ngôi sao khi rời khỏi vùng đánh giá
        document.querySelector('.rating').addEventListener('mouseleave', function() {
            const ratingValue = document.getElementById('rating').value;

            // Đổi tất cả các sao thành bi-star
            document.querySelectorAll('.star').forEach(s => {
                s.querySelector('i').classList.remove('bi-star-fill');
                s.querySelector('i').classList.add('bi-star');
            });

            // Đổi lại các sao tương ứng theo giá trị trong input ẩn
            for (let i = 0; i < ratingValue; i++) {
                document.querySelectorAll('.star')[i].querySelector('i').classList.remove('bi-star');
                document.querySelectorAll('.star')[i].querySelector('i').classList.add('bi-star-fill');
            }
        });


        const fileArray = [];
        const input = document.getElementById('file');

        input.addEventListener('change', function () {
            const fileList = document.getElementById('fileList');
            const allowedExtensions = ['jpg', 'jpeg', 'png'];
            fileArray.length = 0; // Clear the array

            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                const fileExtension = file.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    toastr.error("Chỉ được tải lên các file có định dạng: jpg, jpeg, png", "Lỗi");
                    continue; // Skip invalid file
                }
                fileArray.push(file);
            }

            updateFileList();
        });

        function updateFileList() {
            const dataTransfer = new DataTransfer();
            fileArray.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;

            const fileList = document.getElementById('fileList');
            fileList.innerHTML = '';
            fileArray.forEach((file, index) => {
                const li = document.createElement('li');
                li.className = 'mb-3 d-flex justify-content-between align-items-center text-truncate file-list-item';

                let displayName = file.name;
                const extension = displayName.split('.').pop();
                const baseName = displayName.substring(0, displayName.lastIndexOf('.'));
                if (baseName.length > 30) {
                    displayName = baseName.substring(0, 25) + '...' + '.' + extension;
                } else {
                    displayName = baseName + '.' + extension;
                }

                li.textContent = displayName + ' ';

                const removeBtn = document.createElement('button');
                removeBtn.textContent = 'Xóa';
                removeBtn.className = 'btn btn-danger btn-sm ms-2';
                removeBtn.onclick = function () {
                    fileArray.splice(index, 1);
                    updateFileList();
                };

                li.appendChild(removeBtn);
                fileList.appendChild(li);
            });
        }

        $('#formGuiBL').submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            fileArray.forEach(file => formData.append('files[]', file));

            // Add the current date to NgayTaoBL
            const currentDate = new Date().toISOString().split('T')[0];
            formData.append('NgayTaoBL', currentDate);

            $.ajax({
                url: '{{ route('them-binh-luan') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#modal').modal('hide');
                        toastr.success(response.message, "Thành công");
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        toastr.error(response.message, "Lỗi");
                    }
                },
                error: function (xhr) {
                    const response = xhr.responseJSON;
                    if (xhr.status === 400) {
                        toastr.error(response.message, "Lỗi");
                    } else {
                        toastr.error("Có lỗi xảy ra", "Lỗi");
                    }
                }
            });
        });

        ///thêm giỏ hàng
        function addToCart(buttonElement) {
        var loggedIn = @json(session()->has('MaTK')); // Kiểm tra đăng nhập từ session PHP

        if (loggedIn) {
          var productId = buttonElement.getAttribute('data-masp');
          $.ajax({
            url: '{{ route('them-gio-hang') }}',
            type: 'POST',
            data: {
              MaSP: productId,
              _token: '{{ csrf_token() }}' // CSRF token cho bảo mật
            },
            success: function(response) {
              Swal.fire({
                title: 'Thành công!',
                text: response.message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
              });
              setTimeout(function () {
                location.reload(); // Chuyển hướng người dùng
              }, 1000);

            },
            error: function(error) {
              Swal.fire({
                title: 'Lỗi!',
                text: 'Không thể thêm sản phẩm vào giỏ hàng.',
                icon: 'error',
                timer: 3000,
                showConfirmButton: false
              });
            }
          });
        } else {
          Swal.fire({
            title: 'Yêu cầu đăng nhập',
            text: 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đăng nhập',
            cancelButtonText: 'Hủy'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "{{ route('index.login') }}";
            }
          });
        }
      }

>>>>>>> Stashed changes
    </script>
@endsection
