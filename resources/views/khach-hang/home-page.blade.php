@extends('khach-hang.master')
@section('contents')
    <!-- CSS -->
    <style>
        /* CSS */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 950px;
            height: 500px; /* Đặt chiều cao cố định */
            overflow: hidden;
            margin: auto;
        }

        .slider {
            display: flex;
            transition: transform 0.8s ease-in-out; /* Thêm transition để mượt */
            width: 100%;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            transition: opacity 0.8s ease-in-out; /* Hiệu ứng chuyển mờ giữa các ảnh */
        }

        .imgSlider {
            width: 100%;
            height: 100%; /* Ảnh sẽ chiếm toàn bộ chiều cao khung */
            object-fit: cover; /* Đảm bảo ảnh luôn bao phủ toàn bộ khung */
        }

        /* Nút điều hướng */
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
            user-select: none;
            z-index: 1;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .prev, .next {
                padding: 5px;
                font-size: 16px;
            }
        }
    </style>
    <style>
        /* Nút prev và next */
        .prev-cards, .next-cards {
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
            z-index: 10; /* Đảm bảo nút điều hướng nằm trên các thẻ sản phẩm */
            user-select: none;
            position: absolute;
        }

        .prev-cards {
            left: -20px; /* Đẩy nút prev sang trái */
        }

        .next-cards {
            right: -20px; /* Đẩy nút next sang phải */
        }

        /* Đảm bảo khung sản phẩm không bị vượt ra ngoài */
        .card-body {
            overflow: hidden;
            position: relative;
        }

        /* Nút Thêm vào giỏ hàng với gradient mặc định từ trái sang phải */
        .btn-add-to-cart {
            background-image: linear-gradient(to right, rgb(213, 82, 6), rgb(255, 136, 0)); /* Gradient từ trái sang phải */
            transition: all 0.3s ease-in-out; /* Hiệu ứng mượt */
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Hiệu ứng hover: Đảo chiều gradient */
        .btn-add-to-cart:hover {
            background-image: linear-gradient(to left, rgb(213, 82, 6), rgb(255, 136, 0)); /* Gradient từ phải sang trái */
            transform: scale(1.05); /* Tăng nhẹ kích thước khi hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Thêm hiệu ứng đổ bóng */
        }

    </style>


    <div class="page-body">
        <div class="container-xl">
            <div class="d-flex align-items-center justify-content-center">
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide active">
                            <img class="imgSlider" src="https://file.hstatic.net/200000722513/file/pc_gvn_t10_web_slider_800x400.png" alt="Slide 1">
                        </div>
                        <div class="slide">
                            <img class="imgSlider" src="https://tabler.io/static/samples/photos/people-watching-a-presentation-in-a-room.jpg" alt="Slide 2">
                        </div>
                        <div class="slide">
                            <img class="imgSlider" src="https://tabler.io/static/samples/photos/people-by-a-banquet-table-full-with-food.jpg" alt="Slide 3">
                        </div>
                        <div class="slide">
                            <img class="imgSlider" src="https://cdnv2.tgdd.vn/mwg-static/common/News/1570471/tgdd-tecno-spark-go-1-21.jpg" alt="Slide 3">
                        </div>
                    </div>
                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                </div>
            </div>

            <div class="row row-cards mt-2 position-relative">
                <div class="card p-0 rounded-4 border-0">
                    <div class="card-header border-0 fs-1 fw-bold">
                        PC Bán chạy
                    </div>
                    <div class="card-body overflow-hidden">
                        <div class="row card-slider" style="display: flex; transition: transform 0.8s ease-in-out;">

                            {{--sản phẩm 1--}}
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <a href="">
                                        <img src="https://product.hstatic.net/200000722513/product/pc_-_35_a9769976b4474527b9884f323069456d_grande.png"
                                             class="card-img-top cursor-pointer">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold m-1">PC GVN AMD R5-8400F/ VGA RX 7600</h5>
                                        <div class="price-section ">
                                            <span class="text-danger fs-3 fw-bold">24.490.000đ</span>
                                        </div>
                                        <div class="rating mb-2">
                                            <span class="text-warning">★ 4.0 (1 đánh giá)</span>
                                        </div>
                                        <button class="btn w-100 text-white border-0 rounded-3 hover-shadow btn-add-to-cart"">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script>
      let currentSlide = 0;
      const slides = document.querySelectorAll('.slide');
      const totalSlides = slides.length;
      const slider = document.querySelector('.slider'); // Chọn slider container
      const slideInterval = 3500; // 3.5 giây

      // Hàm hiển thị slide với hiệu ứng mượt
      function showSlide(index) {
        const translateValue = -index * 100;
        slider.style.transition = 'transform 0.8s ease-in-out'; // Thêm lại transition cho các slide bình thường
        slider.style.transform = `translateX(${translateValue}%)`;
      }

      // Hàm hiển thị slide mà không có hiệu ứng (nhảy trực tiếp)
      function showSlideWithoutTransition(index) {
        const translateValue = -index * 100;
        slider.style.transition = 'none'; // Tắt transition khi chuyển trực tiếp
        slider.style.transform = `translateX(${translateValue}%)`;
      }

      // Hàm di chuyển slide
      function moveSlide(direction) {
        currentSlide += direction;

        // Nếu di chuyển tới slide trước slide đầu tiên
        if (currentSlide < 0) {
          // Chuyển tới slide cuối cùng không có hiệu ứng kéo
          showSlideWithoutTransition(totalSlides - 1);
          currentSlide = totalSlides - 1;
        }
        // Nếu di chuyển tới slide sau slide cuối cùng
        else if (currentSlide >= totalSlides) {
          // Chuyển tới slide đầu tiên không có hiệu ứng kéo
          showSlideWithoutTransition(0);
          currentSlide = 0;
        }
        // Di chuyển bình thường với hiệu ứng kéo
        else {
          showSlide(currentSlide);
        }
      }

      // Tự động chuyển slide sau 3.5 giây
      setInterval(function () {
        moveSlide(1); // Di chuyển tới slide tiếp theo
      }, slideInterval);

      // Khởi tạo slide đầu tiên
      showSlide(currentSlide);
    </script>

    <script>
      let currentCardSlide = 0;
      const cards = document.querySelectorAll('.col-custom');
      const totalCards = cards.length;
      const cardsToShow = 5; // Số lượng sản phẩm hiển thị trên một hàng
      const cardSlider = document.querySelector('.card-slider'); // Chọn container chứa các thẻ sản phẩm

      // Lấy chiều rộng của mỗi thẻ sản phẩm
      let cardWidth = cards[0].offsetWidth; // Lấy chiều rộng của một thẻ sản phẩm
      let maxSlides = Math.ceil(totalCards / cardsToShow);

      // Cập nhật lại khi kích thước màn hình thay đổi để đảm bảo kích thước đúng
      window.addEventListener('resize', () => {
        cardWidth = cards[0].offsetWidth;
        maxSlides = Math.ceil(totalCards / cardsToShow);
      });

      // Hàm hiển thị các sản phẩm
      function showCardSlide(index) {
        const translateValue = -index * cardWidth * cardsToShow;
        cardSlider.style.transform = `translateX(${translateValue}px)`;
      }

      // Hàm di chuyển giữa các sản phẩm
      function moveCards(direction) {
        currentCardSlide += direction;

        if (currentCardSlide < 0) {
          currentCardSlide = maxSlides - 1; // Quay về phần cuối khi nhấn prev ở phần đầu
        } else if (currentCardSlide >= maxSlides) {
          currentCardSlide = 0; // Quay lại phần đầu khi nhấn next ở phần cuối
        }

        showCardSlide(currentCardSlide);
      }

      // Khởi tạo hiển thị ban đầu
      showCardSlide(currentCardSlide);



    </script>
@endsection
