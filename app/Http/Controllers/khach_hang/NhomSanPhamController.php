<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhomSanPhamController extends Controller
{
    public function show($category, $manufacturer)
    {
        // Tìm danh mục dựa trên tên
        $danh_muc = DB::table('danhmucsanpham')->where('TenDM', 'LIKE', $category)->first();
        $hang_sx = DB::table('hangsanxuat')->where('TenHSX', 'LIKE', $manufacturer)->first();

        if (!$danh_muc || !$hang_sx) {
            session()->flash('error', 'Danh mục hoặc hãng sản xuất không tồn tại.');
            return redirect()->back();
        }

        // Lấy danh sách sản phẩm theo danh mục và hãng sản xuất
        $san_pham_theo_nhom = DB::table('sanpham')
            ->where('MaDM', $danh_muc->MaDM)
            ->where('MaHSX', $hang_sx->MaHSX)
            ->get();

        if ($san_pham_theo_nhom->isEmpty()) {
            session()->flash('error', 'Không có sản phẩm nào trong nhóm này.');
            return redirect()->back();
        }

        // Trả về view nếu có sản phẩm
        return view('khach-hang.nhom-san-pham', compact('san_pham_theo_nhom', 'category', 'manufacturer'));
    }


}
