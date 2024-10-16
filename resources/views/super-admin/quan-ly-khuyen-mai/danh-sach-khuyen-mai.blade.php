@extends('super-admin.master')
@section('contents')
<div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH KHUYẾN MÃI </h2>
                </div>
            </div>
        </div>

        <!-- lấy này nè -->
        <div class="row mt-2">
            <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdkhuyenmai">
                    <i class="bi bi-file-earmark-plus pe-2"></i>
                    Thêm mới
                </button>
                <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">
                    <i class="bi bi-file-earmark-arrow-down pe-2"></i>
                    Xuất file Excel
                </a>
            </div>
        </div>

    </div>

    <div class = "page-body">
        <div class = "container-xl">
            <div class = "row row-deck row-cards">
                <div class = "col-12">
                    <div class = "card">
                        <div class = "table-responsive p-2">
                            <table id = "tableKhuyenMai" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã tài khoản</th>
                                    <th>Tên khuyến mãi</th>
                                    <th>Điều kiện</th>
                                    <th>Phần trăm giảm</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
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
    <div class="modal fade" id="Modaladdkhuyenmai">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm khuyến mãi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Tài khoản</label>
                                <select class="form-select" name="MaTK" id="MaTK">
                                    <option value="" disabled selected>Chọn tài khoản</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Nhân viên</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenKM" class="form-label">Tên khuyến mãi</label>
                                <input type="text" class="form-control" name="TenKM" id="TenKM" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DieuKien" class="form-label">Điều kiện</label>
                                <input type="text" class="form-control" name="DieuKien" id="DieuKien" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhanTramGiam" class="form-label">Phần trăm giảm</label>
                                <input type="text" class="form-control" name="PhanTramGiam" id="PhanTramGiam" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GiaTriToiDa" class="form-label">Giá trị tối đa</label>
                                <input type="text" class="form-control" name="GiaTriToiDa" id="GiaTriToiDa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SoLuongMa" class="form-label">Số lượng mã</label>
                                <input type="number" class="form-control" name="SoLuongMa" id="SoLuongMa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayBD" class="form-label">Ngày bắt đầu</label>
                                <input type="text" class="form-control" name="NgayBD" id="NgayBD" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayKT" class="form-label">Ngày kết thúc</label>
                                <input type="text" class="form-control" name="NgayKT" id="NgayKT" required>
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
@endsection
@section('scripts')
    <script>
      var table = $('#tableKhuyenMai').DataTable({
        "language": {
          "emptyTable": "Không có dữ liệu trong bảng",
          "search": "Tìm kiếm:",
          "lengthMenu": "Hiển thị _MENU_ danh mục mỗi trang",
          "zeroRecords": "Không tìm thấy kết quả",
          "infoEmpty": "Không có dữ liệu"

        }
      });
    </script>
@endsection
