@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH MỤC SẢN PHẨM </h2>
                </div>
            </div>
{{--            <div class = "row mt-2">--}}
{{--                <div class="col-3">--}}
{{--                    <div class="form-floating w-100">--}}
{{--                        <select class="form-select" id="floatingSelect" onchange="filterByRole(this.value)">--}}
{{--                            <option value="" selected>Hiện tất cả</option>--}}
{{--                            <option value="Laptop">Laptop</option>--}}
{{--                            <option value="RAM">RAM</option>--}}
{{--                        </select>--}}
{{--                        <label for="floatingSelect">Lựa chọn loại sản phẩm hiển thị</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladddanhmuc">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
                    <a href="{{route('export-danh-muc')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                            <table id = "tableDanhMuc" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái danh mục</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_danh_muc as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->TenDM}}</td>
                                        <td>
                                            @if($item->TrangThaiDM === 1)
                                                <span class = "badge bg-danger text-white unlock-badge" data-id = "{{ $item->MaDM }}" style = "cursor:pointer;">Ẩn</span>
                                            @else
                                                <span class = "badge bg-success text-white lock-badge" data-id = "{{ $item->MaDM }}" style = "cursor:pointer;">Hiện</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none view-btn" data-id="{{ $item->MaDM }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaDM }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaDM }}">
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
    <div class="modal fade" id="Modaladddanhmuc">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh mục </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formdanhmuc" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenDM" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" name="TenDM" id="TenDM" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="TrangThaiDM" class="form-label">Trạng thái danh mục</label>
                                <select class="form-select" name="TrangThaiDM" id="TrangThaiDM">
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
    <div class="modal fade" id="Modaleditdanhmuc">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa danh mục</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditdanhmuc" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenDM" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" name="TenDM" id="edit_TenDM" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TrangThaiDM" class="form-label">Trạng thái danh mục</label>
                                <select class="form-select" name="TrangThaiDM" id="edit_TrangThaiDM">
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

    <div class="modal fade" id="Modalviewhsx">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Danh sách hãng sản xuất trong danh mục </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Nút Thêm mới ở dưới và căn trái -->
                <div class="modal-body">
                    <button class="btn btn-primary btn-sm d-flex align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#Modaladdhangsanxuat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>

                    <!-- Danh sách hãng sản xuất -->
                    <div class="table-responsive p-2">
                        <table id="tableHangSanXuat" class="table table-vcenter card-table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hãng sản xuất</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $stt = 1; @endphp
{{--                            @foreach($list_dmhsx as $item)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $stt++ }}</td>--}}
{{--                                    <td>{{ $item->TenHSX }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>
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
                    <h4 class="modal-title">Thêm HSX trong danh mục</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <!-- Input ẩn để lưu ID danh mục -->
                        <input type="hidden" id="category_id" name="category_id">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="hang_san_xuat" class="form-label">Tên hãng sản xuất</label>
                                <select class="form-select" name="hang_san_xuat" id="hang_san_xuat">
                                    @foreach ($list_hang_sx as $item)
                                        <option value="{{ $item->MaHSX }}">{{ $item->TenHSX }}</option>
                                    @endforeach
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

    <!-- UnLock Modal -->
    <div class = "modal fade" id = "unlockModal" tabindex = "-1" aria-labelledby = "unlockModalLabel" aria-hidden = "true">
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title" id = "unlockModalLabel">Hiện danh mục</h5>
                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                </div>
                <div class = "modal-body">
                    Bạn có hiện danh mục này không ?
                </div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-secondary" data-bs-dismiss = "modal">Huỷ</button>
                    <button type = "button" class = "btn btn-primary" id = "confirmUnlock">Hiện</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Lock Modal -->
    <div class="modal fade" id="lockModal" tabindex="-1" aria-labelledby="lockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lockModalLabel">Ẩn danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc muốn ẩn danh mục này không ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="button" class="btn btn-danger" id="confirmLock">Ẩn</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
      var table = $('#tableDanhMuc').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });

      $('#Formhangsanxuat').submit(function(e) {
          e.preventDefault();

          $.ajax({
              url: '{{ route('add-hang-san-xuat-trongdm') }}',
              method: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                  if (response.success) {
                      $('#Modaladdhangsanxuat').modal('hide');
                      toastr.success(response.message, "Thành công");
                      setTimeout(function() {
                          location.reload();
                      }, 500);
                  } else {
                      toastr.error(response.message, "Lỗi");
                  }
              },
              error: function(xhr) {
                  toastr.error("Đã xảy ra lỗi", "Lỗi");
              }
          });
      });


      // Khi người dùng click vào button với class .view-btn
      $('.view-btn').click(function() {
          // Lấy id của danh mục từ thuộc tính data-id của button
          var id = $(this).data('id');

          // Mở modal
          $('#Modalviewhsx').modal('show');

          // Bạn có thể sử dụng id ở đây để làm các thao tác như load thông tin vào modal
          console.log(id); // Chỉ để kiểm tra id của danh mục
      });

      $('#Formdanhmuc').submit(function (e) {
          e.preventDefault();

          $.ajax({
              url: '{{ route('add-danh-muc') }}',
              method: 'POST',
              data: $(this).serialize(),
              success: function (response) {
                  if (response.success) {
                      $('#Modaladddanhmuc').modal('hide');
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

      $('#tableDanhMuc').on('click', '.delete-btn', function () {
          var MaDM = $(this).data('id');
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
                      url: '{{ route('delete-danh-muc', ':id') }}'.replace(':id', MaDM),
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
      $('#tableDanhMuc').on('click', '.edit-btn', function () {
          var DanhMuc = $(this).data('id');

          $('#Formeditdanhmuc').data('id', DanhMuc);
          var url = "{{ route('edit-danh-muc', ':id') }}";
          url = url.replace(':id', DanhMuc);
          $.ajax({
              url: url,
              method: 'GET',
              success: function (response) {
                  var data = response.danhmuc;
                  $('#edit_TenDM').val(data.TenDM);
                  $('#edit_MaHSX').val(data.MaHSX);
                  $('#edit_TrangThaiDM').val(data.TrangThaiDM);
                  $('#Modaleditdanhmuc').modal('show');
              },
              error: function (xhr) {
              }
          });
      });

      //Lưu lại dữ liệu khi chỉnh sửa
      $('#Formeditdanhmuc').submit(function (e) {
          e.preventDefault();
          var danhmucid = $(this).data('id');
          var url = "{{ route('update-danh-muc', ':id') }}";
          url = url.replace(':id', danhmucid);
          var formData = new FormData(this);
          $.ajax({
              url: url,
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function (response) {
                  if (response.success) {
                      $('#Modaleditdanhmuc').modal('hide');
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

      // Khi click vào badge mở khóa
      $(document).on('click', '.unlock-badge', function() {
          unlockUserId = $(this).data('id');
          $('#unlockModal').modal('show');
      });

      // Xác nhận mở khóa tài khoản
      $('#confirmUnlock').on('click', function() {
          if (unlockUserId) {
              $.ajax({
                  url: "{{ route('hien-danh-muc') }}",
                  type: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      id: unlockUserId
                  },
                  success: function(response) {
                      if (response.success) {
                          $('#unlockModal').modal('hide');
                          toastr.success('Hiện danh mục thành công.');
                          setTimeout(function() {
                              location.reload();
                          }, 2000);
                      } else {
                          toastr.error('Có lỗi xảy ra khi hiện danh mục.');
                      }
                  },
                  error: function() {
                      toastr.error('Có lỗi xảy ra khi hiện danh mục.');
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
                  url: "{{ route('an-danh-muc') }}",
                  type: 'POST',
                  data: {
                      _token: '{{ csrf_token() }}',
                      id: lockUserId
                  },
                  success: function(response) {
                      if (response.success) {
                          $('#lockModal').modal('hide');
                          toastr.success('Ẩn danh mục thành công.');
                          setTimeout(function() {
                              location.reload();
                          }, 2000);
                      } else {
                          toastr.error('Có lỗi xảy ra khi ẩn danh mục.');
                      }
                  },
                  error: function() {
                      toastr.error('Có lỗi xảy ra khi ẩn danh mục.');
                  }
              });
          }
      });

      $('.view-btn').click(function() {
          var id = $(this).data('id');
          var url = '{{ route('get-category-name', ['id' => ':id']) }}'.replace(':id', id);

          $.ajax({
              url: url,
              method: 'GET',
              success: function(response) {
                  if (response.success) {
                      // Cập nhật tiêu đề modal Modalviewhsx
                      $('#Modalviewhsx .modal-title').html('Danh sách hãng sản xuất trong danh mục <span style="color: red;">' + response.name + '</span>');

                      // Cập nhật tiêu đề modal Modaladdhangsanxuat
                      $('#Modaladdhangsanxuat .modal-title').html('Thêm HSX trong danh mục <span style="color: red;">' + response.name + '</span>');

                      // Lưu ID danh mục vào input ẩn trong Modaladdhangsanxuat
                      $('#Modaladdhangsanxuat #category_id').val(id);

                      // Xóa nội dung cũ trong bảng
                      $('#tableHangSanXuat tbody').empty();

                      // Duyệt qua danh sách và thêm dữ liệu vào bảng
                      if (response.list_dmhsx.length > 0) {
                          $.each(response.list_dmhsx, function(index, item) {
                              $('#tableHangSanXuat tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.TenHSX}</td>
                            </tr>
                        `);
                          });
                      } else {
                          $('#tableHangSanXuat tbody').append(`
                        <tr>
                            <td colspan="2" class="text-center">Không có hãng sản xuất nào</td>
                        </tr>
                    `);
                      }

                      // Hiển thị modal Modalviewhsx
                      $('#Modalviewhsx').modal('show');
                  } else {
                      toastr.error(response.message, "Lỗi");
                  }
              },
              error: function(xhr) {
                  toastr.error("Đã xảy ra lỗi", "Lỗi");
              }
          });
      });


    </script>
    {{--function filterByRole(productName) {--}}
      {{--    $.ajax({--}}
      {{--        url: '{{ route('filter-danh-muc') }}',--}}
      {{--        method: 'GET',--}}
      {{--        data: { productName: productName },--}}
      {{--        success: function(response) {--}}
      {{--            var tableBody = $('#tableDanhMuc tbody');--}}
      {{--            tableBody.empty();--}}

      {{--            response.data.forEach(function(item, index) {--}}
      {{--                // Kiểm tra nếu có hãng sản xuất và hiển thị tên hãng--}}
      {{--                var tenHSX = item.hangsanxuat ? item.hangsanxuat.TenHSX : 'Không có thông tin';--}}

      {{--                tableBody.append(`--}}
      {{--              <tr>--}}
      {{--                  <td>${index + 1}</td>--}}
      {{--                  <td>${item.TenDM}</td>--}}
      {{--                  <td>${tenHSX}</td> <!-- Hiển thị tên hãng -->--}}
      {{--                  <td>--}}
      {{--                      ${item.TrangThaiDM === "Ẩn" ? '<span class="badge bg-danger text-white p-2">Ẩn</span>' : '<span class="badge bg-success text-white p-2">Hiện</span>'}--}}
      {{--                  </td>--}}
      {{--                  <td class="text-center align-middle">--}}
      {{--                      <button class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="${item.MaDM}">--}}
      {{--                          <!-- Icon Edit -->--}}
      {{--                      </button>--}}
      {{--                      |--}}
      {{--                      <button class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="${item.MaDM}">--}}
      {{--                          <!-- Icon Delete -->--}}
      {{--                      </button>--}}
      {{--                  </td>--}}
      {{--              </tr>--}}
      {{--          `);--}}
      {{--            });--}}
      {{--        },--}}
      {{--        error: function(xhr) {--}}
      {{--            toastr.error("Không thể lọc dữ liệu", "Lỗi");--}}
      {{--        }--}}
      {{--    });--}}
      {{--}--}}


@endsection
