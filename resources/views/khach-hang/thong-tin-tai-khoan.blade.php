@extends('khach-hang.master')
@section('contents')
    <div class="page-body">
        <div class="container-xl d-flex justify-content-center">
            <div class="card w-75">
                <div class="card-body">
                    <form id="Formthongtintk" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="AnhDaiDien" class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="AnhDaiDien" id="edit_AnhDaiDien" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="HoTen" class="form-label">Họ tên</label>
                                <input type="test" class="form-control" name="HoTen" id="edit_HoTen" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="TenDangNhap" class="form-label">Tên đăng nhập</label>
                                <input type="test" class="form-control" name="TenDangNhap" id="edit_TenDangNhap" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="NgaySinh" class="form-label">Ngày sinh</label>
                                <input type="test" class="form-control" name="NgaySinh" id="edit_NgaySinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="GioiTinh" class="form-label">Giới tính</label>
                                <input type="test" class="form-control" name="GioiTinh" id="edit_GioiTinh" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="SDT" class="form-label">Số điện thoại</label>
                                <input type="test" class="form-control" name="SDT" id="edit_SDT" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="DiaChi" class="form-label">Địa chỉ</label>
                                <input type="test" class="form-control" name="DiaChi" id="edit_DiaChi" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="test" class="form-control" name="Email" id="edit_Email" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
                    $('#edit_TenDangNhap').val(data.TenDangNhap);
                    $('#edit_MatKhau').val(data.MatKhau);
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
