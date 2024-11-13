<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\khach_hang\ChiTietSanPhamModel;
use Illuminate\Http\Request;

class QuanLyCTSPController extends Controller
{
    public function getView()
    {
        $ctsp_model=new ChiTietSanPhamModel();
        $list_ctsp=$ctsp_model->getctsp();
        $list_sp=$ctsp_model->getsp();
        return view('super-admin.quan-ly-chi-tiet-san-pham.danh-sach-chi-tiet-san-pham',
            compact('list_ctsp', 'list_sp'));
    }

    function addCTSP(Request $request)
    {
        $validate = $request->validate([
            'MaSP'=>'int',
            'ThongTinKyThuat'=>'string',
            'NhaCungCap'=>'string',
            'XuatXu'=>'string',
            'MoTaSP'=>'string',
        ]);

        // Tạo mới sinh viên với dữ liệu đã validate
        ChiTietSanPhamModel::create($validate);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteCTSP($id)
    {
        $km = ChiTietSanPhamModel::findOrFail($id);

        $km->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editCTSP($id)
    {
        $ctsp = ChiTietSanPhamModel::findOrFail($id);
        return response()->json([
            'ctsp' => $ctsp
        ]);
    }

    public function updateCTSP(Request $request, $id)
    {
        $validated = $request->validate([
            'MaSP'=>'int',
            'ThongTinKyThuat'=>'string',
            'NhaCungCap'=>'string',
            'XuatXu'=>'string',
            'MoTaSP'=>'string',
        ]);
        $ctsp = ChiTietSanPhamModel::findOrFail($id);
        $ctsp->update($validated);

        return response()->json([
            'success' => true,
            'ctsp' => $ctsp,
        ]);
    }

}
