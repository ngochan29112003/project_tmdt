@extends('super-admin.master')
@section('contents')
    <div class = "page-header d-print-none">
        <div class = "container-xl">
            <div class = "row g-2 align-items-center">
                <div class = "col">
                    <h2 class = "page-title">
                        TRANG QUẢN LÝ QUYỀN ADMIN </h2>
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
                            <table id = "tableadmin" class = "table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên admin</th>
                                    <th>Tên trang quản lý</th>
                                    <th class = "text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt = 1; @endphp <!-- Initialize the serial number -->
                                @foreach($dataTaiKhoan as $taiKhoan)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $taiKhoan->HoTen }}</td>
                                        <td>
                                            {{ isset($groupedPermissions[$taiKhoan->MaTK]) ? implode(', ', $groupedPermissions[$taiKhoan->MaTK]['TenQuyen']) : '' }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('phan-quyen-admin', ['id' => $taiKhoan->MaTK]) }}"
                                               class="btn p-0 btn-primary border-0 bg-transparent text-primary shadow-none info-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                    <path d="M13.5 6.5l4 4" />
                                                </svg>
                                            </a>
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
    <div class="modal fade" id="Modaladdadmin">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formadmin" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Tên Admin</label>
                                <input type="text" class="form-control" name="" id="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Phân quyền quản lý trang</label>
                                <select class="form-select" name="" id="">
                                    <option value="Quản lý bài đăng">Quản lý bài đăng</option>
                                    <option value="Quản lý danh mục">Quản lý danh mục</option>
                                    <option value="Quản lý sản phẩm">Quản lý sản phẩm</option>
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
        var table = $('#tableadmin').DataTable({
            "language": {
                "emptyTable": "Không có dữ liệu trong bảng",
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ admin mỗi trang",
                "zeroRecords": "Không tìm thấy kết quả",
                "infoEmpty": "Không có dữ liệu"

            }
        });

        $(document).ready(function() {
            function loadAdminList() {
                $.ajax({
                    url: "{{ route('danh-sach-phan-quyen-admin') }}", // URL để lấy danh sách quyền
                    method: "GET",
                    success: function(response) {
                        // Cập nhật nội dung của bảng `#tableadmin` với dữ liệu mới
                        $('#tableadmin tbody').html(response);
                    },
                    error: function(xhr) {
                    }
                });
            }

            // Gọi hàm `loadAdminList` mỗi khi trang `danh-sach` được mở lại
            loadAdminList();
        });

    </script>
@endsection
