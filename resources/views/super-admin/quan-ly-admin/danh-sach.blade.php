@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ ADMIN </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdadmin">
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
                            <table id = "tableadmin" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên admin</th>
                                    <th>Tên trang quản lý</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Modal thêm (tìm hiểu Modal này trên BS5) ======= -->
    <div class="modal fade" id="Modaladdadmin">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formadmin" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Tên Admin</label>
                                <input type="text" class="form-control" name="" id="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Phân quyền quản lý trang</label>
                                <select class="form-select" name="" id="">
                                    <option value="Quản lý bài đăng">Quản lý bài đăng</option>
                                    <option value="Quản lý danh mục">Quản lý danh mục</option>
                                    <option value="Quản lý sản phẩm">Quản lý sản phẩm</option>
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

    <!-- ====== Modal Sửa ====== -->
{{--    <div class="modal fade" id="Modaleditadmin">--}}
{{--        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Thêm danh mục</h4>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form id="Formeditadmin" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6 mb-3">--}}
{{--                                <label for="TenDM" class="form-label">Tên danh mục</label>--}}
{{--                                <input type="text" class="form-control" name="TenDM" id="edit_TenDM" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 mb-3">--}}
{{--                                <label for="TrangThaiDM" class="form-label">Trạng thái danh mục</label>--}}
{{--                                <select class="form-select" name="TrangThaiDM" id="edit_TrangThaiDM">--}}
{{--                                    <option value="Hiện">Hiện</option>--}}
{{--                                    <option value="Ẩn">Ẩn</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-end">--}}
{{--                            <button type="submit" class="btn btn-primary">Sửa</button>--}}
{{--                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('scripts')
    <script>
        var table = $('#tableadmin').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ admin mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        {{--$('#Formadmin').submit(function (e) {--}}
        {{--    e.preventDefault();--}}

        {{--    $.ajax({--}}
        {{--        url: '{{ route('add-danh-muc') }}',--}}
        {{--        method: 'POST',--}}
        {{--        data: $(this).serialize(),--}}
        {{--        success: function (response) {--}}
        {{--            if (response.success) {--}}
        {{--                $('#Modaladdadmin').modal('hide');--}}
        {{--                toastr.success(response.message, "Successful");--}}
        {{--                setTimeout(function () {--}}
        {{--                    location.reload()--}}
        {{--                }, 500);--}}
        {{--            } else {--}}
        {{--                toastr.error(response.message, "Error");--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (xhr) {--}}
        {{--            toastr.error(response.message, "Error");--}}
        {{--            if (xhr.status === 400) {--}}
        {{--                var response = xhr.responseJSON;--}}
        {{--                toastr.error(response.message, "Error");--}}
        {{--            } else {--}}
        {{--                toastr.error("An error occurred", "Error");--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        {{--$('#tableDanhMuc').on('click', '.delete-btn', function () {--}}
        {{--    var MaDM = $(this).data('id');--}}
        {{--    var row = $(this).closest('tr');--}}

        {{--    Swal.fire({--}}
        {{--        title: 'Bạn có chắc chắn ?',--}}
        {{--        text: "Bạn có muốn xóa không ?",--}}
        {{--        icon: 'cảnh báo',--}}
        {{--        showCancelButton: true,--}}
        {{--        confirmButtonColor: '#3085d6',--}}
        {{--        cancelButtonColor: '#d33',--}}
        {{--        confirmButtonText: 'Yes, delete it!'--}}
        {{--    }).then((result) => {--}}
        {{--        if (result.isConfirmed) {--}}
        {{--            $.ajax({--}}
        {{--                url: '{{ route('delete-danh-muc', ':id') }}'.replace(':id', MaDM),--}}
        {{--                method: 'DELETE',--}}
        {{--                data: {--}}
        {{--                    _token: '{{ csrf_token() }}'--}}
        {{--                },--}}
        {{--                success: function (response) {--}}
        {{--                    if (response.success) {--}}
        {{--                        toastr.success(response.message, "Xóa thành công");--}}
        {{--                        setTimeout(function () {--}}
        {{--                            location.reload()--}}
        {{--                        }, 500);--}}
        {{--                    } else {--}}
        {{--                        toastr.error("Xóa không thành công.",--}}
        {{--                            "Operation Failed");--}}
        {{--                    }--}}
        {{--                },--}}
        {{--                error: function (xhr) {--}}
        {{--                    toastr.error("An error occurred.", "Operation Failed");--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        {{--//Hiện chi tiết của dữ liệu--}}
        {{--$('#tableDanhMuc').on('click', '.edit-btn', function () {--}}
        {{--    var DanhMuc = $(this).data('id');--}}

        {{--    $('#Formeditdanhmuc').data('id', DanhMuc);--}}
        {{--    var url = "{{ route('edit-danh-muc', ':id') }}";--}}
        {{--    url = url.replace(':id', DanhMuc);--}}
        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        method: 'GET',--}}
        {{--        success: function (response) {--}}
        {{--            var data = response.danhmuc;--}}
        {{--            $('#edit_TenDM').val(data.TenDM);--}}
        {{--            $('#edit_TrangThaiDM').val(data.TrangThaiDM);--}}
        {{--            $('#Modaleditdanhmuc').modal('show');--}}
        {{--        },--}}
        {{--        error: function (xhr) {--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        {{--//Lưu lại dữ liệu khi chỉnh sửa--}}
        {{--$('#Formeditdanhmuc').submit(function (e) {--}}
        {{--    e.preventDefault();--}}
        {{--    var danhmucid = $(this).data('id');--}}
        {{--    var url = "{{ route('update-danh-muc', ':id') }}";--}}
        {{--    url = url.replace(':id', danhmucid);--}}
        {{--    var formData = new FormData(this);--}}
        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        method: 'POST',--}}
        {{--        data: formData,--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        success: function (response) {--}}
        {{--            if (response.success) {--}}
        {{--                $('#Modaleditdanhmuc').modal('hide');--}}
        {{--                toastr.success(response.response, "Sửa thành công");--}}
        {{--                setTimeout(function () {--}}
        {{--                    location.reload()--}}
        {{--                }, 500);--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (xhr) {--}}
        {{--            toastr.error("Lỗi");--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
