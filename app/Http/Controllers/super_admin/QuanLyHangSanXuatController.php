<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HangSanXuatModel;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
class QuanLyHangSanXuatController extends Controller
{
    public function getView()
    {
        $hang_sx = new HangSanXuatModel();
        $list_hang_sx = $hang_sx->getHangSX();
        return view('super-admin.quan-ly-hang-san-xuat.danh-sach-hang-san-xuat',
        compact('list_hang_sx'));
    }

    public function addHangSanXuat(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenHSX'=> 'string',
            'TrangThaiHSX' => 'string',
        ]);

        HangSanXuatModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteHangSanXuat($id)
    {
        $hangSX = HangSanXuatModel::findOrFail($id);

        $hangSX->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
    public function editHangSanXuat($id)
    {
        $hangsx = HangSanXuatModel::findOrFail($id);
        return response()->json([
            'hangsx' => $hangsx
        ]);
    }

    public function updateHangSanXuat(Request $request, $id)
    {
        $validated = $request->validate([
            'TenHSX' => 'string',
            'TrangThaiHSX' => 'string',
        ]);

        $hangsx = HangSanXuatModel::findOrFail($id);
        $hangsx->update($validated);

        return response()->json([
            'success' => true,
            'hangsx' => $hangsx
        ]);
    }
}
