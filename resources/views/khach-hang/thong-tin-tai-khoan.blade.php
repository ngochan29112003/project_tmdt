@extends('khach-hang.master')
@section('contents')
    <div class="page-body">
        <div class="container-xl d-flex justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <form id="Formthongtintk" enctype="multipart/form-data">
                        @csrf
                        <div class="container p-4 rounded shadow-sm" style="background-color: #f8f9fa;">
                            <h1 class="mb-4 text-danger">Thông Tin Tài Khoản</h1>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="AnhDaiDien" class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="AnhDaiDien" id="edit_AnhDaiDien">
                                </div>
                                <div class="col-md-6">
                                    <label for="HoTen" class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" name="HoTen" id="edit_HoTen" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="NgaySinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" name="NgaySinh" id="edit_NgaySinh" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="GioiTinh" class="form-label">Giới tính</label>
                                    <select class="form-select" name="GioiTinh" id="edit_GioiTinh" required>
                                        <option value="" disabled selected>Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="SDT" class="form-label">Số điện thoại</label>
                                    <input type="number" class="form-control" name="SDT" id="edit_SDT" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="Email" id="edit_Email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="DiaChi" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="DiaChi" id="edit_DiaChi" required>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var TaiKhoan = "{{ session('MaTK') }}"; // lấy MaTK từ session

            var url = "{{ route('edit-thong-tin-tai-khoan', ':id') }}";
            url = url.replace(':id', TaiKhoan);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    var data = response.taikhoan;
                    $('#edit_AnhDaiDien').val(data.AnhDaiDien);
                    $('#edit_HoTen').val(data.HoTen);
                    $('#edit_NgaySinh').val(data.NgaySinh);
                    $('#edit_GioiTinh').val(data.GioiTinh);
                    $('#edit_SDT').val(data.SDT);
                    $('#edit_DiaChi').val(data.DiaChi);
                    $('#edit_Email').val(data.Email);
                },
                error: function (xhr) {
                    console.log("Error: " + xhr.responseText);
                }
            });
    });

        //Lưu lại dữ liệu khi chỉnh sửa
        $('#Formthongtintk').submit(function (e) {
            e.preventDefault();
            var tttkid = $(this).data('id');
            var url = "{{ route('update-thong-tin-tai-khoan', ':id') }}";
            url = url.replace(':id', tttkid);
            var formData = new FormData(this);
            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.response, "Cập nhật thành công");
                        setTimeout(function () {
                            location.reload()
                        }, 500);
                    }
                },
                error: function (xhr) {
                    toastr.error("Lỗi");
                }
            });
        });
    </script>
@endsection
