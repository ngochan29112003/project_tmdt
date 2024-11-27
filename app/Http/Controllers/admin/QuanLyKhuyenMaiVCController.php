<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyKhuyenMaiVC;
use Illuminate\Http\Request;

class QuanLyKhuyenMaiVCController extends Controller
{
    public function getView()
    {
        $quanlykhuyenmaiModel = new QuanLyKhuyenMaiVC();
        $list_khuyen_mai= $quanlykhuyenmaiModel->getkhuyenmaivc();
        $list_tai_khoan = $quanlykhuyenmaiModel->getTK();
        return view('admin.quan-ly-khuyen-mai-vc.danh-sach-khuyen-mai-vc',
            compact('list_khuyen_mai','list_tai_khoan'));
    }

    public function addKhuyenMaiVC(Request $request)
    {
        // Validate request data
        $validate = $request->validate([
            'MaTK' => 'required|string',
            'TenKMVC' => 'required|string',
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
                QuanLyKhuyenMaiVC::create([
                    'MaTK' => $MaTK,
                    'TenKMVC' => $validate['TenKMVC'],
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
            QuanLyKhuyenMaiVC::create($validate);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteKMVC($id)
    {
        $km = QuanLyKhuyenMaiVC::findOrFail($id);

        $km->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editKhuyenMaiVC($id)
    {
        $khuyenmai = QuanLyKhuyenMaiVC::findOrFail($id);
        return response()->json([
            'khuyenmai' => $khuyenmai
        ]);
    }

    public function updateKhuyenMaiVC(Request $request, $id)
    {
        $validated = $request->validate([
            'MaTK'=>'int',
            'TenKMVC'=>'string',
            'DieuKien'=>'string',
            'PhanTramGiam'=>'string',
            'GiaTriToiDa'=>'string',
            'SoLuongMa'=>'int',
            'NgayBD'=>'date',
            'NgayKT'=>'date',
        ]);
        $khuyenmai = QuanLyKhuyenMaiVC::findOrFail($id);
        $khuyenmai->update($validated);

        return response()->json([
            'success' => true,
            'khuyenmai' => $khuyenmai,
        ]);
    }
}
