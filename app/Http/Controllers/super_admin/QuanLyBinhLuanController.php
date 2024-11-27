<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyBinhLuan;
use Illuminate\Http\Request;

class QuanLyBinhLuanController extends Controller
{
    /**
     * Hàm trả về view quản lý bình luận
     */
    public function getView()
    {
        $quanlybinhluanModel = new QuanLyBinhLuan();

        // Lấy bình luận đã duyệt
        $list_binh_luan_da_duyet = $quanlybinhluanModel->getbinhluan_daduyet();
        // Lấy bình luận chưa duyệt
        $list_binh_luan_chua_duyet = $quanlybinhluanModel->getbinhluan_chuaduyet();

        // Trả về view và truyền danh sách bình luận chưa duyệt (mặc định) vào view
        return view(
            'super-admin.quan-ly-binh-luan.danh-sach-binh-luan',
            compact('list_binh_luan_chua_duyet', 'list_binh_luan_da_duyet')
        );
    }

    /**
     * Lọc bình luận theo trạng thái (Chưa duyệt/Đã duyệt)
     */
    public function filterBinhLuan(Request $request)
    {
        $trangThai = $request->input('trangThai'); // Lấy trạng thái từ frontend

        // Sử dụng phương thức getbinhluan_by_trangthai để lấy dữ liệu theo trạng thái
        $model = new QuanLyBinhLuan();
        $list_binh_luan = $model->getbinhluan_by_trangthai($trangThai);

        return response()->json([
            'list_binh_luan' => $list_binh_luan
        ]);
    }

    public function duyetBinhLuan(Request $request, $id)
    {
        // Chỉ cần kiểm tra liệu trạng thái có phải là số (0 hoặc 1)
        $validated = $request->validate([
            'TrangThaiBL' => 'required|in:0,1', // Kiểm tra trạng thái có phải là 0 hoặc 1
        ]);

        // Tìm bình luận theo ID
        $binhLuan = QuanLyBinhLuan::findOrFail($id);

        // Cập nhật trạng thái bình luận
        $binhLuan->TrangThaiBL = 1; // Lúc này bạn chỉ cần đảm bảo là duyệt bình luận, nên luôn set thành 1
        $binhLuan->save(); // Lưu lại thay đổi

        // Trả về phản hồi
        return response()->json([
            'success' => true,
            'message' => 'Bình luận đã được duyệt thành công.',
            'binhLuan' => $binhLuan,
        ]);
    }

    public function xoaBinhLuan($id)
    {
        $binhLuan = QuanLyBinhLuan::findOrFail($id);
        $binhLuan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bình luận đã được xóa thành công'
        ]);
    }

}
