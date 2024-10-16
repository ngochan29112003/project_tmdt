@extends('super-admin.master')
@section('contents')
<div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH VẬN CHUYỂN </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdvanchuyen">
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
                            <table id = "tableVanChuyen" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã theo dõi</th>
                                    <th>Đơn vị vận chuyển</th>
                                    <th>Ngày dự kiến giao hàng</th>
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
    <div class="modal fade" id="Modaladdvanchuyen">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm thông tin vận chuyển</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaDH" class="form-label">Mã đơn hàng</label>
                                <input type="text" class="form-control" name="MaDH" id="MaDH" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="MaTheoDoi" class="form-label">Mã theo dõi</label>
                                <select class="form-select" name="MaTheoDoi" id="MaTheoDoi">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">435</option>
                                    <option value="2">734</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DonViVC" class="form-label">Đơn vị vận chuyển</label>
                                <input type="text" class="form-control" name="DonViVC" id="DonViVC" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayDuKienGiaoHang" class="form-label">Ngày dự kiến giao hàng</label>
                                <input type="text" class="form-control" name="NgayDuKienGiaoHang" id="NgayDuKienGiaoHang" required>
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
      var table = $('#tableVanChuyen').DataTable({
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
