@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH BÌNH LUẬN </h2>
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
                            <table id = "tableBinhLuan" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã tài khoản</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Đánh giá</th>
                                    <th>Nội dung đánh giá</th>
                                    <th>Ngày tạo bình luận</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_binh_luan as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->MaTK}}</td>
                                        <td>{{ $item->MaSP}}</td>
                                        <td>{{ $item->DanhGia}}</td>
                                        <td>{{ $item->NoiDungDG}}</td>
                                        <td>{{ $item->NgayTaoBL}}</td>
                                        <td class="text-center align-middle">
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->MaBL}}">
                                                <i class="bi bi-trash3"></i>
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
    <div class="modal fade" id="Modaladdbinhluan">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bình luận</h4>
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
                                <label for="MaSP" class="form-label">Sản phẩm</label>
                                <select class="form-select" name="MaSP" id="MaSP">
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    <option value="1">Ram 8G</option>
                                    <option value="2">Máy tính HP</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="AnhBL" class="form-label">Ảnh bình luận</label>
                                <input type="text" class="form-control" name="AnhBL" id="AnhBL" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DanhGia" class="form-label">Đánh giá</label>
                                <input type="text" class="form-control" name="DanhGia" id="DanhGia" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NoiDungDG" class="form-label">Nội dung đánh giá</label>
                                <input type="text" class="form-control" name="NoiDungDG" id="NoiDungDG" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgayTaoBL" class="form-label">Ngày tạo bình luận</label>
                                <input type="text" class="form-control" name="NgayTaoBL" id="NgayTaoBL" required>
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
      var table = $('#tableBinhLuan').DataTable({
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
