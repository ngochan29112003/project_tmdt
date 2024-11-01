@extends('khach-hang.master')
@section('contents')

    <div class="d-flex justify-content-center my-5">
        <div class="row col-md-10 col-lg-8">
            <!-- Left Column: Product Image Carousel -->
            <div class="col-md-5">
                <div class="card">
                    <!-- Main Image Container -->
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Main Images Carousel Items -->
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
                            <img src="{{ asset('asset/img-product/2_b81eb507bdfe42b3bce05c0c9e3e92d0_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 1" data-bs-target="#productCarousel" data-bs-slide-to="0" onclick="updateMainImage(this.src)" style="width: 70px; height: 70px; cursor: pointer;">
                            <img src="{{ asset('asset/img-product/artboard_3_b5ccc140878a433db58322a5adeb8b3c_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 2" data-bs-target="#productCarousel" data-bs-slide-to="1" onclick="updateMainImage(this.src)" style="width: 70px; height: 70px; cursor: pointer;">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 3" data-bs-target="#productCarousel" data-bs-slide-to="2" onclick="updateMainImage(this.src)" style="width: 70px; height: 70px; cursor: pointer;">
                            <img src="{{ asset('asset/img-product/pc_case_xigmatek_-_26_e36ac54740974ec88f65ca6eedfd10a2_medium.png') }}" class="img-thumbnail mx-1 thumbnail-image" alt="Thumbnail 4" data-bs-target="#productCarousel" data-bs-slide-to="3" onclick="updateMainImage(this.src)" style="width: 70px; height: 70px; cursor: pointer;">
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
                <h3 class="text-danger fw-bold fs-4" style="font-size: 1.5rem;">
                    <span class="text-decoration-line-through">20,000,000₫</span> <!-- Original Price -->
                    <span class="mx-2">18,900,000₫</span> <!-- Discounted Price -->
                    <span class="badge bg-danger">-5%</span> <!-- Discount Percentage -->
                </h3>

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
    </script>
@endsection
