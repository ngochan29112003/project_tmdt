<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GioHangController extends Controller
{
    public function getDsGioHang()
    {
        $MaTK = session('MaTK');
        $chitiet = DB::table('giohang')
            ->join('chitietgiohang', 'giohang.MaGH', '=', 'chitietgiohang.MaGH')
            ->join('sanpham', 'sanpham.MaSP', '=', 'chitietgiohang.MaSP')
            ->where('giohang.MaTK', $MaTK)
            ->get();

//        dd($chitiet);
        return view('khach-hang.gio-hang',compact('chitiet'));
    }

    public function addToCart(Request $request)
    {
        $MaSP = $request->MaSP;
        $MaTK = session('MaTK'); // Giả sử MaTK được lưu trong session

        // Kiểm tra xem có giỏ hàng hiện tại của người dùng không
        $existingCart = DB::table('giohang')
            ->where('MaTK', $MaTK)
            ->first();

        if ($existingCart) {
            $MaGH = $existingCart->MaGH;
        } else {
            // Tạo mới giỏ hàng nếu không tìm thấy giỏ hàng nào
            $MaGH = DB::table('giohang')->insertGetId([
                'MaTK' => $MaTK
            ]);
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng này chưa
        $existingProduct = DB::table('chitietgiohang')
            ->where('MaGH', $MaGH)
            ->where('MaSP', $MaSP)
            ->first();

        if ($existingProduct) {
            // Nếu sản phẩm đã có, cập nhật số lượng sản phẩm
            DB::table('chitietgiohang')
                ->where('MaGH', $MaGH)
                ->where('MaSP', $MaSP)
                ->increment('SLSanPham'); // Tăng SLSanPham lên 1
        } else {
            // Thêm mới sản phẩm vào giỏ hàng nếu chưa có
            DB::table('chitietgiohang')->insert([
                'MaGH' => $MaGH,
                'MaSP' => $MaSP,
                'SLSanPham' => 1 // Khởi tạo số lượng sản phẩm là 1
            ]);
        }

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng thành công!']);
    }
}
