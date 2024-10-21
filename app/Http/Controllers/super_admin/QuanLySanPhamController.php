<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\SanPhamModel;
use Illuminate\Http\Request;
class QuanLySanPhamController extends Controller
{
    public function getView()
    {
        $San_Pham = new SanPhamModel();
        $list_sp = $San_Pham->getSanPham();
        $list_danh_muc = $San_Pham->getdanhmuc();
        $list_hang_sx = $San_Pham->gethangsx();
        return view('super-admin.quan-ly-san-pham.danh-sach-san-pham',
        compact('list_sp','list_danh_muc','list_hang_sx'));
    }

    public function addSanPham(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenSP'=> 'string',
            'AnhSP' => 'string',
            'GiaBan' => 'string',
            'SoLuongTonKho' => 'string',
            'NgayTaoSP' => 'date',
            'TrangThaiSP' => 'string',
            'MoTaChiTiet' => 'string',
            'ThoiGianBaoHanh' => 'string',
            'MaDM' => 'int',
            'MaHSX' => 'int',
        ]);


        SanPhamModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteSP($id)
    {
        $sp = SanPhamModel::findOrFail($id);

        $sp->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editSanPham($id)
    {
        $sanpham = SanPhamModel::findOrFail($id);
        return response()->json([
            'sanpham' => $sanpham
        ]);
    }

    public function updateSanPham(Request $request, $id)
    {
        $validated = $request->validate([
            'TenSP'=> 'string',
            'AnhSP' => 'string',
            'GiaBan' => 'string',
            'SoLuongTonKho' => 'string',
            'NgayTaoSP' => 'date',
            'TrangThaiSP' => 'string',
            'MoTaChiTiet' => 'string',
            'ThoiGianBaoHanh' => 'string',
            'MaDM' => 'int',
            'MaHSX' => 'int',
        ]);
        $sanpham = SanPhamModel::findOrFail($id);
        $sanpham->update($validated);

        return response()->json([
            'success' => true,
            'sanpham' => $sanpham,
        ]);
    }
}
