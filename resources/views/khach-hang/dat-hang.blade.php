@extends('khach-hang.master')

@section('contents')
    <div class="container-xl d-flex justify-content-center py-4">
        <div class="card w-75">
            <!-- Khung 1: Địa chỉ nhận hàng -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-geo-alt-fill text-danger me-2" style="font-size: 1.5rem;"></i>
                        <h1 class="mb-0 text-danger">ĐỊA CHỈ NHẬN HÀNG</h1>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="flex-grow-1">
                            <span>Mã Huyền Trân 0369803509</span><br>
                            <span>72, Nguyễn Huệ, P2, Thành phố Vĩnh Long</span>
                            <span class="badge bg-danger text-white ms-2">Mặc định</span>
                        </div>
                        <button class="btn btn-outline-dark btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#Modaladddiachi">
                            <i class="bi bi-pencil me-1"></i> Thay đổi
                        </button>
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
                    <input type="text" class="form-control mt-3" id="note" placeholder="Nhập ghi chú ở đây">
                </div>
            </div>

            <!-- Khung 3: Đơn vị vận chuyển -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-truck text-success me-2"></i>Phương thức vận chuyển</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="MaVC" value="option1">
                        <label class="form-check-label">Giao hàng tiết kiệm</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="MaVC" value="option2">
                        <label class="form-check-label">Giao hàng nhanh</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="MaVC" value="option3">
                        <label class="form-check-label">Giao hàng hỏa tốc</label>
                    </div>
                </div>
            </div>

            <!-- Khung 4: PTTT -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-currency-dollar text-warning me-2"></i>Phương thức thanh toán</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="MaPTTT" value="option1">
                        <label class="form-check-label">Thanh toán trực tiếp</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="MaPTTT" value="option2">
                        <label class="form-check-label">Thanh toán trực tuyến</label>
                    </div>
                </div>
            </div>

            <!-- Khung 5: Mã khuyến mãi -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-ticket-perforated text-danger me-2"></i>Mã khuyến mãi</h3>
                    <select class="form-select mb-3">
                        <option value="">-- Chọn mã khuyến mãi --</option>
                        <option value="promo1">Giảm 50%</option>
                        <option value="promo2">Giảm 20%</option>
                        <option value="promo3">Giảm 30%</option>
                    </select>
                    <h3><i class="bi bi-ticket-perforated text-danger me-2"></i>Mã miễn vận chuyển</h3>
                    <select class="form-select">
                        <option value="">-- Chọn mã miễn vận chuyển --</option>
                        <option value="promo1">Miễn phí vận chuyển 20k</option>
                        <option value="promo2">Miễn toàn bộ phí vận chuyển</option>
                    </select>
                </div>
            </div>

            <!-- Khung 6: chi tiết thanh toán -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-clipboard text-warning me-2"></i>Chi tiết thanh toán</h3>
                    <div class="d-flex justify-content-between">
                        <span>Tổng tiền hàng</span>
                        <span>20.000.000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tổng tiền vận chuyển</span>
                        <span>30.000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Giảm tiền hàng</span>
                        <span>-200.000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Giảm tiền vận chuyển</span>
                        <span>-30.000</span>
                    </div>
                </div>
            </div>

            <!-- Khung 7: đặt hàng -->
            <div class="card mb-4">
                <div class="card-body text-end">
                    <h3 class="d-inline">Tổng thanh toán: <span class="text-danger">18.000.000</span></h3>
                    <button class="btn btn-danger ms-3">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm địa chỉ -->
    <div class="modal fade" id="Modaladddiachi" tabindex="-1" aria-labelledby="ModaladddiachiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModaladddiachiLabel">Thay đổi địa chỉ nhận hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" required pattern="[0-9]{10}">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
