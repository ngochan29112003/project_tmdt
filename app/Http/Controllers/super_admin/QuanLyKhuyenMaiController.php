<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyKhuyenMai;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class QuanLyKhuyenMaiController extends Controller
{
    public function getView()
    {
        try {
            $quanlykhuyenmaiModel = new QuanLyKhuyenMai();
            $list_khuyen_mai = $quanlykhuyenmaiModel->getkhuyenmai();
            $list_tai_khoan = $quanlykhuyenmaiModel->getTK();
            return view('super-admin.quan-ly-khuyen-mai.danh-sach-khuyen-mai', 
            compact('list_khuyen_mai', 'list_tai_khoan'));
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi tải dữ liệu: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addKhuyenMai(Request $request)
    {
        try {
            $validate = $request->validate([
                'MaTK' => 'int',
                'TenKM' => 'string',
                'DieuKien' => 'string',
                'PhanTramGiam' => 'string',
                'GiaTriToiDa' => 'string',
                'SoLuongMa' => 'int',
                'NgayBD' => 'date',
                'NgayKT' => 'date|after:NgayBD',
            ]);

            QuanLyKhuyenMai::create($validate);

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Thêm thành công!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi thêm khuyến mãi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteKM($id)
    {
        try {
            $km = QuanLyKhuyenMai::findOrFail($id);
            $km->delete();

            return response()->json([
                'success' => true,
                'message' => 'Xóa thành công'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi xóa khuyến mãi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function editKhuyenMai($id)
    {
        try {
            $khuyenmai = QuanLyKhuyenMai::findOrFail($id);
            return response()->json([
                'success' => true,
                'khuyenmai' => $khuyenmai
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi lấy dữ liệu khuyến mãi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateKhuyenMai(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'MaTK' => 'int',
                'TenKM' => 'string',
                'DieuKien' => 'string',
                'PhanTramGiam' => 'string',
                'GiaTriToiDa' => 'string',
                'SoLuongMa' => 'int',
                'NgayBD' => 'date',
                'NgayKT' => 'date|after:NgayBD',
            ]);

            $khuyenmai = QuanLyKhuyenMai::findOrFail($id);
            $khuyenmai->update($validated);

            return response()->json([
                'success' => true,
                'khuyenmai' => $khuyenmai,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi khi cập nhật khuyến mãi: ' . $e->getMessage()
            ], 500);
        }
    }
}
