<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\DanhMucSanPhamModel;
use Illuminate\Http\Request;
class QuanLyDanhMucController extends Controller
{
    public function getView()
    {
        $danh_muc_sp = new DanhMucSanPhamModel();
        $list_danh_muc = $danh_muc_sp->danhmucSP();
        return view('super-admin.quan-ly-danh-muc.danh-sach-danh-muc',
        compact('list_danh_muc'));
    }

    public function addDanhMuc(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenDM'=> 'string',
            'TrangThaiDM' => 'string',
        ]);


        DanhMucSanPhamModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteDanhMuc($id)
    {
        $danhmuc = DanhMucSanPhamModel::findOrFail($id);

        $danhmuc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editDanhMuc($id)
    {
        $danhmuc = DanhMucSanPhamModel::findOrFail($id);
        return response()->json([
            'danhmuc' => $danhmuc
        ]);
    }

    public function updateDanhMuc(Request $request, $id)
    {
        $validated = $request->validate([
            'TenDM' => 'string',
            'TrangThaiDM' => 'string',
        ]);

        $danhmuc = DanhMucSanPhamModel::findOrFail($id);
        $danhmuc->update($validated);

        return response()->json([
            'success' => true,
            'danhmuc' => $danhmuc,
        ]);
    }
}
