<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\khach_hang\DatHang;
use App\Models\khach_hang\ChiTietDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Log;

class DatHangController extends Controller
{
    public function getDonHang()
    {
        $MaTK = session('MaTK');
        $list_don_hang = DB::table('donhang')
            ->join('chitietdonhang', 'donhang.MaDH', '=', 'chitietdonhang.MaDH')
            ->join('sanpham', 'sanpham.MaSP', '=', 'chitietdonhang.MaSP')
            ->where('donhang.MaTK', $MaTK)
            ->get();


        $dathang = new DatHang();
        $list_don_hang = $dathang -> getdonhang();

        // $list_san_pham = $dathang -> getsanpham();
//        $list_san_pham = $dathang -> getsanpham();
        $list_pttt = $dathang -> getpttt();
        $list_dvvc = $dathang -> getdvvc();
        $list_khuyenmai = $dathang -> getkhuyenmai($MaTK);
        $list_khuyenmaivc = $dathang -> getkhuyenmaivc($MaTK);
        $list_tai_khoan = $dathang -> gettaikhoan($MaTK);

        // Lấy chi tiết giỏ hàng
        $list_chitiet_giohang = $this->getctgh();

        // Group sản phẩm theo MaSP
        $grouped_products = $list_chitiet_giohang->groupBy('MaSP');
        // dd($grouped_products);

        // Tạo mảng để lưu dữ liệu cho view
        // Tạo mảng để lưu dữ liệu cho view
        $products = [];

        foreach ($grouped_products as $MaSP => $items) {
            $firstItem = $items->first(); // Lấy phần tử đầu tiên trong nhóm
            $sanpham = DB::table('sanpham')->where('MaSP', $MaSP)->first();

            // Tính tổng tiền
            $totalPrice = $firstItem->SLSanPham * $sanpham->GiaBan;

            // Thêm ảnh vào mảng sản phẩm
            $products[] = [
                'TenSP' => $sanpham->TenSP, // Đổi tên thành TenSP
                'GiaBan' => $sanpham->GiaBan,
                'SLSanPham' => $firstItem->SLSanPham,
                'Total' => $totalPrice,
                'AnhSP' => asset('asset/img-product/' . $sanpham->AnhSP) // Thêm ảnh sản phẩm
            ];
        }

        $list_kc=DB::table('tinhkc')->get();
        return view('khach-hang.dat-hang', compact(
            'list_don_hang', 'list_tai_khoan',
            'list_pttt', 'list_dvvc', 'list_khuyenmai',
            'list_don_hang',  'list_tai_khoan',
            'list_pttt', 'list_dvvc', 'list_khuyenmai',
            'list_khuyenmaivc', 'products','list_chitiet_giohang', 'list_kc'
        ));
    }

    public function thanhToan(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'TenKH' => 'required|string|max:255',
            'SDT' => 'required|string|max:15',
            'DiaChiGiaoHang' => 'required|string|max:255',
            'TongTien' => 'required|numeric',
            'TienHang' => 'required|numeric',
            'TienVC' => 'required|numeric',
            'GiamTienHang' => 'required|numeric',
            'GiamTienVC' => 'required|numeric',
            'MaPTTT' => 'nullable|string',
            'MaVC' => 'nullable|string',
            'MaKM' => 'nullable|string',
            'MaKMVC' => 'nullable|string',
            'GhiChu' => 'nullable|string|max:255',
        ]);

        $MaTK = session('MaTK');

        // Bắt đầu giao dịch
        DB::beginTransaction();

        try {
            // Bước 1: Tạo bản ghi mới trong bảng donhang
            $donHang = new DatHang();
            $donHang->TenKH = $request->input('TenKH');
            $donHang->SDT = $request->input('SDT');
            $donHang->GhiChu = $request->input('GhiChu');
            $donHang->TienHang = $request->input('TienHang');
            $donHang->TienVC = $request->input('TienVC');
            $donHang->GiamTienHang = $request->input('GiamTienHang');
            $donHang->GiamTienVC = $request->input('GiamTienVC');
            $donHang->TongTien = $request->input('TongTien');
            $donHang->DiaChiGiaoHang = $request->input('DiaChiGiaoHang');
            $donHang->MaPTTT = $request->input('MaPTTT');
            $donHang->MaTK = $MaTK;
            $donHang->MaKM = $request->input('MaKM');
            $donHang->MaKMVC = $request->input('MaKMVC');
            $donHang->MaVC = $request->input('MaVC');
            $donHang->MaTT = 1; // Mặc định
            $donHang->ThanhToan = 0;
            $donHang->NgayTaoDH = Carbon::now(); // Lấy ngày hiện tại
            $donHang->save();

            // Bước 2: Lấy MaDH vừa mới tạo
            $MaDH = $donHang->MaDH;

            // Bước 3: Thêm sản phẩm vào chitietdonhang
            $list_chitiet_giohang = $this->getctgh();
            foreach ($list_chitiet_giohang as $item) {
                $chiTietDonHang = new ChiTietDonHang();
                $chiTietDonHang->MaDH = $MaDH;
                $chiTietDonHang->MaSP = $item->MaSP;
                $chiTietDonHang->SoLuong = $item->SLSanPham;
                $chiTietDonHang->GiaBan = $item->GiaBan;
                $chiTietDonHang->save();

                // Bước 4: Cập nhật số lượng tồn kho trong bảng sanpham
                DB::table('sanpham')
                    ->where('MaSP', $item->MaSP)
                    ->decrement('SoLuongTonKho', $item->SLSanPham);
            }

            // Cập nhật số lượng mã khuyến mãi và ẩn nếu số lượng về 0 hoặc ngày hết hạn
            if ($donHang->MaKM) {
                $khuyenMai = DB::table('khuyenmai')
                    ->where('MaKM', $donHang->MaKM)
                    ->first();

                if ($khuyenMai) {
                    // Kiểm tra ngày hiện tại có nằm trong khoảng NgayBD và NgayKT
                    $currentDate = Carbon::now();
                    if ($currentDate->greaterThanOrEqualTo($khuyenMai->NgayBD) && $currentDate->lessThanOrEqualTo($khuyenMai->NgayKT)) {
                        // Nếu mã còn hiệu lực, cập nhật số lượng
                        DB::table('khuyenmai')
                            ->where('MaKM', $donHang->MaKM)
                            ->decrement('SoLuongMa');
                    } else {
                        // Nếu mã hết hiệu lực, ẩn mã khuyến mãi
                        DB::table('khuyenmai')
                            ->where('MaKM', $donHang->MaKM)
                            ->update(['TrangThaiMa' => 'ẩn']);
                    }

                    // Kiểm tra nếu số lượng mã khuyến mãi về 0 và ẩn nếu cần
                    $soLuongMaKM = DB::table('khuyenmai')
                        ->where('MaKM', $donHang->MaKM)
                        ->value('SoLuongMa');

                    if ($soLuongMaKM <= 0) {
                        DB::table('khuyenmai')
                            ->where('MaKM', $donHang->MaKM)
                            ->update(['TrangThaiMa' => 'ẩn']);
                    }
                }
            }

// Cập nhật số lượng mã vận chuyển và ẩn nếu số lượng về 0 hoặc ngày hết hạn
            if ($donHang->MaKMVC) {
                $khuyenMaiVC = DB::table('khuyenmaivc')
                    ->where('MaKMVC', $donHang->MaKMVC)
                    ->first();

                if ($khuyenMaiVC) {
                    // Kiểm tra ngày hiện tại có nằm trong khoảng NgayBD và NgayKT
                    $currentDate = Carbon::now();
                    if ($currentDate->greaterThanOrEqualTo($khuyenMaiVC->NgayBD) && $currentDate->lessThanOrEqualTo($khuyenMaiVC->NgayKT)) {
                        // Nếu mã còn hiệu lực, cập nhật số lượng
                        DB::table('khuyenmaivc')
                            ->where('MaKMVC', $donHang->MaKMVC)
                            ->decrement('SoLuongMa');
                    } else {
                        // Nếu mã hết hiệu lực, ẩn mã vận chuyển
                        DB::table('khuyenmaivc')
                            ->where('MaKMVC', $donHang->MaKMVC)
                            ->update(['TrangThaiMa' => 'ẩn']);
                    }

                    // Kiểm tra nếu số lượng mã vận chuyển về 0 và ẩn nếu cần
                    $soLuongMaVC = DB::table('khuyenmaivc')
                        ->where('MaKMVC', $donHang->MaKMVC)
                        ->value('SoLuongMa');

                    if ($soLuongMaVC <= 0) {
                        DB::table('khuyenmaivc')
                            ->where('MaKMVC', $donHang->MaKMVC)
                            ->update(['TrangThaiMa' => 'ẩn']);
                    }
                }
            }

            // Bước 5: Xóa giỏ hàng
            DB::table('chitietgiohang')->delete();

            // Commit giao dịch
            DB::commit();

            // Bước 6: Chuyển hướng về trang tra-cuu-don-hang
            return response()->json(['success' => true, 'message' => 'Thanh toán thành công.']);
        } catch (\Exception $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            DB::rollBack();

            // Ghi lại chi tiết lỗi vào log
            Log::error('Error in thanhToan: ' . $e->getMessage());

            // Xử lý lỗi
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại.', 'error' => $e->getMessage()], 500);
        }
    }



    public function getctgh()
    {
        return DB::table('chitietgiohang')
        ->join('sanpham', 'chitietgiohang.MaSP', '=', 'sanpham.MaSP')
        ->select('chitietgiohang.*', 'sanpham.GiaBan') // Đảm bảo rằng GiaBan được lấy
        ->get();
    }

    public function hienTatCaDonHang_ALL()
    {
        // Sử dụng phương thức getDonHang() trong model để lấy dữ liệu đơn hàng
        $data = (new DatHang())->getDonHang_ALL();

        // Trả về dữ liệu dưới dạng JSON cho AJAX
        return response()->json($data);
    }

    public function hienTatCaDonHang_TT($trangthai)
    {
        // Sử dụng phương thức getdonhang_TT($trangthai) trong model để lấy dữ liệu đơn hàng theo trạng thái
        $data = (new DatHang())->getdonhang_TT($trangthai);

        // Trả về dữ liệu dưới dạng JSON cho AJAX
        return response()->json($data);
    }
}
