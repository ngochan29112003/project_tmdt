@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ ĐƠN HÀNG </h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <a class="btn btn-danger d-flex align-items-center text-white btn-export">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-export">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
                        </svg>
                        Xuất file PDF
                    </a>
                </div>

                <div class="col-3">
                    <div class="form-floating w-100">
                        <select class="form-select" id="filter-status">
                            <option value="">Tất cả trạng thái</option>
                            @foreach($list_tt as $trangThai)
                                <option value="{{ $trangThai->MaTT }}">
                                    {{ $trangThai->TenTT }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Lựa chọn loại trạng thái đơn hàng</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="tableDonHang" class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>PTTT</th>
                                        <th>Đơn vị vận chuyển</th>
                                        <th>Tiền hàng</th>
                                        <th>Tiền vận chuyển</th>
                                        <th>Giảm tiền hàng</th>
                                        <th>Giảm tiền hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Xuất đơn hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($stt = 1)
                                    @foreach($list_donhang as $item)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$item->TenKH}}</td>
                                            <td>{{$item->SDT}}</td>
                                            <td>{{$item->DiaChiGiaoHang}}</td>
                                            <td>{{$item->TenPTTT}}</td>
                                            <td>{{$item->TenDonViVC}}</td>
                                            <td>{{number_format($item->TienHang, 0, ',', '.')}}</td>
                                            <td>{{number_format($item->TienVC, 0, ',', '.')}}</td>
                                            <td>{{number_format($item->GiamTienHang, 0, ',', '.')}}</td>
                                            <td>{{number_format($item->GiamTienVC, 0, ',', '.')}}</td>
                                            <td>{{number_format($item->TongTien, 0, ',', '.')}}</td>
                                            <td class="text-center align-middle">
                                                <a target="_blank" href="{{ route('in-don-hang', $item->MaDH) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right text-danger">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M9 15h6" />
                                                        <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>
                                                <select class="form-select change-status" data-id="{{ $item->MaDH }}"> <!-- Sử dụng MaDH làm data-id -->
                                                    @foreach($list_tt as $trangThai)
                                                        <option value="{{ $trangThai->MaTT }}" {{ $item->MaTT == $trangThai->MaTT ? 'selected' : '' }}>
                                                            {{ $trangThai->TenTT }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Modal thêm (tìm hiểu Modal này trên BS5) ======= -->
    <div class="modal fade" id="Modaladddonhang">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm đơn hàng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaSP" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="MaSP" id="MaSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DiaChiGiaoHang" class="form-label">Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" name="DiaChiGiaoHang" id="DiaChiGiaoHang" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TongTien" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" name="TongTien" id="TongTien" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán</label>
                                <input type="number" class="form-control" name="PhuongThucThanhToan" id="PhuongThucThanhToan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayToaDH" class="form-label">Ngày tạo đơn hàng</label>
                                <input type="text" class="form-control" name="NgayToaDH" id="NgayToaDH" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Mã tài khoản</label>
                                <select class="form-select" name="MaTK" id="MaTK">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">Khánh Hân</option>
                                    <option value="2">Lý Minh</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangTaiDH" class="form-label">Trạng thái đơn hàng</label>
                                <select class="form-select" name="TrangTaiDH" id="TrangTaiDH">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">Chờ duyệt</option>
                                    <option value="2">Đang soạn hàng</option>
                                    <option value="3">Đang giao</option>
                                    <option value="4">Đã giao</option>
                                </select>
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
      var table = $('#tableDonHang').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });

      $(document).ready(function () {
    // Hàm để ẩn các option nhỏ hơn trạng thái hiện tại
    function hideLowerStatusOptions() {
        $('#tableDonHang tbody tr').each(function () {
            var $row = $(this);
            var currentMaTT = parseInt($row.find('.change-status').val()); // Lấy mã trạng thái hiện tại

            // Lặp qua từng option trong select để ẩn các option nhỏ hơn currentMaTT
            $row.find('.change-status option').each(function () {
                var optionMaTT = parseInt($(this).val());

                if (optionMaTT < currentMaTT) {
                    $(this).hide(); // Ẩn các trạng thái có mã nhỏ hơn trạng thái hiện tại
                } else {
                    $(this).show(); // Hiển thị các trạng thái còn lại
                }
            });
        });
    }

    // Lắng nghe sự kiện thay đổi trên select trạng thái
    $('#filter-status').on('change', function () {
        var trangThaiId = $(this).val();
        console.log("Selected Status ID: ", trangThaiId); // Kiểm tra giá trị được chọn
        var url = "{{ route('loc-trang-thai-don-hang') }}";

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                trangThaiId: trangThaiId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response); // Kiểm tra phản hồi từ server
                $('#tableDonHang tbody').html(response.html);
                hideLowerStatusOptions(); // Gọi hàm để ẩn trạng thái nhỏ hơn sau khi nhận phản hồi
            },
            error: function (xhr) {
                toastr.error("Có lỗi xảy ra khi lọc.", "Operation Failed");
            }
        });
    });

    // Xử lý khi thay đổi trạng thái trong bảng
    $('#tableDonHang').on('change', '.change-status', function () {
        var ttdhid = $(this).data('id');
        var newStatus = $(this).val();
        var url = "{{ route('update-trang-thai-don-hang', ':id') }}".replace(':id', ttdhid);

        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('MaTT', newStatus);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message, "Cập nhật thành công");
                    // Kiểm tra trạng thái lọc
                    var currentFilterStatus = $('#filter-status').val();
                    if (currentFilterStatus) {
                        // Nếu có lọc, xóa dòng tương ứng
                        $('#tableDonHang tbody tr').each(function () {
                            if ($(this).find('.change-status').data('id') == ttdhid) {
                                $(this).remove(); // Xóa dòng tương ứng
                            }
                        });
                    }
                    hideLowerStatusOptions(); // Gọi hàm để ẩn trạng thái nhỏ hơn sau khi thay đổi thành công
                } else {
                    toastr.error("Cập nhật không thành công.", "Operation Failed");
                }
            },
            error: function (xhr) {
                toastr.error("Có lỗi xảy ra khi cập nhật.", "Operation Failed");
            }
        });
    });

    // Gọi hàm để ẩn trạng thái nhỏ hơn khi trang được tải lần đầu
    hideLowerStatusOptions();
});
    </script>
@endsection
