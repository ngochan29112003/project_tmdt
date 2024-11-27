@extends('super-admin.master')
@section('contents')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        TRANG QUẢN LÝ BÌNH LUẬN
                    </h2>
                </div>
                <div class="col-auto ms-auto d-flex align-items-center">
                    <!-- Dropdown trạng thái -->
                    <select id="TrangThaiBinhLuan" class="form-select ms-2">
                        <option value="0" selected>Chưa duyệt</option>
                        <!-- ({{ count($list_binh_luan_chua_duyet) }}) -->
                        <option value="1">Đã duyệt</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive p-2">
                            <table id="tableBinhLuan" class="table table-vcenter card-table table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Tên sản phẩm</th>
                                    <!-- <th>Ảnh bình luận</th> -->
                                    <th>Đánh giá</th>
                                    <th>Nội dung bình luận</th>
                                    <th>Ngày tạo bình luận</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="binhLuanList">
                                @foreach($list_binh_luan_chua_duyet as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->HoTen }}</td>
                                        <td>{{ $item->TenSP }}</td>
                                        <!-- <td><img src="{{ asset('/asset/img-binh-luan/' . $item->AnhBL) }}"
                                                alt="Ảnh bình luận" style="width: 100px;"></td> -->
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="{{ $i <= $item->DanhGia ? 'yellow' : 'gray' }}"
                                                     class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.396.198-.86-.149-.746-.592l.83-3.569-2.641-2.356c-.33-.294-.158-.888.283-.95l3.63-.303 1.525-3.348c.197-.433.73-.433.927 0l1.525 3.348 3.63.303c.441.037.613.656.283.95l-2.641 2.356.83 3.569c.114.443-.35.79-.746.592L8 13.187l-3.389 2.256z" />
                                                </svg>
                                            @endfor
                                        </td>

                                        <td>{{ $item->NoiDungDG }}</td>
                                        <td>{{ $item->NgayTaoBL }}</td>
                                        <td class="text-center align-middle">
                                            <button
                                                class="btn p-0  btn-primary border-0 bg-transparent text-danger shadow-none edit-btn"
                                                data-id="{{ $item->MaBL }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 11l3 3l8 -8" />
                                                    <path
                                                        d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                                </svg>

                                            </button>
                                            |
                                            <button
                                                class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn"
                                                data-id="{{ $item->MaBL }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
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

@endsection
<!-- <td><img src="{{ asset('/asset/img-binh-luan/') }}/${item.AnhBL}" alt="Ảnh bình luận" style="width: 100px;"></td> -->
@section('scripts')
    <script>
        // Hàm load lại danh sách bình luận theo trạng thái
        function loadBinhLuanByTrangThai(trangThai) {
            $.ajax({
                url: '{{ route('filter-binh-luan') }}',
                method: 'GET',
                data: { trangThai: trangThai },
                success: function (response) {
                    var html = '';

                    // Kiểm tra nếu không có bình luận
                    if (response.list_binh_luan.length === 0) {
                        html = '<tr><td colspan="7" class="text-center">Không có bình luận mới</td></tr>';
                    } else {
                        $.each(response.list_binh_luan, function (index, item) {
                            var actionButtons = '';

                            if (trangThai == 0) { // "Chưa duyệt"
                                actionButtons = `
                            <button class="btn p-0 btn-primary border-0 bg-transparent text-danger shadow-none edit-btn" data-id="${item.MaBL}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 11l3 3l8 -8" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                </svg>
                            </button>
                            |
                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="${item.MaBL}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        `;
                            } else { // "Đã duyệt"
                                actionButtons = `
                            <button class="btn p-0 m-0 btn-primary border-0 bg-transparent text-danger shadow-none delete-btn" data-id="${item.MaBL}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-0 icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        `;
                            }

                            html += `<tr>
                        <td>${index + 1}</td>
                        <td>${item.HoTen}</td>
                        <td>${item.TenSP}</td>

                        <td>
                            ${[...Array(5)].map((_, i) =>
                                `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="${i < item.DanhGia ? 'yellow' : 'gray'}" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.396.198-.86-.149-.746-.592l.83-3.569-2.641-2.356c-.33-.294-.158-.888.283-.95l3.63-.303 1.525-3.348c.197-.433.73-.433.927 0l1.525 3.348 3.63.303c.441.037.613.656.283.95l-2.641 2.356.83 3.569c.114.443-.35.79-.746.592L8 13.187l-3.389 2.256z"/>
                                </svg>`
                            ).join('')}
                        </td>
                        <td>${item.NoiDungDG}</td>
                        <td>${item.NgayTaoBL}</td>
                        <td class="text-center align-middle">${actionButtons}</td>
                    </tr>`;
                        });
                    }

                    $('#binhLuanList').html(html);
                }
            });
        }

        // Xử lý khi trang reload hoặc load lại lần đầu
        $(document).ready(function () {
            var trangThai = $('#TrangThaiBinhLuan').val(); // Lấy trạng thái chọn hiện tại
            loadBinhLuanByTrangThai(trangThai); // Gọi hàm để tải lại danh sách khi trang reload
        });


        // Xử lý thay đổi trạng thái bình luận
        $('#TrangThaiBinhLuan').on('change', function () {
            var trangThai = $(this).val();
            loadBinhLuanByTrangThai(trangThai);
        });

        // Xử lý sự kiện duyệt bình luận
        $('#tableBinhLuan').on('click', '.edit-btn', function () {
            var Ma_BL = $(this).data('id'); // Lấy MaBL của bình luận
            var trangThai = $('#TrangThaiBinhLuan').val(); // Lấy trạng thái hiện tại (Chưa duyệt hoặc Đã duyệt)

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn duyệt bình luận này không?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, duyệt!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gửi yêu cầu PATCH để cập nhật trạng thái
                    $.ajax({
                        url: '{{ route('duyet-binh-luan', ':id') }}'.replace(':id', Ma_BL),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token bảo vệ
                            TrangThaiBL: 1 // Cập nhật trạng thái thành 'Đã duyệt' (1)
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Duyệt thành công");
                                loadBinhLuanByTrangThai(trangThai); // Cập nhật lại danh sách bình luận
                            } else {
                                toastr.error("Duyệt không thành công.", "Thao tác thất bại");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("Đã xảy ra lỗi.", "Thao tác thất bại");
                        }
                    });
                }
            });
        });

        // Xử lý sự kiện xóa bình luận
        $('#tableBinhLuan').on('click', '.delete-btn', function () {
            var MaBL = $(this).data('id');
            var trangThai = $('#TrangThaiBinhLuan').val();

            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn có muốn xóa bình luận này không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa nó!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('xoa-binh-luan', ':id') }}'.replace(':id', MaBL),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                toastr.success(response.message, "Xóa thành công");
                                loadBinhLuanByTrangThai(trangThai); // Cập nhật danh sách theo trạng thái hiện tại
                            } else {
                                toastr.error("Xóa không thành công.", "Thao tác thất bại");
                            }
                        },
                        error: function (xhr) {
                            toastr.error("Đã xảy ra lỗi.", "Thao tác thất bại");
                        }
                    });
                }
            });
        });

    </script>
@endsection

