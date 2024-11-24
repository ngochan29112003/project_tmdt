@extends('super-admin.master')
@section('contents')
<div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ SẢN PHẨM </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdsanpham">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Thêm mới
                    </button>
                    <a href="{{route('export-san-pham')}}" class="btn btn-success d-flex align-items-center text-white btn-export">
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
                            <table id = "tableSanPham" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Tên hãng</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng còn</th>
                                    <th>Thời gian bảo hành</th>
                                    <th>Trạng thái sản phẩm</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_sp as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->TenDM}}</td>
                                        <td>{{ $item->TenSP}}</td>
                                        <td>
                                            <img src="{{ asset('asset/img-product/'.$item->AnhSP) }}" alt="Image">
                                        </td>
                                        <td>{{ $item->MoTaChiTiet}}</td>
                                        <td>{{ $item->TenHSX}}</td>
                                        <td>{{ $item->GiaBan}}</td>
                                        <td>{{ $item->SoLuongTonKho}}</td>
                                        <td>{{ $item->ThoiGianBaoHanh}}</td>
                                        <td class="text-center align-middle">
                                            @if($item->TrangThaiSP === "Ẩn")
                                                <span class = "badge bg-danger text-white p-2">Ẩn</span>
                                            @else
                                                <span class = "badge bg-success text-white p-2">Hiện</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle p-0">
                                            <button class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="{{ $item->MaSP }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </button>
                                            |
                                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="{{ $item->MaSP }}">
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
    <div class="modal fade" id="Modaladdsanpham">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formsanpham" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenSP" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="TenSP" id="TenSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="AnhSP" id="AnhSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh phụ 1</label>
                                <input type="file" class="form-control" name="AnhCT1" id="AnhSP" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh phụ 2</label>
                                <input type="file" class="form-control" name="AnhCT2" id="AnhSP" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh phụ 3</label>
                                <input type="file" class="form-control" name="AnhCT3" id="AnhSP" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh phụ 4</label>
                                <input type="file" class="form-control" name="AnhCT4" id="AnhSP" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GiaBan" class="form-label">Giá bán</label>
                                <input type="text" class="form-control" name="GiaBan" id="GiaBan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SoLuongTonKho" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" name="SoLuongTonKho" id="SoLuongTonKho" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayTaoSP" class="form-label">Ngày tạo sản phẩm</label>
                                <input type="date" class="form-control" name="NgayTaoSP" id="NgayTaoSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ThoiGianBaoHanh" class="form-label">Thời gian bảo hành</label>
                                <input type="text" class="form-control" name="ThoiGianBaoHanh" id="ThoiGianBaoHanh" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="MoTaChiTiet" class="form-label">Mô tả chi tiết</label>
                                <input type="text" class="form-control" name="MoTaChiTiet" id="MoTaChiTiet" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="HangSanXuat" class="form-label">Hãng sản xuất</label>
                                <select class="form-select" name="MaHSX" id="HangSanXuat">
                                    <option value="" disabled selected>Chọn hãng</option>
                                    @foreach ($list_hang_sx as $item)
                                        <option value="{{ $item->MaHSX}}">{{ $item->TenHSX}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhMucSP" class="form-label">Danh mục sản phẩm</label>
                                <select class="form-select" name="MaDM" id="DanhMucSP">
                                    <option value="" disabled selected>Chọn danh mục</option>
                                    @foreach ($list_danh_muc as $item)
                                        <option value="{{ $item->MaDM}}">{{ $item->TenDM}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangThaiSP" class="form-label">Trạng thái sản phẩm</label>
                                <select class="form-select" name="TrangThaiSP" id="TrangThaiSP">
                                    <option value="Ẩn">Ẩn</option>
                                    <option value="Hiện">Hiện</option>
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


<!-- Model Sua -->
    <div class="modal fade" id="Modaleditsanpham">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formeditsanpham" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenSP" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="TenSP" id="edit_TenSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="AnhSP" id="edit_AnhSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh Phụ 1</label>
                                <input type="file" class="form-control" name="AnhCT1" id="edit_AnhCT1" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh Phụ 2</label>
                                <input type="file" class="form-control" name="AnhCT2" id="edit_AnhCT2" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh Phụ 3</label>
                                <input type="file" class="form-control" name="AnhCT3" id="edit_AnhCT3" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh Phụ 4</label>
                                <input type="file" class="form-control" name="AnhCT4" id="edit_AnhCT4" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GiaBan" class="form-label">Giá bán</label>
                                <input type="text" class="form-control" name="GiaBan" id="edit_GiaBan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SoLuongTonKho" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" name="SoLuongTonKho" id="edit_SoLuongTonKho" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayTaoSP" class="form-label">Ngày tạo sản phẩm</label>
                                <input type="date" class="form-control" name="NgayTaoSP" id="edit_NgayTaoSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ThoiGianBaoHanh" class="form-label">Thời gian bảo hành</label>
                                <input type="text" class="form-control" name="ThoiGianBaoHanh" id="edit_ThoiGianBaoHanh" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="MoTaChiTiet" class="form-label">Mô tả chi tiết</label>
                                <input type="text" class="form-control" name="MoTaChiTiet" id="edit_MoTaChiTiet" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="HangSanXuat" class="form-label">Hãng sản xuất</label>
                                <select class="form-select" name="MaHSX" id="edit_HangSanXuat">
                                    <option value="" disabled selected>Chọn hãng</option>
                                    @foreach ($list_hang_sx as $item)
                                        <option value="{{ $item->MaHSX}}">{{ $item->TenHSX}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhMucSP" class="form-label">Danh mục sản phẩm</label>
                                <select class="form-select" name="MaDM" id="edit_DanhMucSP">
                                    <option value="" disabled selected>Chọn danh mục</option>
                                    @foreach ($list_danh_muc as $item)
                                        <option value="{{ $item->MaDM}}">{{ $item->TenDM}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangThaiSP" class="form-label">Trạng thái sản phẩm</label>
                                <select class="form-select" name="TrangThaiSP" id="edit_TrangThaiSP">
                                    <option value="" disabled selected>Chọn trạng thái</option>
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
      var table = $('#tableSanPham').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });

      $('#Formsanpham').submit(function (e) {
          e.preventDefault();

          $.ajax({
              url: '{{ route('add-san-pham') }}',
              method: 'POST',
              data: $(this).serialize(),
              success: function (response) {
                  if (response.success) {
                      $('#Modaladdsanpham').modal('hide');
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

      $('#tableSanPham').on('click', '.delete-btn', function () {
          var MaSP = $(this).data('id');
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
                      url: '{{ route('delete-san-pham', ':id') }}'.replace(':id', MaSP),
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
      $('#tableSanPham').on('click', '.edit-btn', function () {
          var MaSP = $(this).data('id');

          $('#Formeditsanpham').data('id', MaSP);
          var url = "{{ route('edit-san-pham', ':id') }}";
          url = url.replace(':id', MaSP);
          $.ajax({
              url: url,
              method: 'GET',
              success: function (response) {
                  var data = response.sanpham;
                  $('#edit_TenSP').val(data.TenSP);
                  $('#edit_AnhSP').val(data.AnhSP);
                  $('#edit_AnhCT1').val(data.AnhCT1);
                  $('#edit_AnhCT2').val(data.AnhCT2);
                  $('#edit_AnhCT3').val(data.AnhCT3);
                  $('#edit_AnhCT4').val(data.AnhCT4);
                  $('#edit_GiaBan').val(data.GiaBan);
                  $('#edit_SoLuongTonKho').val(data.SoLuongTonKho);
                  $('#edit_NgayTaoSP').val(data.NgayTaoSP);
                  $('#edit_TrangThaiSP').val(data.TrangThaiSP);
                  $('#edit_MoTaChiTiet').val(data.MoTaChiTiet);
                  $('#edit_ThoiGianBaoHanh').val(data.ThoiGianBaoHanh);
                  $('#edit_DanhMucSP').val(data.MaDM);
                  $('#edit_HangSanXuat').val(data.MaHSX);
                  $('#Modaleditsanpham').modal('show');
              },
              error: function (xhr) {
              }
          });
      });

      //Lưu lại dữ liệu khi chỉnh sửa
      $('#Formeditsanpham').submit(function (e) {
          e.preventDefault();
          var sanphamid = $(this).data('id');
          var url = "{{ route('update-san-pham', ':id') }}";
          url = url.replace(':id', sanphamid);
          var formData = new FormData(this);
          $.ajax({
              url: url,
              method: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function (response) {
                  if (response.success) {
                      $('#Modaleditsanpham').modal('hide');
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
