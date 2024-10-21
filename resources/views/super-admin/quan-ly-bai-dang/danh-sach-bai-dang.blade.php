@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH BÀI ĐĂNG </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdbaidang">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới bài đăng
                    </button>
{{--                    <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">--}}
{{--                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />--}}
{{--                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />--}}
{{--                            <path d="M8 11h8v7h-8z" />--}}
{{--                            <path d="M8 15h8" />--}}
{{--                            <path d="M11 11v7" />--}}
{{--                        </svg>--}}
{{--                        Xuất file Excel--}}
{{--                    </a>--}}
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
                            <table id = "tableBaiDang" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người đăng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tên bài đăng</th>
                                    <th>Ảnh bài đăng</th>
                                    <th>Nội dung bài đăng</th>
                                    <th>Ngày tạo bài đăng</th>
                                    <th>Trạng thái bài đăng</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($stt = 1)
                                @foreach($list_baidang as $item)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$item->HoTen}}</td>
                                        <td>{{$item->TenSP}}</td>
                                        <td>{{$item->TenBD}}</td>
                                        <td>{{$item->AnhBD}}</td>
                                        <td>{{$item->NoiDungBD}}</td>
                                        <td>{{$item->NgayTaoBD}}</td>
                                        <td>{{$item->TrangThaiBD}}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaBD }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaBD }}">
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
    <div class="modal fade" id="Modaladdbaidang">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bài đăng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formbaidang" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Tài khoản</label>
                                <select class="form-select" name="MaTK" id="MaTK">
                                    <option value="" disabled selected>Chọn tài khoản</option>
                                    @foreach ($list_taikhoan as $item)
                                        <option value="{{ $item->MaTK}}">{{ $item->HoTen}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MaSP" class="form-label">Sản phẩm</label>
                                <select class="form-select" name="MaSP" id="MaSP">
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    @foreach ($list_sanpham as $item)
                                        <option value="{{ $item->MaSP}}">{{ $item->TenSP}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TenBD" class="form-label">Tên bài đăng</label>
                                <input type="text" class="form-control" name="TenBD" id="TenBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhBD" class="form-label">Ảnh bài đăng</label>
                                <input type="text" class="form-control" name="AnhBD" id="AnhBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayTaoBD" class="form-label">Ngày tạo bài đăng</label>
                                <input type="date" class="form-control" name="NgayTaoBD" id="NgayTaoBD" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NoiDungBD" class="form-label">Nội dung bài đăng</label>
                                <input type="text" class="form-control" name="NoiDungBD" id="NoiDungBD" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangThaiBD" class="form-label">Trạng thái hãng sản xuất</label>
                                <select class="form-select" name="TrangThaiBD" id="TrangThaiBD">
                                    <option value="Hiện">Hiện</option>
                                    <option value="Ẩn">Ẩn</option>
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

    <!-- Model Sửa -->
    <div class="modal fade" id="Modaleditbaidang">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa bài đăng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditbaidang" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="MaTK" class="form-label">Tài khoản</label>
                            <select class="form-select" name="MaTK" id="edit_MaTK">
                                <option value="" disabled selected>Chọn tài khoản</option>
                                @foreach ($list_taikhoan as $item)
                                    <option value="{{ $item->MaTK}}">{{ $item->HoTen}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="MaSP" class="form-label">Sản phẩm</label>
                            <select class="form-select" name="MaSP" id="edit_MaSP">
                                <option value="" disabled selected>Chọn sản phẩm</option>
                                @foreach ($list_sanpham as $item)
                                    <option value="{{ $item->MaSP}}">{{ $item->TenSP}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenBD" class="form-label">Tên bài đăng</label>
                                <input type="text" class="form-control" name="TenBD" id="edit_TenBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhBD" class="form-label">Ảnh bài đăng</label>
                                <input type="text" class="form-control" name="AnhBD" id="edit_AnhBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayTaoBD" class="form-label">Ngày tạo bài đăng</label>
                                <input type="text" class="form-control" name="NgayTaoBD" id="edit_NgayTaoBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NoiDungBD" class="form-label">Nội dung bài đăng</label>
                                <input type="text" class="form-control" name="NoiDungBD" id="edit_NoiDungBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TrangThaiBD" class="form-label">Trạng thái</label>
                                <select class="form-select" name="TrangThaiBD" id="edit_TrangThaiBD">
                                    <option value="Hiện">Hiện</option>
                                    <option value="Ẩn">Ẩn</option>
                                </select>
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
      var table = $('#tableBaiDang').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });

      var table = $('#tableBaiDang').DataTable();

      $('#Formbaidang').submit(function (e) {
          e.preventDefault();

          $.ajax({
              url: '{{ route('add-bai-dang') }}',
              method: 'POST',
              data: $(this).serialize(),
              success: function (response) {
                  if (response.success) {
                      $('#Modaladdbaidang').modal('hide');
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

//xóa
      $('#tableBaiDang').on('click', '.delete-btn', function () {
          var ma_bd = $(this).data('id');
          var row = $(this).closest('tr');

          Swal.fire({
              title: 'Bạn có chắc chắn?',
              text: "Bạn có muốn xóa bài đăng không ?",
              icon: 'cảnh báo',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      url: '{{ route('delete-bai-dang', ':id') }}'.replace(':id', ma_bd),
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

      //Hiện chi tiết của dữ liệu
      $('#tableBaiDang').on('click', '.edit-btn', function () {
          var mabaidang = $(this).data('id');

          $('#Formeditbaidang').data('id', mabaidang);
          var url = "{{ route('edit-bai-dang', ':id') }}";
          url = url.replace(':id', mabaidang);
          $.ajax({
              url: url,
              method: 'GET',
              success: function (response) {
                  var data = response.baidang;
                  $('#edit_MaTK').val(data.MaTK);
                  $('#edit_MaSP').val(data.MaSP);
                  $('#edit_TenBD').val(data.TenBD);
                  $('#edit_AnhBD').val(data.AnhBD);
                  $('#edit_NoiDungBD').val(data.NoiDungBD);
                  $('#edit_NgayTaoBD').val(data.NgayTaoBD);
                  $('#edit_TrangThaiBD').val(data.TrangThaiBD);
                  $('#Modaleditbaidang').modal('show');
              },
              error: function (xhr) {
              }
          });
      });


      {{--//Lưu lại dữ liệu khi chỉnh sửa--}}
      $('#Formeditbaidang').submit(function (e) {
          e.preventDefault();
          var baidang_id = $(this).data('id');
          var url = "{{ route('update-bai-dang', ':id') }}";
          url = url.replace(':id', baidang_id);
          var formData = new FormData(this);
          $.ajax({
              url: url,
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function (response) {
                  if (response.success) {
                      $('#Modaleditbaidang').modal('hide');
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
