<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyKhuyenMai;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
class QuanLyKhuyenMaiController extends Controller
{
    public function getView()
    {
        $quanlykhuyenmaiModel = new QuanLyKhuyenMai();
        $list_khuyen_mai= $quanlykhuyenmaiModel->getkhuyenmai();
        $list_tai_khoan = $quanlykhuyenmaiModel->getTK();
        return view('super-admin.quan-ly-khuyen-mai.danh-sach-khuyen-mai', 
        compact('list_khuyen_mai','list_tai_khoan'));
    }

    function addKhuyenMai(Request $request)
    {
        $validate = $request->validate([
            'MaTK'=>'int',
            'TenKM'=>'string',
            'DieuKien'=>'string',
            'PhanTramGiam'=>'string',
            'GiaTriToiDa'=>'string',
            'SoLuongMa'=>'int',
            'NgayBD'=>'date',
            'NgayKT'=>'date',
        ]);

        // Tạo mới sinh viên với dữ liệu đã validate
        QuanLyKhuyenMai::create($validate);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteKM($id)
    {
        $km = QuanLyKhuyenMai::findOrFail($id);

        $km->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editKhuyenMai($id)
    {
        $khuyenmai = QuanLyKhuyenMai::findOrFail($id);
        return response()->json([
            'khuyenmai' => $khuyenmai
        ]);
    }

    public function updateKhuyenMai(Request $request, $id)
    {
        $validated = $request->validate([
            'MaTK'=>'int',
            'TenKM'=>'string',
            'DieuKien'=>'string',
            'PhanTramGiam'=>'string',
            'GiaTriToiDa'=>'string',
            'SoLuongMa'=>'int',
            'NgayBD'=>'date',
            'NgayKT'=>'date',
        ]);
        $khuyenmai = QuanLyKhuyenMai::findOrFail($id);
        $khuyenmai->update($validated);

        return response()->json([
            'success' => true,
            'khuyenmai' => $khuyenmai,
        ]);
    }
}