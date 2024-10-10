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
                        TRANG QUẢN LÝ TÀI KHOẢN </h2>
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-9">
                    <a href = "#" class = "btn btn-primary">
                        <span>
                            <svg xmlns = "http://www.w3.org/2000/svg" width = "24" height = "24" viewBox = "0 0 24 24" fill = "none" stroke = "currentColor" stroke-width = "2" stroke-linecap = "round" stroke-linejoin = "round" class = "icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                              <path stroke = "none" d = "M0 0h24v24H0z" fill = "none" />
                              <path d = "M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                              <path d = "M16 19h6" />
                              <path d = "M19 16v6" />
                              <path d = "M6 21v-2a4 4 0 0 1 4 -4h4" />
                            </svg>
                        </span> Thêm mới </a>
                </div>
                <div class="col-3">
                    <div class="form-floating w-100">
                        <select class="form-select" id="floatingSelect" onchange="filterByRole(this.value)">
                            <option value="" selected>Hiện tất cả</option>
                            <option value="1">Tài khoản Super Admin</option>
                            <option value="2">Tài khoản Admin</option>
                            <option value="3">Tài khoản Khách hàng</option>
                        </select>
                        <label for="floatingSelect">Lựa chọn loại tài khoản hiển thị</label>
                    </div>

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
                                    <th>Loại tài khoản</th>
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
                                        <td>{{ $taiKhoan->GioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                        <td>{{ $taiKhoan->SDT }}</td>
                                        <td>{{ $taiKhoan->DiaChi }}</td>
                                        <td>{{ $taiKhoan['vaitro']->ten_vai_tro }}</td>
                                        <td>
                                            @if($taiKhoan->TrangThai == 1)
                                                <span class = "badge bg-danger text-white unlock-badge" data-id = "{{ $taiKhoan->MaTK }}" style = "cursor:pointer;">Đang bị khoá</span>
                                            @else
                                                <span class = "badge bg-success text-white">Hoạt động</span>
                                            @endif
                                        </td>
                                        <td class = "text-center">

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
      function filterByRole(role) {
        $.ajax({
          url: "{{ route('super-admin.filter-accounts') }}", // Đường dẫn đến route xử lý
          type: "GET",
          data: { role: role }, // Truyền giá trị VaiTro
          success: function(response) {
            // Cập nhật lại bảng tài khoản
            var tbody = $('#tableTaiKhoanKhachHang tbody');
            tbody.empty(); // Xóa tất cả các dòng cũ
            $.each(response.data, function(index, taiKhoan) {
              var gioiTinh = taiKhoan.GioiTinh == 1 ? 'Nam' : 'Nữ';
              var trangThai = taiKhoan.TrangThai == 1 ? '<span class="badge bg-danger text-white">Đang bị khoá</span>' : '<span class="badge bg-success text-white">Hoạt động</span>';
              tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${taiKhoan.HoTen}</td>
                            <td>${taiKhoan.NgaySinh}</td>
                            <td>${gioiTinh}</td>
                            <td>${taiKhoan.SDT}</td>
                            <td>${taiKhoan.DiaChi}</td>
                            <td>${taiKhoan.vaitro.ten_vai_tro}</td>
                            <td>${trangThai}</td>
                            <td class="text-center"></td>
                        </tr>
                    `);
            });
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }
    </script>


@endsection
