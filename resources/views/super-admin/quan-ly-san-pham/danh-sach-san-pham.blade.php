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
        </div>

        <!-- lấy này nè -->
        <div class="row mt-2">
            <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdsanpham">
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
                            <table id = "tableSanPham" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng còn</th>
                                    <th>Thời gian bảo hành</th>
                                    <th>Trạng thái sản phẩm</th>
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
    <div class="modal fade" id="Modaladdsanpham">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formhangsanxuat" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="TenSP" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="TenSP" id="TenSP" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhSP" class="form-label">Ảnh sản phẩm</label>
                                <input type="text" class="form-control" name="AnhSP" id="AnhSP" required>
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
                                <input type="text" class="form-control" name="NgayTaoSP" id="NgayTaoSP" required>
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
                                <input type="text" class="form-control" name="HangSanXuat" id="HangSanXuat" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhMucSP" class="form-label">Danh mục sản phẩm</label>
                                <select class="form-select" name="DanhMucSP" id="DanhMucSP">
                                    <option value="" disabled selected>Chọn danh mục</option>
                                    <option value="1">Ram</option>
                                    <option value="2">Máy tính HP</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TrangThaiSP" class="form-label">Trạng thái sản phẩm</label>
                                <select class="form-select" name="TrangThaiSP" id="TrangThaiSP">
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="1">Ẩn</option>
                                    <option value="2">Hiện</option>
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
      var table = $('#tableSanPham').DataTable({
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
