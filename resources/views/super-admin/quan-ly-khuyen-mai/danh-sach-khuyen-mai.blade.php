@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH KHUYẾN MÃI </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
                    <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path d="M8 11h8v7h-8z" />
                            <path d="M8 15h8" />
                            <path d="M11 11v7" />
                        </svg>
                        Xuất file Excel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class = "page-body">
        <div class = "container-xl">
            <div class = "row row-deck row-cards">
                <div class = "col-12">
                    <div class = "card">
                        <div class = "table-responsive p-2">
                            <table id = "table" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Điều kiện</th>
                                    <th>Phần trăm giảm</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái mã</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_khuyen_mai as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->HoTen}}</td>
                                        <td>{{ $item->TenKM}}</td>
                                        <td>{{ $item->DieuKien}}</td>
                                        <td>{{ $item->PhanTramGiam}}</td>
                                        <td>{{ $item->NgayBD}}</td>
                                        <td>{{ $item->NgayKT}}</td>
                                        <td>{{$item->TrangThaiMa}}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaKM }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaKM }}">
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

    <!-- ======= Modal thêm (tìm hiểu Modal này trên BS5) ======= -->
    <div class="modal fade" id="Modal">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm khuyến mãi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Tài khoản</label>
                                <select class="form-select" name="MaTK" id="MaTK">
                                    <option value="" disabled selected>Chọn tài khoản</option>
                                    <option value="all">Tất cả</option> <!-- Add this option -->
                                    @foreach ($list_tai_khoan as $item)
                                        <option value="{{ $item->MaTK }}">{{ $item->HoTen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenKM" class="form-label">Tên khuyến mãi</label>
                                <input type="text" class="form-control" name="TenKM" id="TenKM" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DieuKien" class="form-label">Điều kiện</label>
                                <select class="form-select" name="DieuKien" id="DieuKien">
                                    <option value="" disabled selected>--Chọn điều kiện--</option>
                                    <option value="không có">không có</option>
                                    <option value="người mới">người mới</option>
                                    @foreach ($list_sp as $sp)
                                        <option value="{{$sp->MaSP}}">{{$sp->TenSP}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhanTramGiam" class="form-label">Phần trăm giảm</label>
                                <input type="text" class="form-control" name="PhanTramGiam" id="PhanTramGiam" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GiaTriToiDa" class="form-label">Giá trị tối đa</label>
                                <input type="text" class="form-control" name="GiaTriToiDa" id="GiaTriToiDa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SoLuongMa" class="form-label">Số lượng mã</label>
                                <input type="number" class="form-control" name="SoLuongMa" id="SoLuongMa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayBD" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="NgayBD" id="NgayBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayKT" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="NgayKT" id="NgayKT" required>
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

    <!-- Model Sửa -->
    <div class="modal fade" id="Modaleditkhuyenmai">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa khuyến mãi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditkhuyenmai" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Tài khoản</label>
                                <select class="form-select" name="MaTK" id="edit_MaTK">
                                    <option value="" disabled selected>Chọn tài khoản</option>
                                    @foreach ($list_tai_khoan as $item)
                                        <option value="{{ $item->MaTK}}">{{ $item->HoTen}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenKM" class="form-label">Tên khuyến mãi</label>
                                <input type="text" class="form-control" name="TenKM" id="edit_TenKM" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DieuKien" class="form-label">Điều kiện</label>
                                <select class="form-select" name="DieuKien" id="edit_DieuKien">
                                    <option value="" disabled selected>--Chọn điều kiện--</option>
                                    <option value="không có">không có</option>
                                    <option value="người mới">người mới</option>
                                    @foreach ($list_sp as $sp)
                                        <option value="{{$sp->MaSP}}">{{$sp->TenSP}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhanTramGiam" class="form-label">Phần trăm giảm</label>
                                <input type="text" class="form-control" name="PhanTramGiam" id="edit_PhanTramGiam" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GiaTriToiDa" class="form-label">Giá trị tối đa</label>
                                <input type="text" class="form-control" name="GiaTriToiDa" id="edit_GiaTriToiDa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SoLuongMa" class="form-label">Số lượng mã</label>
                                <input type="number" class="form-control" name="SoLuongMa" id="edit_SoLuongMa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayBD" class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="NgayBD" id="edit_NgayBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayKT" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="NgayKT" id="edit_NgayKT" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Sửa</button>
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
        var table = $('#table').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        $('#Form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-khuyen-mai') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modal').modal('hide');
                        toastr.success(response.message || "Thành công!", "Successful");
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        toastr.error(response.message || "Đã xảy ra lỗi không xác định.", "Error");
                    }
                },
                error: function (xhr) {
                    var response = xhr.responseJSON;

                    if (response && response.message) {
                        toastr.error(response.message, "Error");
                    } else if (xhr.status === 400) {
                        toastr.error("Yêu cầu không hợp lệ", "Error");
                    } else {
                        toastr.error("Đã xảy ra lỗi không xác định.", "Error");
                    }
                }
            });
        });

        $('#table').on('click', '.delete-btn', function () {
            var MaKM = $(this).data('id');
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
                        url: '{{ route('delete-khuyen-mai', ':id') }}'.replace(':id', MaKM),
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

        //SỬA
        //Hiện chi tiết của dữ liệu
        $('#table').on('click', '.edit-btn', function () {
            var MaKM = $(this).data('id');

            $('#Formeditkhuyenmai').data('id', MaKM);
            var url = "{{ route('edit-khuyen-mai', ':id') }}";
            url = url.replace(':id', MaKM);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.khuyenmai;
                    $('#edit_MaTK').val(data.MaTK);
                    $('#edit_TenKM').val(data.TenKM);
                    $('#edit_DieuKien').val(data.DieuKien);
                    $('#edit_PhanTramGiam').val(data.PhanTramGiam);
                    $('#edit_GiaTriToiDa').val(data.GiaTriToiDa);
                    $('#edit_SoLuongMa').val(data.SoLuongMa);
                    $('#edit_NgayBD').val(data.NgayBD);
                    $('#edit_NgayKT').val(data.NgayKT);
                    $('#Modaleditkhuyenmai').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formeditkhuyenmai').submit(function (e) {
            e.preventDefault();
            var khuyenmaiid = $(this).data('id');
            var url = "{{ route('update-khuyen-mai', ':id') }}";
            url = url.replace(':id', khuyenmaiid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modaleditkhuyenmai').modal('hide');
                        toastr.success(response.response, "Sửa thành công");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    }
                },
                error: function (xhr) {
                    toastr.error("Lỗi");
                }
            });
        });
    </script>
@endsection

