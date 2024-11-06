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
                            </div>
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

        <!-- Khu vực bình luận -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div id="comments" class="bg-light p-4 rounded shadow-sm">
                    <h2 class="fw-bold">Bình luận sản phẩm</h2>
                    <!-- Hiển thị bình luận -->
                    @if(count($list_bl) > 0  )
                        <div class="comments-list">
                            @foreach($list_bl['binhluan'] as $item) <!-- Lặp qua Collection binhluan -->
                            <div class="comment-item border-bottom mb-3 pb-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <strong>{{ $item->HoTen }}</strong> <small class="text-muted">{{ $item->NgayTaoBL }}</small>
                                        <br>
                                        <span class="text-warning">{{ str_repeat('★', $item->DanhGia) }}</span>
                                    </div>
                                </div>
                                <p class="mt-2">{{ $item->NoiDungDG }}</p>

                                <!-- Hiển thị ảnh cho bình luận này -->
                                <div class="row g-2 comment-img">
                                    @foreach($item->anhbinhluan as $anh) <!-- Lặp qua ảnh của mỗi bình luận -->
                                    <div class="col-4 col-md-3 col-lg-2">
                                        <img src="{{ asset('asset/img-binh-luan/'.$anh->TenAnhBL) }}" alt="Ảnh bình luận" class="img-fluid rounded-3 border" style="height: 150px; object-fit: cover;">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{--                        <div class="comments-list">--}}
{{--                            @foreach($list_bl['binhluan'] as $item) <!-- Lặp qua Collection binhluan -->--}}
{{--                            <div class="comment-item border-bottom mb-3 pb-2">--}}
{{--                                <div class="d-flex justify-content-between align-items-start">--}}
{{--                                    <div>--}}
{{--                                        <strong>{{ $item->HoTen }}</strong> <small class="text-muted">{{ $item->NgayTaoBL }}</small>--}}
{{--                                        <br>--}}
{{--                                        <span class="text-warning">{{ str_repeat('★', $item->DanhGia) }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="mt-2">{{ $item->NoiDungDG }}</p>--}}

{{--                                <!-- Thêm phần hiển thị ảnh bình luận -->--}}
{{--                                <div class="row g-2 comment-img">--}}
{{--                                    @foreach($list_bl['anhbinhluan'] as $anh)--}}
{{--                                        <div class="col-4 col-md-3 col-lg-2">--}}
{{--                                            <img src="{{ asset('asset/img-binh-luan/'.$anh->TenAnhBL) }}" alt="Ảnh bình luận" class="img-fluid rounded-3 border" style="height: 150px; object-fit: cover;">--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
                    @else
                        <p>Chưa có bình luận nào cho sản phẩm này.</p>
                    @endif

                    @if(session()->has('MaTK'))
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="bi bi-chat-right-dots me-2"></i>
                            <span>Viết bình luận</span>
                        </button>
                    @else
                        <p class="mt-3">Vui lòng <a href="{{ route('index.login') }}" class="text-danger">Đăng nhập</a> để bình luận.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-light">Viết bình luận <br> <span class="fw-bold">{{$list_sp->TenSP}}</span></h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formGuiBL" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden"  name="MaSP" value="{{$list_sp->MaSP}}">
                        <input type="hidden"  name="MaTK" value="{{session('MaTK')}}">
                        <div class="row">
                            <div class="col-12 pb-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-12 col-sm-4 col-md-3">
                                        <label>Mức độ đánh giá</label>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-3">
                                        <div class="rating">
                                            <span data-value="1" class="star fs-1 fw-bold"><i class="bi bi-star"></i></span>
                                            <span data-value="2" class="star fs-1 fw-bold"><i class="bi bi-star"></i></span>
                                            <span data-value="3" class="star fs-1 fw-bold"><i class="bi bi-star"></i></span>
                                            <span data-value="4" class="star fs-1 fw-bold"><i class="bi bi-star"></i></span>
                                            <span data-value="5" class="star fs-1 fw-bold"><i class="bi bi-star"></i></span>
                                        </div>
                                        <input type="hidden" name="DanhGia" id="rating" value="0">
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-6">
                                        <span id="rating-text" class="text-muted">Chưa có đánh giá</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 pb-3 border-bottom">
                                <label class="form-label">Nội dung</label>
                                <textarea class="form-control" name="NoiDungDG" id="NoiDungDG" rows="6" placeholder="Nội dung bình luận.."></textarea>
                            </div>

                            <div class="col-12 mt-3 pb-3">
                                <label for="file" class="form-label">Tải lên ảnh của bạn</label>
                                <input class="form-control" type="file" id="file" name="files[]" multiple>
                                <ul id="fileList" class="list-unstyled mt-2"></ul>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function changeImage(index) {
            const carousel = document.getElementById('productCarousel');
            const carouselItems = carousel.querySelectorAll('.carousel-item');
            carouselItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }


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

    </script>
@endsection
