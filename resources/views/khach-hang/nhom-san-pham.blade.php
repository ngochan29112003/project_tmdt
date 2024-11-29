@extends('khach-hang.master')
@section('contents')
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
            background-image: linear-gradient(to right, #E30019, #d16868); /* Gradient từ trái sang phải với tone màu đỏ */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-position 0.4s ease; /* Hiệu ứng chuyển màu mượt */
        }

        /* Hiệu ứng khi hover: gradient ngược từ phải sang trái */
        .btn-custom:hover {
            background-image: linear-gradient(to left, #E30019, #d16868); /* Gradient ngược từ phải sang trái */
            cursor: pointer;
        }

    </style>
    <div class="container my-4">
        <h2 class="mb-4"><span class="text-primary">{{ $category }}</span> - <span class="text-gray">{{ $manufacturer }}</span></h2>
        <div class="row">
            @if($san_pham_theo_nhom->isEmpty())
                <p>Không có sản phẩm nào trong nhóm này.</p>
            @else
                @foreach($san_pham_theo_nhom as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('chi-tiet-san-pham', ['id' => $item->MaSP]) }}">
                                <img class="card-img-top" src="{{ asset('asset/img-product/'.$item->AnhSP) }}" alt="{{ $item->TenSP }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->TenSP }}</h5>
                                <p class="card-text text-danger fw-bold">{{ number_format($item->GiaBan, 0, ',', '.') }}₫</p>
                                <button class="btn-gio-hang btn btn-custom rounded-4" data-masp="{{ $item->MaSP }}" onclick="addToCart(this);">
                                    Thêm vào giỏ
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
@section('scripts')
    <script>
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
