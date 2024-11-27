<?php

namespace App\Http\Controllers\admin;

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
        return view('admin.quan-ly-khuyen-mai.danh-sach-khuyen-mai',
        compact('list_khuyen_mai','list_tai_khoan'));
    }

    public function addKhuyenMai(Request $request)
    {
        // Validate request data
        $validate = $request->validate([
            'MaTK' => 'required|string',
            'TenKM' => 'required|string',
            'DieuKien' => 'required|string',
            'PhanTramGiam' => 'required|string',
            'GiaTriToiDa' => 'required|string',
            'SoLuongMa' => 'required|integer',
            'NgayBD' => 'required|date',
            'NgayKT' => 'required|date',
        ]);

        // If "Tất cả" is selected, create promotion for all accounts
        if ($request->MaTK === 'all') {
            $taiKhoanIds = DB::table('taikhoan')->pluck('MaTK');

            foreach ($taiKhoanIds as $MaTK) {
                // Create promotion for each account
                QuanLyKhuyenMai::create([
                    'MaTK' => $MaTK,
                    'TenKM' => $validate['TenKM'],
                    'DieuKien' => $validate['DieuKien'],
                    'PhanTramGiam' => $validate['PhanTramGiam'],
                    'GiaTriToiDa' => $validate['GiaTriToiDa'],
                    'SoLuongMa' => $validate['SoLuongMa'],
                    'NgayBD' => $validate['NgayBD'],
                    'NgayKT' => $validate['NgayKT'],
                ]);
            }
        } else {
            // Otherwise, create the promotion for the selected account
            QuanLyKhuyenMai::create($validate);
        }

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
