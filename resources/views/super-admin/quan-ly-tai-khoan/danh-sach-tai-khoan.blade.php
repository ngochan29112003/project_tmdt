@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ TÀI KHOẢN </h2>
                </div>
            </div>
            <div class = "row mt-2 mb-0">
                <div class = "col-auto">
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
                                        <td>
                                            @if($taiKhoan->VaiTro === 0)
                                                Khách hàng
                                            @elseif($taiKhoan->VaiTro == 1)
                                                Super admin
                                            @endif
                                        </td>
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
      let unlockUserId = null;

      // When a locked account is clicked
      $(document).on('click', '.unlock-badge', function() {
        unlockUserId = $(this).data('id');
        $('#unlockModal').modal('show');  // Show the modal
      });

      // When the user confirms unlocking
      $('#confirmUnlock').on('click', function() {
        if (unlockUserId) {
          $.ajax({
            url: "{{ route('unlock.route') }}",  // Backend route to unlock
            type: 'POST',
            data: {
              _token: '{{ csrf_token() }}',
              id: unlockUserId
            },
            success: function(response) {
              if (response.success) {
                $('#unlockModal').modal('hide');  // Hide the modal

                // Show toastr success message
                toastr.success('Tài khoản đã được mở khóa thành công.');

                // Reload the page after a short delay to reflect changes
                setTimeout(function() {
                  location.reload();
                }, 2000); // Reload after 2 seconds
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
    </script>
@endsection
