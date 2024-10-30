@extends('super-admin.master')
@section('contents')
<div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH VẬN CHUYỂN </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
{{--                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladddanhmuc">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">--}}
{{--                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                            <path d="M12 5l0 14" />--}}
{{--                            <path d="M5 12l14 0" />--}}
{{--                        </svg>--}}
{{--                        Thêm mới--}}
{{--                    </button>--}}
                    <!-- <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path d="M8 11h8v7h-8z" />
                            <path d="M8 15h8" />
                            <path d="M11 11v7" />
                        </svg>
                        Xuất file Excel
                    </a> -->
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
                            <table id="tableTTDH" class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($stt = 1)
                                    @foreach($list_trang_thai as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->MaDH }}</td>
                                            <td>
                                                <select class="form-select change-status" data-id="{{ $item->MaTTDH }}">
                                                    @foreach($list_tt as $trangThai)
                                                        <option value="{{ $trangThai->MaTT }}" {{ $item->TrangThai == $trangThai->MaTT ? 'selected' : '' }}>
                                                            {{ $trangThai->TenTT }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaTTDH }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
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

@endsection
@section('scripts')
    <script>
      var table = $('#tableTTDH').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });
      $('#tableTTDH').on('click', '.delete-btn', function () {
            var MaTTDH = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn ?',
                text: "Bạn có muốn xóa khuyến mãi không ?",
                icon: 'cảnh báo',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-trang-thai-don-hang', ':id') }}'.replace(':id', MaTTDH),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Xóa thành công");
                                setTimeout(function () {
                                    location.reload()
                                }, 500);
                            } else {
                                toastr.error("Xóa không thành công.",
                                    "Operation Failed");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("An error occurred.", "Operation Failed");
                        }
                    });
                }
            });
        });
        
        // Lắng nghe sự kiện thay đổi trên select
        $('#tableTTDH').on('change', '.change-status', function () {
            var ttdhid = $(this).data('id'); // Lấy ID của trạng thái đơn hàng
            var newStatus = $(this).val(); // Lấy trạng thái mới được chọn
            var url = "{{ route('update-trang-thai-don-hang', ':id') }}".replace(':id', ttdhid);

            // Tạo dữ liệu để gửi
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}'); // Thêm CSRF token
            formData.append('TrangThai', newStatus); // Thêm trạng thái mới

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Cập nhật thành công");
                        setTimeout(function () {
                            location.reload(); // Tải lại trang sau 500ms
                        }, 500);
                    } else {
                        toastr.error("Cập nhật không thành công.", "Operation Failed");
                    }
                },
                error: function (xhr) {
                    toastr.error("Có lỗi xảy ra khi cập nhật.", "Operation Failed");
                }
            });
        });
    </script>
@endsection
