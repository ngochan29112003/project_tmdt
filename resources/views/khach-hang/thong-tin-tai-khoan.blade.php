@extends('khach-hang.master')
@section('contents')
    <section class="section profile">
        <div class="container">
            <div class="row">
                <!-- Profile Card -->
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <img src="{{ asset('asset/img/' . $taikhoan->AnhDaiDien) }}" alt="Avatar" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                            <h3 class="mb-1">{{ $taikhoan->HoTen }}</h3>
                            <p class="text-muted">{{ $taikhoan->Email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Tabs Content -->
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="profileTab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Tổng Quan</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab">Chỉnh Sửa Hồ Sơ</button>
                                </li>
                            </ul>

                            <div class="tab-content pt-3" id="profileTabContent">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                    <h3 class="fw-bold">Chi Tiết Hồ Sơ</h3>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Họ và Tên:</div>
                                        <div class="col-md-8">{{ $taikhoan->HoTen }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Giới Tính:</div>
                                        <div class="col-md-8">{{ $taikhoan->GioiTinh }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Ngày Sinh:</div>
                                        <div class="col-md-8">{{ $taikhoan->NgaySinh }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Địa Chỉ:</div>
                                        <div class="col-md-8">{{ $taikhoan->DiaChi }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Số Điện Thoại:</div>
                                        <div class="col-md-8">{{ $taikhoan->SDT }}</div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 fw-semibold">Email:</div>
                                        <div class="col-md-8">{{ $taikhoan->Email }}</div>
                                    </div>
                                </div>

                                <!-- Edit Tab -->
                                <div class="tab-pane fade" id="edit" role="tabpanel">
                                    <h3 class="fw-bold">Chỉnh Sửa Hồ Sơ</h3>
                                    <form id="Formedit" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Ảnh Đại Diện</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input hidden name="MaTK" value="{{$taikhoan->MaTK}}">
                                                <!-- Hiển thị ảnh đại diện, nếu có -->
                                                <img src="{{ asset('asset/img/' . ($taikhoan->AnhDaiDien ?? 'default.jpg')) }}"
                                                     alt="Profile" class="rounded-circle mb-3"
                                                     style="width: 120px; height: 120px; object-fit: cover;" id="profileImagePreview">
                                                <div class="pt-2">
                                                    <input type="file" name="AnhDaiDien" id="profileImageInput" style="display: none;" onchange="previewImage();">
                                                    <a href="#" class="btn btn-primary btn-sm" title="Tải ảnh đại diện mới" onclick="document.getElementById('profileImageInput').click();">
                                                        <i class="bi bi-upload"></i> Tải ảnh
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="HoTen" class="form-label">Họ và Tên</label>
                                            <input type="text" name="HoTen" class="form-control" value="{{ $taikhoan->HoTen }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="GioiTinh" class="form-label">Giới Tính</label>
                                            <select name="GioiTinh" class="form-select">
                                                <option value="Nam" {{ $taikhoan->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                <option value="Nữ" {{ $taikhoan->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                                <option value="Khác" {{ $taikhoan->GioiTinh == 'Khác' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                                            <input type="date" name="NgaySinh" class="form-control" value="{{ $taikhoan->NgaySinh }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="DiaChi" class="form-label">Địa Chỉ</label>
                                            <input type="text" name="DiaChi" class="form-control" value="{{ $taikhoan->DiaChi }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="SDT" class="form-label">Số Điện Thoại</label>
                                            <input type="tel" name="SDT" class="form-control" value="{{ $taikhoan->SDT }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Email" class="form-label">Email</label>
                                            <input type="email" name="Email" class="form-control" value="{{ $taikhoan->Email }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formedit').submit(function (e) {
            e.preventDefault();

            var url = "{{ route('update-thong-tin-tai-khoan', ':id') }}".replace(':id', {{ $taikhoan->MaTK }});
            var formData = new FormData(this);

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.response, 'Thành Công');
                        setTimeout(() => location.reload(), 500);
                    } else {
                        toastr.error('Có lỗi xảy ra. Vui lòng kiểm tra lại thông tin.', 'Lỗi');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            toastr.error(messages.join('<br>'), 'Lỗi');
                        }
                    } else {
                        setTimeout(() => location.reload(), 500);
                        // toastr.error('Có lỗi xảy ra. Vui lòng thử lại.', 'Lỗi');
                    }
                }
            });
        });
    </script>
    <script>
        function previewImage() {
            const fileInput = document.getElementById('profileImageInput');
            const file = fileInput.files[0];
            const imagePreview = document.getElementById('profileImagePreview');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    toastr.success(`Thay ảnh đại diện thành công`, 'Thông Báo');
                };

                reader.readAsDataURL(file);
            }
        }

        // Xử lý sự kiện xóa ảnh
        document.getElementById('deleteProfileImageBtn').addEventListener('click', function() {
            const imagePreview = document.querySelector('img');
            imagePreview.src = "{{ asset('assets/img/default.jpg') }}";  // Đặt lại ảnh mặc định hoặc ảnh ban đầu
            document.getElementById('profileImageInput').value = '';  // Xóa giá trị input file
        });
    </script>
@endsection

