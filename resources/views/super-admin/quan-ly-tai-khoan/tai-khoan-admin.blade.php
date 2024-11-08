@extends('super-admin.master')
@section('contents')
    <style>
        .form-floating select {
            padding-top: 1.25rem; /* Điều chỉnh khoảng cách nhãn */
            padding-bottom: 0.25rem;
        }

        .form-floating label {
            white-space: nowrap; /* Giữ cho nhãn không bị xuống dòng */
            overflow: hidden;    /* Ẩn phần thừa khi bị tràn */
            text-overflow: ellipsis; /* Thêm dấu "..." khi bị tràn */
            width: 100%;
        }
    </style>

    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ TÀI KHOẢN ADMIN</h2>
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-9">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalThem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
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
                            <table id = "tableTaiKhoanKhachHang" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($dataTaiKhoan as $taiKhoan)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $taiKhoan->HoTen }}</td>
                                        <td>{{ $taiKhoan->NgaySinh }}</td>
                                        <td>{{ $taiKhoan->GioiTinh }}</td>
                                        <td>{{ $taiKhoan->SDT }}</td>
                                        <td>{{ $taiKhoan->DiaChi }}</td>
                                        <td>
                                            @if($taiKhoan->TrangThai == 1)
                                                <span class = "badge bg-danger text-white unlock-badge" data-id = "{{ $taiKhoan->MaTK }}" style = "cursor:pointer;">Đang bị khoá</span>
                                            @else
                                                <span class = "badge bg-success text-white lock-badge" data-id = "{{ $taiKhoan->MaTK }}" style = "cursor:pointer;">Hoạt động</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $taiKhoan->MaTK }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $taiKhoan->MaTK }}">
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

    <!-- UnLock Modal -->
    <div class = "modal fade" id = "unlockModal" tabindex = "-1" aria-labelledby = "unlockModalLabel" aria-hidden = "true">
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title" id = "unlockModalLabel">Mở khóa tài khoản</h5>
                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                </div>
                <div class = "modal-body">
                    Bạn có chắc muốn mở khóa tài khoản này không?
                </div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-secondary" data-bs-dismiss = "modal">Huỷ</button>
                    <button type = "button" class = "btn btn-primary" id = "confirmUnlock">Mở khóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lock Modal -->
    <div class="modal fade" id="lockModal" tabindex="-1" aria-labelledby="lockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lockModalLabel">Khóa tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn khóa tài khoản này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="button" class="btn btn-danger" id="confirmLock">Khóa</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalThem">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formThem" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="VaiTro" value="2" hidden>
                        <input type="text" name="TrangThai" value="0" hidden>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="HoTen" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="HoTen" id="HoTen" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenDangNhap" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" name="TenDangNhap" id="TenDangNhap" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MatKhau" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="MatKhau" id="MatKhau" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="Email" class="form-control" name="Email" id="Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgaySinh" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" name="NgaySinh" id="NgaySinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GioiTinh" class="form-label">Giới tính</label>
                                <select class="form-select" name="GioiTinh" id="GioiTinh">
                                    <option value="Nam">Nam </option>
                                    <option value="Nữ">Nữ </option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhMucSP" class="form-label">SDT</label>
                                <input type="text" class="form-control" name="SDT" id="SDT" required>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="TrangThaiSP" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="DiaChi" id="DiaChi" required>
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

    <div class="modal fade" id="modelSua">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa tài khoản admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formSua" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="VaiTro" value="2" hidden>
                        <input type="text" name="TrangThai" value="0" hidden>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="HoTen" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="HoTen" id="editHoTen" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenDangNhap" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" name="TenDangNhap" id="editTenDangNhap" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MatKhau" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="MatKhau" id="editMatKhau" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="Email" class="form-control" name="Email" id="editEmail" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgaySinh" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" name="NgaySinh" id="editNgaySinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GioiTinh" class="form-label">Giới tính</label>
                                <select class="form-select" name="GioiTinh" id="editGioiTinh">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhMucSP" class="form-label">SDT</label>
                                <input type="text" class="form-control" name="SDT" id="editSDT" required>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="TrangThaiSP" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="DiaChi" id="editDiaChi" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
      var table = $('#tableTaiKhoanKhachHang').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ tài khoản khách hàng mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });
    </script>
    <script>

        let unlockUserId = null;
        let lockUserId = null;

        // Khi click vào badge mở khóa
        $(document).on('click', '.unlock-badge', function() {
            unlockUserId = $(this).data('id');
            $('#unlockModal').modal('show');
        });

        // Xác nhận mở khóa tài khoản
        $('#confirmUnlock').on('click', function() {
            if (unlockUserId) {
                $.ajax({
                    url: "{{ route('unlock.route') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: unlockUserId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#unlockModal').modal('hide');
                            toastr.success('Tài khoản đã được mở khóa thành công.');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error('Có lỗi xảy ra khi mở khóa tài khoản.');
                        }
                    },
                    error: function() {
                        toastr.error('Có lỗi xảy ra khi mở khóa tài khoản.');
                    }
                });
            }
        });

        // Khi click vào badge khóa
        $(document).on('click', '.lock-badge', function() {
            lockUserId = $(this).data('id');
            $('#lockModal').modal('show');
        });

        // Xác nhận khóa tài khoản
        $('#confirmLock').on('click', function() {
            if (lockUserId) {
                $.ajax({
                    url: "{{ route('lock.route') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: lockUserId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#lockModal').modal('hide');
                            toastr.success('Tài khoản đã bị khóa thành công.');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error('Có lỗi xảy ra khi khóa tài khoản.');
                        }
                    },
                    error: function() {
                        toastr.error('Có lỗi xảy ra khi khóa tài khoản.');
                    }
                });
            }
        });

        $('#formThem').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('tai-khoan-admin-add') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#modalThem').modal('hide');
                        toastr.success(response.message, "Successful");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    } else {
                        toastr.error(response.message, "Error");
                    }
                },
                error: function (xhr) {
                    toastr.error(response.message, "Error");
                    if (xhr.status === 400) {
                        var response = xhr.responseJSON;
                        toastr.error(response.message, "Error");
                    } else {
                        toastr.error("An error occurred", "Error");
                    }
                }
            });
        });

        $('#tableTaiKhoanKhachHang').on('click', '.edit-btn', function () {
            var id = $(this).data('id');

            $('#formSua').data('id', id);
            var url = "{{ route('tai-khoan-admin-edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.tk;
                    $('#editHoTen').val(data.HoTen);
                    $('#editTenDangNhap').val(data.TenDangNhap);
                    $('#editEmail').val(data.Email);
                    $('#editNgaySinh').val(data.NgaySinh);
                    $('#editGioiTinh').val(data.GioiTinh);
                    $('#editSDT').val(data.SDT);
                    $('#editDiaChi').val(data.DiaChi);
                    $('#modelSua').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#formSua').submit(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('tai-khoan-admin-update', ':id') }}";
            url = url.replace(':id', id);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#modelSua').modal('hide');
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

        $('#tableTaiKhoanKhachHang').on('click', '.delete-btn', function () {
            var id = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chắn ?',
                text: "Bạn có muốn xóa không ?",
                icon: 'cảnh báo',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('tai-khoan-admin-delete', ':id') }}'.replace(':id', id),
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
    </script>
@endsection
