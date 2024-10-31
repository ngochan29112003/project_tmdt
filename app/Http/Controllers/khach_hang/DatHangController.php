<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\khach_hang\DatHang;
use App\Models\khach_hang\ChiTietDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $list_san_pham = $dathang -> getsanpham();
        $list_pttt = $dathang -> getpttt();
        $list_dvvc = $dathang -> getdvvc();
        $list_khuyenmai = $dathang -> getkhuyenmai($MaTK);
        $list_khuyenmaivc = $dathang -> getkhuyenmaivc($MaTK);
        $list_tai_khoan = $dathang -> gettaikhoan($MaTK);

        // Lấy chi tiết giỏ hàng
        $list_chitiet_giohang = $this->getctgh();
        
        // Group sản phẩm theo MaSP
        $grouped_products = $list_chitiet_giohang->groupBy('MaSP');
        
        // Tạo mảng để lưu dữ liệu cho view
        $products = [];
        
        foreach ($grouped_products as $MaSP => $items) {
            $firstItem = $items->first(); // Lấy phần tử đầu tiên trong nhóm
            $sanpham = DB::table('sanpham')->where('MaSP', $MaSP)->first();

            // Tính tổng tiền
            $totalPrice = $firstItem->SLSanPham * $sanpham->GiaBan;

            $products[] = [
                'TenSP' => $sanpham->TenSP, // Đổi tên thành TenSP
                'GiaBan' => $sanpham->GiaBan,
                'SLSanPham' => $firstItem->SLSanPham,
                'Total' => $totalPrice,
            ];
        }

//        dd($chitiet);
        return view('khach-hang.dat-hang',
        compact('list_don_hang', 'list_don_hang', 'list_san_pham',
        'list_tai_khoan', 'list_pttt', 'list_dvvc', 'list_khuyenmai', 'list_khuyenmaivc', 'products'));
    }

    public function getctgh()
    {
        return DB::table('chitietgiohang')->get();
    }
}