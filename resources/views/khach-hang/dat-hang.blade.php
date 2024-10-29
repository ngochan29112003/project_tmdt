@extends('khach-hang.master')

@section('contents')
    <style>
        .address-container {
            display: flex;
            align-items: center; /* Căn giữa theo chiều dọc */
        }

        .icon-address svg {
            margin-right: 8px; /* Khoảng cách giữa biểu tượng và tiêu đề */
            fill: red; /* Đặt màu biểu tượng thành đỏ */
            height: 24px; /* Kích thước cao */
            width: 24px; /* Kích thước rộng */
        }

        .address-title {
            font-size: 24px; /* Kích thước chữ cho tiêu đề */
            color: red; /* Đặt màu chữ thành đỏ */
            margin: 0; /* Bỏ khoảng cách mặc định */
            line-height: 24px; /* Căn chỉnh chiều cao dòng để phù hợp với chiều cao của biểu tượng */
        }

        .infor-address {
            display: flex; /* Sử dụng Flexbox để căn chỉnh các phần tử */
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: space-between; /* Tạo khoảng cách đều giữa các phần tử */
            margin-top: 40px;
        }

        .name-phone, .address, .default {
            margin-right: 16px; /* Khoảng cách giữa các phần tử (có thể điều chỉnh) */
        }

        button {
            margin-left: auto; /* Đẩy nút về bên phải */
        }
    </style>
<div class="page-body">
    <div class="container-xl d-flex justify-content-center">
        <div class="card w-75">
            <!-- Khung 1: Địa chỉ nhận hàng -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="icon-address">
                        <div class="address-container">
                            <svg height="20" viewBox="0 0 12 16" width="20" class="shopee-svg-icon icon-location-marker">
                                <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                            </svg>
                            <h2 class="address-title">ĐỊA CHỈ NHẬN HÀNG</h2>
                        </div>
                    </div>
                    <div class="infor-address">
                        <div class="name-phone">Mã Huyền Trân 0369803509</div>
                        <div class="address">72, Nguyễn Huệ, P2, Thành phố Vĩnh Long</div>
                        <div class="default" style="color: red; border: 1px solid">Mặc định</div>
                        <div class="row mt-2">
                            <div class="col-md-9 d-flex align-items-center gap-2 justify-content-start">
                                <button class="btn" style="background-color: white; color: black; padding: 5px 10px; border: 1px solid black;" data-bs-toggle="modal" data-bs-target="#Modaladddiachi">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Thay đổi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Khung 2: Bảng sản phẩm -->
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                        Ghi chú:<input type="text" id="note" style="width: 100%; border: none; outline: none;" placeholder="Nhập ghi chú ở đây">
                </div>
            </div>

            <!-- Khung 3: Đơn vị vận chuyển -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="radio-group-convert">
                        <label for="">
                            <i class="bi bi-truck" style="color: green; margin-right: 4px;"></i>
                            Phương thức vận chuyển
                        </label> <br>
                        <label>
                            <input type="radio" name="MaVC" value="option1">
                            Giao hàng tiết kiệm
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="MaVC" value="option2">
                            Giao hàng nhanh
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="MaVC" value="option3">
                            Giao hàng hỏa tốc
                        </label>
                    </div>
                </div>
            </div>

             <!-- Khung 4: PTTT -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="radio-group-pay">
                        <label for="">
                            <i class="bi bi-currency-dollar" style="color: orange; margin-right: 4px;"></i>
                            Phương thức thanh toán
                        </label> <br>
                        <div class="pay-offline">
                            <label>
                                <input type="radio" name="MaPTTT" value="option1">
                                Thanh toán trực tiếp
                            </label>
                        </div>
                        <div class="pay-online">
                            <label>
                                <input type="radio" name="MaPTTT" value="option2">
                                Thanh toán trực tuyến
                            </label>
                            <br>
                            <div class="qr-code"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Khung 5: Mã khuyến mãi -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="promotion-code-cost">
                        <label for="promotion">
                            <i class="bi bi-ticket-perforated" style="color: red; margin-right: 4px;"></i>
                            Mã khuyến mãi
                        </label>
                        <select id="promotion" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
                            <option value="">-- Chọn mã khuyến mãi --</option>
                            <option value="promo1">Giảm 50%</option>
                            <option value="promo2">Giảm 20%</option>
                            <option value="promo3">Giảm 30%</option>
                        </select>
                    </div>
                    <div class="promotion-code-freeship">
                        <label for="promotion">
                            <i class="bi bi-ticket-perforated" style="color: red; margin-right: 4px;"></i>
                            Mã miễn vận chuyển
                        </label>
                        <select id="promotion" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
                            <option value="">-- Chọn mã miễn vận chuyển --</option>
                            <option value="promo1">Miễn phí vận chuyển 20k</option>
                            <option value="promo2">Miễn toàn bộ phí vận chuyển</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Khung 6: chi tiết thanh toán -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="payment-details">
                        <label for="promotion">
                            <i class="bi bi-clipboard" style="color: orange; margin-right: 4px;"></i>
                            Chi tiết thanh toán
                        </label>
                        <div class="sum-cost" style="display: flex; justify-content: space-between; align-items: center;">
                            Tổng tiền hàng
                            <div>20.000.000</div>
                        </div>
                        <div class="sum-convert" style="display: flex; justify-content: space-between; align-items: center;">
                            Tổng tiền vận chuyển
                            <div>30.000</div>
                        </div>
                        <div class="reduce-cost" style="display: flex; justify-content: space-between; align-items: center;">
                            Giảm tiền hàng
                            <div>-200.000</div>
                        </div>
                        <div class="reduce-convert" style="display: flex; justify-content: space-between; align-items: center;">
                            <span>Giảm tiền vận chuyển</span>
                            <div>-30.000</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Khung 7: đặt hàng -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="sum-payment" style="display: flex; justify-content: flex-end; align-items: center; gap: 15px;">
                        <label for="promotion" style="margin: 0;">Tổng thanh toán:</label>
                        <div class="reduce-convert" style="display: flex; align-items: center;">
                            18.000.000
                        </div>
                        <button style="background-color: red; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">
                            Thanh toán
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ======= Modal Thêm địa chỉ ======= -->
    <div class="modal fade" id="Modaladddiachi">
        <div class="modal-dialog modal-lg"> <!-- Chỉnh thành modal-lg để form rộng hơn -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thay đổi địa chỉ nhận hàng</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="Formaddtlbl" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="MaBL" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="NoiDungTL" id="NoiDungTL" required>                                
                            </div>
                            <div class="col-md-6 mb-3" >
                                <label for="NoiDungTL" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="NoiDungTL" id="NoiDungTL" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="NgayTL" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="NgayTL" id="NgayTL" required>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection