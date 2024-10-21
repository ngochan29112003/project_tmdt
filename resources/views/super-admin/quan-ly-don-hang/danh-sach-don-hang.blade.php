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

{{--            <div class="row mt-2">--}}
{{--                <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">--}}
{{--                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Modaladdhangsanxuat">--}}
{{--                        <i class="bi bi-file-earmark-plus pe-2"></i>--}}
{{--                        Thêm mới--}}
{{--                    </button>--}}
{{--                    <a href="#" class="btn btn-success d-flex align-items-center text-white btn-export">--}}
{{--                        <i class="bi bi-file-earmark-arrow-down pe-2"></i>--}}
{{--                        Xuất đơn hàng--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
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
                                    <th>Tên khách hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ giao hàng</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Khuyến mãi</th>
                                    <th>Đơn vị vận chuyển</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Ngày tạo đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Xuất đơn hàng</th>
                                    <th>Duyệt/Hủy đơn hàng</th>
{{--                                    <th class = "text-center">Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @php($stt = 1)
                                @foreach($list_donhang as $item)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$item->HoTen}}</td>
                                        <td>{{$item->TenSP}}</td>
                                        <td>{{$item->SDT}}</td>
                                        <td>{{$item->DiaChiGiaoHang}}</td>
                                        <td>{{$item->TenPTTT}}</td>
                                        <td>{{$item->TenKM}}</td>
                                        <td>{{$item->TenDonViVC}}</td>
                                        <td>{{$item->TrangThaiDH}}</td>
                                        <td>{{$item->NgayTaoDH}}</td>
                                        <td>{{$item->TongTien}}</td>
                                        <td class="text-center align-middle">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                    <path d="M9 15h6" />
                                                    <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-check">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                    <path d="M9 12l2 2l4 -4" />
                                                </svg>
                                            </a>
                                            |
                                            <a href="" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-x">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                                    <path d="M9 9l6 6m0 -6l-6 6" />
                                                </svg>
                                            </a>
                                        </td>
                                        </td>
{{--                                        <td class="text-center align-middle">--}}
{{--                                            <a href="">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />--}}
{{--                                                    <path d="M13.5 6.5l4 4" />--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}
{{--                                            |--}}
{{--                                            <a href="">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">--}}
{{--                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />--}}
{{--                                                    <path d="M4 7l16 0" />--}}
{{--                                                    <path d="M10 11l0 6" />--}}
{{--                                                    <path d="M14 11l0 6" />--}}
{{--                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />--}}
{{--                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />--}}
{{--                                                </svg>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
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
