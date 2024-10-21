@extends('super-admin.master')
@section('contents')
<div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ DANH SÁCH BÁO CÁO </h2>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdbaocao">
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
                            <table id = "tableBaoCao" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã tài khoản</th>
                                    <th>Nội dung báo cáo</th>
                                    <th>Tổng doanh thu</th>
                                    <th>Ngày tạo báo cáo</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($list_bao_cao as $item)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $item->MaTK}}</td>
                                        <td>{{ $item->NoiDungBC}}</td>
                                        <td>{{ $item->TongDoanhThu}}</td>
                                        <td>{{ $item->NgayTaoBC}}</td>
                                        <td class="text-center align-middle">
                                            <a href="" class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none edit-btn">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            |
                                            <button
                                                class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->MaBC}}">
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
    <div class="modal fade" id="Modaladdbaocao">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm báo cáo</h4>
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
                                <label for="NgayTaoBC" class="form-label">Ngày tạo báo cáo</label>
                                <input type="text" class="form-control" name="NgayTaoBC" id="NgayTaoBC" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="TongDoanhThu" class="form-label">Tổng doanh thu</label>
                                <input type="text" class="form-control" name="TongDoanhThu" id="TongDoanhThu" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NoiDungBC" class="form-label">Nội dung báo cáo</label>
                                <input type="text" class="form-control" name="NoiDungBC" id="NoiDungBC" required>
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
      var table = $('#tableBaoCao').DataTable({
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
