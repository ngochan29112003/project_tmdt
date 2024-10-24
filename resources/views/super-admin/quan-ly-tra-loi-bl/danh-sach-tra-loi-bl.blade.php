@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH TRẢ LỜI BÌNH LUẬN </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdtlbl">
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
                                    <th>Mã bình luận</th>
                                    <th>Nội dung trả lời</th>
                                    <th>Ngày trả lời</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_traloi as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->MaBL}}</td>
                                        <td>{{ $item->NoiDungTL}}</td>
                                        <td>{{ $item->NgayTL}}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaTL }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil"> 
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" /> 
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /> 
                                                    <path d="M13.5 6.5l4 4" /> 
                                                </svg> 
                                            </button> 
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaTL }}">
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
    <div class="modal fade" id="Modaladdtlbl">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm trả lời bình luận</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formaddtlbl" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaBL" class="form-label">Mã bình luận</label>
                                <select class="form-select" name="MaBL" id="MaBL">
                                <option value="" disabled selected>Chọn mã bình luận</option>
                                @foreach ($list_traloi as $item)
                                    <option value="{{ $item->MaBL}}">{{ $item->MaBL}} </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NoiDungTL" class="form-label">Nội dung trả lời</label>
                                <input type="text" class="form-control" name="NoiDungTL" id="NoiDungTL" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NgayTL" class="form-label">Ngày trả lời</label>
                                <input type="date" class="form-control" name="NgayTL" id="NgayTL" required>
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
    <div class="modal fade" id="Modaledittlbl">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa trả lời bình luận</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formedittlbl" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaBL" class="form-label">Mã bình luận</label>
                                <select class="form-select" name="MaBL" id="edit_MaBL">
                                    <option value="" disabled selected>Chọn mã bình luận</option>
                                    @foreach ($list_traloi as $item)
                                        <option value="{{ $item->MaBL}}">{{ $item->MaBL}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NoiDungTL" class="form-label">Nội dung trả lời</label>
                                <input type="text" class="form-control" name="NoiDungTL" id="edit_NoiDungTL" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NgayTL" class="form-label">Ngày trả lời</label>
                                <input type="date" class="form-control" name="NgayTL" id="edit_NgayTL" required>
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

      $('#Formaddtlbl').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('add-tra-loi-binh-luan') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        $('#Modaladdtlbl').modal('hide');
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
            var MaTL = $(this).data('id');
            var row = $(this).closest('tr');

            Swal.fire({
                title: 'Bạn có chắc chăn ?',
                text: "Bạn có muốn xóa khoa không ?",
                icon: 'cảnh báo',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('delete-tra-loi-binh-luan', ':id') }}'.replace(':id', MaTL),
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
          var MaTL = $(this).data('id');

          $('#Formedittlbl').data('id', MaTL);
          var url = "{{ route('edit-tra-loi-binh-luan', ':id') }}";
          url = url.replace(':id', MaTL);
          $.ajax({
              url: url,
              method: 'GET',
              success: function (response) {
                  var data = response.traloi;
                  $('#edit_MaBL').val(data.MaBL);
                  $('#edit_NoiDungTL').val(data.NoiDungTL);
                  $('#edit_NgayTL').val(data.NgayTL);
                  $('#Modaledittlbl').modal('show');
              },
              error: function (xhr) {
              }
          });
      });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formedittlbl').submit(function (e) {
            e.preventDefault();
            var traloiid = $(this).data('id');
            var url = "{{ route('update-tra-loi-binh-luan', ':id') }}";
            url = url.replace(':id', traloiid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#Modaledittlbl').modal('hide');
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
