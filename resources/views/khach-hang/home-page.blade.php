@extends('khach-hang.master')
@section('contents')
    <!-- CSS -->
    <style>
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 950px;
            height: 500px;
            overflow: hidden;
            margin: auto;
        }

        .slider {
            display: flex;
            transition: transform 0.8s ease-in-out;
            width: 100%;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            height: 100%;
        }

        .imgSlider {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
            z-index: 1;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }


        .card {
            width: 100%;
            height: 100%; /* Đảm bảo chiều cao của thẻ luôn chiếm 100% */
            display: flex;
            flex-direction: column;
        }

        .card img {
            height: 300px;
            max-height: 350px; /* Giới hạn chiều cao của ảnh để các thẻ không bị giãn */
            object-fit: cover; /* Ảnh được hiển thị theo kích thước quy định mà không bị méo */
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Căn đều khoảng cách giữa các phần tử bên trong thẻ */
        }

        .card h5 {
            font-size: 1.1rem;
            min-height: 60px; /* Đảm bảo tiêu đề chiếm một khoảng cố định để các thẻ không bị giãn nở */
            overflow: hidden;
        }

        .card p {
            margin-top: auto;
            margin-bottom: 10px;
        }

        /* Nút với gradient từ trái sang phải */
        .btn-custom {
            background-image: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradient từ trái sang phải */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-image 0.4s ease; /* Thời gian chuyển đổi */
        }

        /* Hiệu ứng khi hover: gradient ngược từ phải sang trái */
        .btn-custom:hover {
            background-image: linear-gradient(to left, #ff7e5f, #feb47b); /* Gradient ngược từ phải sang trái */
            cursor: pointer;
        }
    </style>
    <div class = "page-body">
        <div class = "container-xl">
            <!-- Slider hiện tại -->
            <div class = "d-flex align-items-center justify-content-center">
                <div class = "slider-container">
                    <div class = "slider">
                        <div class = "slide active">
                            <img class = "imgSlider" src = "https://file.hstatic.net/200000722513/file/pc_gvn_t10_web_slider_800x400.png" alt = "Slide 1">
                        </div>
                        <div class = "slide">
                            <img class = "imgSlider" src = "https://tabler.io/static/samples/photos/people-watching-a-presentation-in-a-room.jpg" alt = "Slide 2">
                        </div>
                        <div class = "slide">
                            <img class = "imgSlider" src = "https://tabler.io/static/samples/photos/people-by-a-banquet-table-full-with-food.jpg" alt = "Slide 3">
                        </div>
                        <div class = "slide">
                            <img class = "imgSlider" src = "https://cdnv2.tgdd.vn/mwg-static/common/News/1570471/tgdd-tecno-spark-go-1-21.jpg" alt = "Slide 4">
                        </div>
                    </div>
                    <button class = "prev" onclick = "moveSlide(-1)">&#10094;</button>
                    <button class = "next" onclick = "moveSlide(1)">&#10095;</button>
                </div>
            </div>

            <!-- Phần hiển thị sản phẩm mới -->
            <div class = "card border-0 mt-4">
                <div class = "card-header d-flex justify-content-between align-items-center">
                    <div class = "col-auto fs-1 fw-bold">
                        Sản phẩm mới
                    </div>
                    <div class = "col-auto fs-3 text-info text-decoration-none">
                        <a href = "">Xem tất cả</a>
                    </div>
                </div>

                <div class = "card-body">
                    <div class = "row">
                        @foreach($pcMoi as $item)
                            <div class = "col-md-3 mb-4">
                                <div class = "card h-100">
                                    <a href = "">
                                        <img class = "card-img-top" src = "{{asset('asset/img-product/'.$item->AnhSP)}}" alt = "{{ $item->TenSP }}">
                                    </a>
                                    <div class = "card-body">
                                        <h5 class = "card-title">{{ $item->TenSP }}</h5>
                                        <p class = "card-text text-danger fw-bold">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</p>
                                        <button class = "btn-gio-hang btn btn-custom rounded-4" data-masp = "{{ $item->MaSP }}" onclick = "addToCart(this);">
                                            Thêm vào giỏ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Phần hiển thị sản phẩm nổi bật -->
            <div class = "card border-0 mt-4">
                <div class = "card-header d-flex justify-content-between align-items-center">
                    <div class = "col-auto fs-1 fw-bold">
                        Sản phẩm bán chạy
                    </div>
                    <div class = "col-auto fs-3 text-info text-decoration-none">
                        <a href = "">Xem tất cả</a>
                    </div>
                </div>

                <div class = "card-body">
                    <div class = "row">
                        @foreach($pcBanChay as $item)
                            <div class = "col-md-3 mb-4">
                                <div class = "card h-100">
                                    <a href = "">
                                        <img class = "card-img-top" src = "{{asset('asset/img-product/'.$item->AnhSP)}}" alt = "{{ $item->TenSP }}">
                                    </a>
                                    <div class = "card-body">
                                        <h5 class = "card-title">{{ $item->TenSP }}</h5>
                                        <p class = "card-text text-danger fw-bold">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</p>
                                        <button class = "btn-gio-hang btn btn-custom rounded-4" data-masp = "{{ $item->MaSP }}" onclick = "addToCart(this);">
                                            Thêm vào giỏ
                                        </button>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <!-- Phần hiển thị sản phẩm mới -->
            <div class = "card border-0 mt-4">
                <div class = "card-header d-flex justify-content-between align-items-center">
                    <div class = "col-auto fs-1 fw-bold">
                        Sản phẩm khuyến mãi
                    </div>
                    <div class = "col-auto fs-3 text-info text-decoration-none">
                        <a href = "">Xem tất cả</a>
                    </div>
                </div>

                <div class = "card-body">

                    <div class = "row">
                        @foreach($pcKM as $item)
                            <div class = "col-md-3 mb-4">
                                <div class = "card h-100">
                                    <a href = "">
                                        <img class = "card-img-top" src = "{{asset('asset/img-product/'.$item->AnhSP)}}" alt = "{{ $item->TenSP }}">
                                    </a>
                                    <div class = "card-body">
                                        <h5 class = "card-title">{{ $item->TenSP }}</h5>
                                        <p class = "card-text text-danger fw-bold">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</p>
                                        <button class = "btn-gio-hang btn btn-custom rounded-4" data-masp = "{{ $item->MaSP }}" onclick = "addToCart(this);">
                                            Thêm vào giỏ
                                        </button>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      // Slider hiện tại
      let currentSlide = 0;
      const slides = document.querySelectorAll(".slide");
      const totalSlides = slides.length;
      const slider = document.querySelector(".slider");
      const slideInterval = 3500;

      function showSlide(index) {
        const translateValue = -index * 100;
        slider.style.transition = "transform 0.8s ease-in-out";
        slider.style.transform = `translateX(${translateValue}%)`;
      }

      function moveSlide(direction) {
        currentSlide += direction;
        if (currentSlide < 0) {
          currentSlide = totalSlides - 1;
        } else if (currentSlide >= totalSlides) {
          currentSlide = 0;
        }
        showSlide(currentSlide);
      }

      setInterval(function() {
        moveSlide(1);
      }, slideInterval);

      showSlide(currentSlide);
    </script>

    <script>
      function addToCart(buttonElement) {
        var loggedIn = @json(session()->has('MaTK')); // Pass the session check to JavaScript

        if (loggedIn) {
          var productId = buttonElement.getAttribute('data-masp');
          $.ajax({
            url: '{{route('them-gio-hang')}}',
            type: 'POST',
            data: {
              MaSP: productId,
              _token: '{{ csrf_token() }}' // CSRF token for security
            },
            success: function(response) {
              toastr.info(response.message);
            },
            error: function(error) {
              toastr.error('Error adding product to cart.');
            }
          });
        } else {
          toastr.warning('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'); // Warning if not logged in
        }
      }
    </script>

@endsection
