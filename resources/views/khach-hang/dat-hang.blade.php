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
                            <span>{{ $list_tai_khoan->HoTen }} - {{ $list_tai_khoan->SDT }}</span><br>
                            <span>{{ $list_tai_khoan->DiaChi }}</span>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product['TenSP'] }}</td> <!-- Hiển thị tên sản phẩm -->
                                    <td>{{ number_format($product['GiaBan'], 0, ',', '.') }}₫</td>
                                    <td>{{ $product['SLSanPham'] }}</td>
                                    <td class="item-total">{{ number_format($product['Total'], 0, ',', '.') }}₫</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="text" class="form-control mt-3" id="note" placeholder="Nhập ghi chú ở đây">
                </div>
            </div>

            <!-- Khung 3: Đơn vị vận chuyển -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-truck text-success me-2"></i>Phương thức vận chuyển</h3>
                    @foreach ($list_dvvc as $dvvc)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="MaVC" value="{{ $dvvc->MaVC }}" id="{{ $dvvc->MaVC }}" data-tienvc="{{ $dvvc->TienVC }}">
                            <label class="form-check-label" for="{{ $dvvc->MaVC }}">{{ $dvvc->TenDonViVC }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Khung 4: PTTT -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-currency-dollar text-warning me-2"></i>Phương thức thanh toán</h3>
                    @foreach ($list_pttt as $pttt)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="MaPTTT" value="{{ $pttt->MaPTTT }}" id="{{ $pttt->MaPTTT }}">
                            <label class="form-check-label" for="{{ $pttt->MaPTTT }}">{{ $pttt->TenPTTT }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Khung 5: Mã khuyến mãi -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-ticket-perforated text-danger me-2"></i>Mã khuyến mãi</h3>
                    <select class="form-select mb-3 khuyenmai" id="khuyenmai">
                        <option value="">-- Chọn mã khuyến mãi --</option>
                        @foreach($list_khuyenmai as $khuyenmai)
                            <option value="{{ $khuyenmai->MaKM }}" data-phantram="{{ $khuyenmai->PhanTramGiam }}" data-giamtoida="{{ $khuyenmai->GiaTriToiDa }}">{{ $khuyenmai->TenKM }}</option>
                        @endforeach
                    </select>
                    <h3><i class="bi bi-ticket-perforated text-danger me-2"></i>Mã miễn vận chuyển</h3>
                    <select class="form-select mb-3 khuyenmaivc" id="khuyenmaivc">
                        <option value="">-- Chọn mã miễn vận chuyển --</option>
                        @foreach($list_khuyenmaivc as $khuyenmaivc)
                            <option value="{{ $khuyenmaivc->MaKMVC }}" data-phantram="{{ $khuyenmaivc->PhanTramGiam }}" data-giamtoida="{{ $khuyenmaivc->GiaTriToiDa }}">{{ $khuyenmaivc->TenKMVC }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Khung 6: chi tiết thanh toán -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><i class="bi bi-clipboard text-warning me-2"></i>Chi tiết thanh toán</h3>
                    <div class="d-flex justify-content-between">
                        <span>Tổng tiền hàng</span>
                        <span id="tongtienhang">0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tổng tiền vận chuyển</span>
                        <span id="tongtienvc">0₫</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Giảm tiền hàng</span>
                        <span id="giamtienhang">0₫</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Giảm tiền vận chuyển</span>
                        <span id="giamtienvc">0₫</span>
                    </div>
                </div>
            </div>

            <!-- Khung 7: đặt hàng -->
            <div class="card mb-4">
                <div class="card-body text-end">
                    <h3 class="d-inline tongthanhtoan">Tổng thanh toán: <span class="text-danger" id="tongthanhtoan">0</span></h3> 
                    <button class="btn btn-danger ms-3" id="btnThanhToan" data-bs-toggle="modal" data-bs-target="#confirmPaymentModal">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Xác nhận thanh toán -->
<div class="modal fade" id="confirmPaymentModal" tabindex="-1" aria-labelledby="confirmPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmPaymentModalLabel">Xác nhận thanh toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn thanh toán không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmPaymentButton">Xác nhận</button>
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
                    <form id="changeAddressForm">
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

@section('scripts')
    <script>
        //Tính tổng tiền hàng
        document.addEventListener('DOMContentLoaded', function() {
            const itemTotals = document.querySelectorAll('.item-total');
            let tongtienhang = 0;

            itemTotals.forEach(item => {
                // Chuyển chuỗi tiền tệ thành số và cộng vào tổng
                let amount = parseInt(item.textContent.replace(/\./g, '').trim());
                tongtienhang += amount;
            });

            // Hiển thị tổng tiền hàng sau khi tính
            document.getElementById('tongtienhang').textContent = tongtienhang.toLocaleString('vi-VN');
        });

        // Tính tiền vận chuyển
        document.querySelectorAll('input[name="MaVC"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                // Get the TienVC from the selected radio button
                const tienvc = this.getAttribute('data-tienvc');
                document.getElementById('tongtienvc').innerText = new Intl.NumberFormat('vi-VN').format(tienvc) + '₫'; // Format and display the value
            });
        });

        //Giảm giá khuyến mãi
        document.getElementById('khuyenmai').addEventListener('change', function() {
            // Lấy tổng tiền hàng
            const tongTienHang = parseFloat(document.getElementById('tongtienhang').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;
            const selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                // Lấy phần trăm giảm và giá trị giảm tối đa từ thuộc tính data
                const phanTramGiam = parseFloat(selectedOption.getAttribute('data-phantram')) || 0;
                const giamToiDa = parseFloat(selectedOption.getAttribute('data-giamtoida')) || 0;

                // Tính giảm tiền hàng
                const giamTienHang = (tongTienHang * phanTramGiam) / 100;

                // Kiểm tra xem giảm tiền hàng có vượt quá giá trị tối đa hay không
                const giamTienHienTai = giamTienHang > giamToiDa ? giamToiDa : giamTienHang;

                // Cập nhật giá trị giảm tiền hàng trong view
                document.getElementById('giamtienhang').innerText = new Intl.NumberFormat('vi-VN').format(giamTienHienTai) + '₫';
            } else {
                // Nếu không có mã khuyến mãi được chọn
                document.getElementById('giamtienhang').innerText = '0₫';
            }
        });

        //Giảm giá vận chuyển
        document.getElementById('khuyenmaivc').addEventListener('change', function() {
            // Lấy tổng tiền hàng
            const tongTienVC = parseFloat(document.getElementById('tongtienvc').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;
            const selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                // Lấy phần trăm giảm và giá trị giảm tối đa từ thuộc tính data
                const phanTramGiam = parseFloat(selectedOption.getAttribute('data-phantram')) || 0;
                const giamToiDa = parseFloat(selectedOption.getAttribute('data-giamtoida')) || 0;

                // Tính giảm tiền hàng
                const giamTienVC = (tongTienVC * phanTramGiam) / 100;

                // Kiểm tra xem giảm tiền hàng có vượt quá giá trị tối đa hay không
                const giamTienHienTai = giamTienVC > giamToiDa ? giamToiDa : giamTienVC;

                // Cập nhật giá trị giảm tiền hàng trong view
                document.getElementById('giamtienvc').innerText = new Intl.NumberFormat('vi-VN').format(giamTienHienTai) + '₫';
            } else {
                // Nếu không có mã khuyến mãi được chọn
                document.getElementById('giamtienvc').innerText = '0₫';
            }
        });

        //TỔNG THANH TOÁN
        function capNhatTongThanhToan() {
            // Lấy giá trị từ các phần tử hiển thị
            const tongTienHang = parseFloat(document.getElementById('tongtienhang').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;
            const tongTienVC = parseFloat(document.getElementById('tongtienvc').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;
            const giamTienHang = parseFloat(document.getElementById('giamtienhang').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;
            const giamTienVC = parseFloat(document.getElementById('giamtienvc').innerText.replace(/\./g, '').replace('₫', '').trim()) || 0;

            // Tính tổng thanh toán
            const tongThanhToan = tongTienHang + tongTienVC - giamTienHang - giamTienVC;

            // Cập nhật giá trị tổng thanh toán vào HTML
            document.getElementById('tongthanhtoan').innerText = new Intl.NumberFormat('vi-VN').format(tongThanhToan) + '₫';
        }

        // Gọi hàm capNhatTongThanhToan khi có sự kiện thay đổi trong khuyến mãi và vận chuyển
        document.getElementById('khuyenmai').addEventListener('change', capNhatTongThanhToan);
        document.getElementById('khuyenmaivc').addEventListener('change', capNhatTongThanhToan);

        // Gọi hàm capNhatTongThanhToan khi trang được tải
        document.addEventListener('DOMContentLoaded', capNhatTongThanhToan);
    </script>

@endsection
