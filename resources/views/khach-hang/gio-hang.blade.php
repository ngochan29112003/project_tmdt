@extends('khach-hang.master')
@section('contents')
    <style>
        /* Tạo hiệu ứng hover cho nút "Xóa" */
        .delete-btn:hover {
            background-color: #f8d7da; /* Màu nền khi hover */
            border-radius: 4px; /* Bo góc nhẹ nếu muốn */
        }
        .delete-btn {
            background-color: white;
        }
        .delete-btn:hover .text-danger,
        .delete-btn:hover .bi-trash3 {
            color: #c82333; /* Thay đổi màu chữ và biểu tượng khi hover */
        }
    </style>
    <div class="page-body">
        <div class="container-xl d-flex justify-content-center">
            <div class="card w-66 w-md-75 w-lg-50">
                <div class="card-header">
                    <h2 class="m-0 p-0">Giỏ hàng của bạn</h2>
                </div>

                @if(count($chitiet) > 0)
                    <!-- Card body hiển thị sản phẩm trong giỏ hàng -->
                    <div class="card-body">
                        <div class="row">
                            @php $total = 0; @endphp
                            @foreach ($chitiet as $item)
                                @php
                                    $itemTotal = $item->GiaBan * $item->SLSanPham;
                                    $total += $itemTotal;
                                @endphp
                                <div class="col-12 py-3 border-bottom">
                                    <div class="row">
                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="col-4 col-md-2 d-flex flex-column align-items-center p-0">
                                            <img src="{{ asset('asset/img-product/' . $item->AnhSP) }}" alt="{{ $item->TenSP }}" class="img-fluid" style="max-width: 100%; max-height: 150px;">
                                            <button class="border-0 d-flex justify-content-center p-0 delete-btn" data-masp="{{ $item->MaSP }}">
                                                <i class="bi bi-trash3 text-red p-0 my-1 ms-2"></i>
                                                <span class="text-danger m-2 my-1">Xóa</span>
                                            </button>
                                        </div>

                                        <!-- Thông tin sản phẩm và giá -->
                                        <div class="col-8 col-md-7 p-0 d-flex flex-column justify-content-start" style="height: auto">
                                            <p class="mb-1 fs-3 fw-bold">{{ $item->TenSP }}</p>
                                        </div>

                                        <!-- Số lượng và giá -->
                                        <div class="col-12 col-md-3 d-flex flex-column justify-content-start align-items-end mt-sm-0 mt-2">
                                            <div class="text-danger fw-bold fs-3 mb-2">{{ number_format($itemTotal, 0, ',', '.') }}₫</div>
                                            <small class="text-muted text-decoration-line-through mb-2">{{ number_format($itemTotal * 1.1, 0, ',', '.') }}₫</small>
                                            <div class="d-flex align-items-center pt-sm-4 pt-0">
                                                <button class="border border-end-0 rounded-start decrease-btn" style="width: 30px; height: 30px;" data-masp="{{ $item->MaSP }}">-</button>
                                                <input type="text" class="border text-center quantity-input" value="{{ $item->SLSanPham }}" readonly style="width: 50px; height: 30px;">
                                                <button class="border border-start-0 rounded-end increase-btn" style="width: 30px; height: 30px;" data-masp="{{ $item->MaSP }}">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Hiển thị tổng tiền -->
                        <div class="row mt-4 border-bottom">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <h4 class="fw-bold fs-1">Tổng tiền:</h4>
                                <h4 class="fw-bold text-danger fs-1">{{ number_format($total, 0, ',', '.') }}₫</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <button class="w-100 h-5 btn bg-red fs-2 fw-bold text-white p-5">ĐẶT HÀNG</button>
                        </div>
                    </div>
                @else
                    <!-- Card body thông báo không có sản phẩm -->
                    <div class="card-body text-center">
                        <img src="{{ asset('asset/img/trolley.png') }}" style="height: 100px" alt="Empty cart">
                        <h2 class="mt-3">Hiện không có sản phẩm nào trong giỏ hàng cả !!!</h2>
                        <a class="btn w-100 border-cyan text-cyan" href="{{ route('home-page') }}">Về trang chủ</a>
                    </div>
                @endif
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script>
      $(document).on('click', '.decrease-btn', function() {
        const MaSP = $(this).data('masp');

        $.ajax({
          url: '{{ route("gio-hang.giam-so-luong") }}', // Gọi route theo tên
          type: 'POST',
          data: {
            MaSP: MaSP,
            _token: '{{ csrf_token() }}'
          },
          success: function() {
            location.reload(); // Tải lại trang để cập nhật giỏ hàng
          }
        });
      });

      $(document).on('click', '.increase-btn', function() {
        const MaSP = $(this).data('masp');

        $.ajax({
          url: '{{ route("gio-hang.tang-so-luong") }}', // Gọi route theo tên
          type: 'POST',
          data: {
            MaSP: MaSP,
            _token: '{{ csrf_token() }}'
          },
          success: function() {
            location.reload(); // Tải lại trang để cập nhật giỏ hàng
          }
        });
      });

      $(document).on('click', '.delete-btn', function() {
        const MaSP = $(this).data('masp');

        $.ajax({
          url: '{{ route("gio-hang.xoa-san-pham") }}', // Gọi route xóa sản phẩm
          type: 'POST',
          data: {
            MaSP: MaSP,
            _token: '{{ csrf_token() }}'
          },
          success: function() {
            location.reload();
          }
        });
      });
    </script>
@endsection



