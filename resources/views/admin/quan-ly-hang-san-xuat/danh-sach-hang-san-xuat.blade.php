@extends('admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ HÃNG SẢN XUẤT </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdhangsanxuat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
                    <a href="{{route('export-hang-san-xuat')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                            <table id = "tableHangSanXuat" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên hãng sản xuất</th>
                                    <th>Trạng thái hãng sản xuất</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_hang_sx as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->TenHSX}}</td>
                                        <td>
                                            @if($item->TrangThaiHSX === "Ẩn")
                                                <span class = "badge bg-danger text-white p-2">Ẩn</span>
                                            @else
                                                <span class = "badge bg-success text-white p-2">Hiện</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaHSX }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaHSX }}">
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
    <div class="modal fade" id="Modaladdhangsanxuat">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm hãng sản xuất</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenHSX" class="form-label">Tên hãng sản xuất</label>
                                <input type="text" class="form-control" name="TenHSX" id="TenHSX" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TrangThaiHSX" class="form-label">Trạng thái hãng sản xuất</label>
                                <select class="form-select" name="TrangThaiHSX" id="TrangThaiHSX">
                                    <option value="0">Hiện</option>
                                    <option value="1">Ẩn</option>
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
    <div class="modal fade" id="ModaleditHSX">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="FormeditHSX" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenHSX" class="form-label">Tên hãng sản xuất</label>
                                <input type="text" class="form-control" name="TenHSX" id="edit_TenHSX" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TrangThaiHSX" class="form-label">Trạng thái hãng sản xuất</label>
                                <select class="form-select" name="TrangThaiHSX" id="edit_TrangThaiHSX">
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
      var table = $('#tableHangSanXuat').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });


      $('#Formhangsanxuat').submit(function (e) {
          e.preventDefault();

          $.ajax({
              url: '{{ route('add-hang-san-xuat') }}',
              method: 'POST',
              data: $(this).serialize(),
              success: function (response) {
                  if (response.success) {
                      $('#Modaladdhangsanxuat').modal('hide');
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

      $('#tableHangSanXuat').on('click', '.delete-btn', function () {
          var HangSX = $(this).data('id');
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
                      url: '{{ route('delete-hang-san-xuat', ':id') }}'.replace(':id', HangSX),
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
      $('#tableHangSanXuat').on('click', '.edit-btn', function () {
          var hangsxid = $(this).data('id');

          $('#ModaleditHSX').data('id', hangsxid);
          var url = "{{ route('edit-hang-san-xuat', ':id') }}";
          url = url.replace(':id', hangsxid);
          $.ajax({
              url: url,
              method: 'GET',
              success: function (response) {
                  var data = response.hangsx;
                  $('#edit_TenHSX').val(data.TenHSX);
                  $('#edit_TrangThaiHSX').val(data.TrangThaiHSX);
                  $('#ModaleditHSX').modal('show');
              },
              error: function (xhr) {
              }
          });
      });

      //Lưu lại dữ liệu khi chỉnh sửa
      $('#FormeditHSX').submit(function (e) {
          e.preventDefault();
          var hangsanxuatid = $(this).data('id');
          var url = "{{ route('update-hang-san-xuat', ':id') }}";
          url = url.replace(':id', hangsanxuatid);
          var formData = new FormData(this);
          $.ajax({
              url: url,
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function (response) {
                  if (response.success) {
                      $('#ModaleditHSX').modal('hide');
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
