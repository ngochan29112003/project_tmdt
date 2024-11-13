@extends('super-admin.master')
@section('contents')
    <style>
        .pre-line-text {
            white-space: pre-line;
        }
    </style>
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ CHI TIẾT SẢN PHẨM </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdctsp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
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

    <div class = "page-body">
        <div class = "container-xl">
            <div class = "row row-deck row-cards">
                <div class = "col-12">
                    <div class = "card">
                        <div class = "table-responsive p-2">
                            <table id = "tableCTSP" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>MaSP</th>
                                    <th>Thông tin kỹ thuật</th>
                                    <th>Nhà cung cấp</th>
                                    <th>Xuất xứ</th>
                                    <th>Mô tả sản phẩm</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_ctsp as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->MaSP}}</td>
                                        <td style="white-space: pre-line;">{{ $item->ThongTinKyThuat }}</td>
                                        <td>{{ $item->NhaCungCap}}</td>
                                        <td>{{ $item->XuatXu}}</td>
                                        <td>{{$item->MoTaSP}}</td>
                                        <td class="text-center align-middle p-0">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaCTSP }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaCTSP }}">
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
    <div class="modal fade" id="Modaladdctsp">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chi tiết sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formctsp" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaSP" class="form-label">Tên sản phẩm</label>
                                <select class="form-select" name="MaSP" id="MaSP">
                                    <option value="" disabled selected>Chọn tên sản phẩm</option>
                                    @foreach ($list_sp as $item)
                                        <option value="{{ $item->MaSP}}">{{ $item->TenSP}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NhaCungCap" class="form-label">Nhà cung cấp</label>
                                <input type="text" class="form-control" name="NhaCungCap" id="NhaCungCap" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ThongTinKyThuat" class="form-label">Thông tin kỹ thuật</label>
                                <textarea class="form-control pre-line-text" name="ThongTinKyThuat" id="ThongTinKyThuat" rows="6" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="XuatXu" class="form-label">Xuất xứ</label>
                                <input type="text" class="form-control" name="XuatXu" id="XuatXu" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MoTaSP" class="form-label">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="MoTaSP" id="MoTaSP" required>
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

    <!-- Model Sua -->
    <div class="modal fade" id="Modaleditctsp">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa khuyến mãi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditctsp" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaSP" class="form-label">Tên sản phẩm</label>
                                <select class="form-select" name="MaSP" id="edit_MaSP">
                                    <option value="" disabled selected>Chọn tên sản phẩm</option>
                                    @foreach ($list_sp as $item)
                                        <option value="{{ $item->MaSP}}">{{ $item->TenSP}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NhaCungCap" class="form-label">Nhà cung cấp</label>
                                <input type="text" class="form-control" name="NhaCungCap" id="edit_NhaCungCap" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="ThongTinKyThuat" class="form-label">Thông tin kỹ thuật</label>
                                <textarea class="form-control pre-line-text" name="ThongTinKyThuat" id="edit_ThongTinKyThuat" rows="6" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="XuatXu" class="form-label">Xuất xứ</label>
                                <input type="text" class="form-control" name="XuatXu" id="edit_XuatXu" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MoTaSP" class="form-label">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="MoTaSP" id="edit_MoTaSP" required>
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
        var table = $('#tableCTSP').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        $('#Formctsp').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-chi-tiet-san-pham') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modaladdctsp').modal('hide');
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

        $('#tableCTSP').on('click', '.delete-btn', function () {
            var MaCTSP = $(this).data('id');
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
                        url: '{{ route('delete-chi-tiet-san-pham', ':id') }}'.replace(':id', MaCTSP),
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
        $('#tableCTSP').on('click', '.edit-btn', function () {
            var MaCTSP = $(this).data('id');

            $('#Formeditctsp').data('id', MaCTSP);
            var url = "{{ route('edit-chi-tiet-san-pham', ':id') }}";
            url = url.replace(':id', MaCTSP);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.ctsp;
                    $('#edit_MaSP').val(data.MaSP);
                    $('#edit_ThongTinKyThuat').val(data.ThongTinKyThuat);
                    $('#edit_NhaCungCap').val(data.NhaCungCap);
                    $('#edit_XuatXu').val(data.XuatXu);
                    $('#edit_MoTaSP').val(data.MoTaSP);
                    $('#Modaleditctsp').modal('show');
                },
                error: function (xhr) {
                }
            });
        });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formeditctsp').submit(function (e) {
            e.preventDefault();
            var ctspid = $(this).data('id');
            var url = "{{ route('update-chi-tiet-san-pham', ':id') }}";
            url = url.replace(':id', ctspid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modaleditctsp').modal('hide');
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
