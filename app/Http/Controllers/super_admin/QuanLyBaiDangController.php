<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyBaiDangModel;
use Illuminate\Http\Request;
class QuanLyBaiDangController extends Controller
{
    public function getView()
    {
        $baidang = new QuanLyBaiDangModel();
        $list_baidang = $baidang -> getBaiDang();
        $list_taikhoan = $baidang -> getTaiKhoan();
        $list_sanpham = $baidang -> getSanPham();
        return view('super-admin.quan-ly-bai-dang.danh-sach-bai-dang'
            , compact('list_baidang','list_taikhoan','list_sanpham'));
    }

    function addBaiDang(Request $request)
    {
//        dd($request);
        $validate = $request->validate([
            'MaTK' => 'int',
            'MaSP' => 'int',
            'TenBD' => 'string',
            'AnhBD' => 'string',
            'NoiDungBD' => 'string',
            'NgayTaoBD' => 'date',
            'TrangThaiBD' => 'string',
        ]);


        QuanLyBaiDangModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteBaiDang($id)
    {
        $bd = QuanLyBaiDangModel::findOrFail($id);

        $bd->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editBaiDang($id)
    {
        $baidang = QuanLyBaiDangModel::findOrFail($id);
        return response()->json([
            'baidang' => $baidang
        ]);
    }

    public function updateBaiDang(Request $request, $id)
    {
        $validated = $request->validate([
            'MaTK' => 'int',
            'MaSP' => 'int',
            'TenBD' => 'string',
            'AnhBD' => 'string',
            'NoiDungBD' => 'string',
            'NgayTaoBD' => 'date',
            'TrangThaiBD' => 'string',
        ]);
        $baidang = QuanLyBaiDangModel::findOrFail($id);
        $baidang->update($validated);

        return response()->json([
            'success' => true,
            'baidang' => $baidang,
        ]);
    }


}
