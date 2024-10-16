@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ ĐƠN HÀNG </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladddonhang">
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
    </div>

    <div class = "page-body">
        <div class = "container-xl">
            <div class = "row row-deck row-cards">
                <div class = "col-12">
                    <div class = "card">
                        <div class = "table-responsive p-2">
                            <table id = "tableDonHang" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Địa chỉ giao hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày tạo đơn hàng</th>
                                    <th>Trạng thái đơn hàng</th>
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
    <div class="modal fade" id="Modaladddonhang">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm đơn hàng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaSP" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" name="MaSP" id="MaSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DiaChiGiaoHang" class="form-label">Địa chỉ giao hàng</label>
                                <input type="text" class="form-control" name="DiaChiGiaoHang" id="DiaChiGiaoHang" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TongTien" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" name="TongTien" id="TongTien" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán</label>
                                <input type="number" class="form-control" name="PhuongThucThanhToan" id="PhuongThucThanhToan" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayToaDH" class="form-label">Ngày tạo đơn hàng</label>
                                <input type="text" class="form-control" name="NgayToaDH" id="NgayToaDH" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MaTK" class="form-label">Mã tài khoản</label>
                                <select class="form-select" name="MaTK" id="MaTK">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">Khánh Hân</option>
                                    <option value="2">Lý Minh</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangTaiDH" class="form-label">Trạng thái đơn hàng</label>
                                <select class="form-select" name="TrangTaiDH" id="TrangTaiDH">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">Chờ duyệt</option>
                                    <option value="2">Đang soạn hàng</option>
                                    <option value="3">Đang giao</option>
                                    <option value="4">Đã giao</option>
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
@endsection
@section('scripts')
    <script>
      var table = $('#tableDonHang').DataTable({
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
