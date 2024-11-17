<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyVanChuyenModel;
use Illuminate\Http\Request;
class QuanLyVanChuyenController extends Controller
{
    public function getView()
    {
        $dcvc = new QuanLyVanChuyenModel();
        $list_dvvc = $dcvc -> getDonViVanChuyen();
//        dd($list_vanchuyen->toArray());
        return view('super-admin.quan-ly-van-chuyen.danh-sach-van-chuyen'
            , compact('list_dvvc'));
    }

    public function addVanChuyen(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenDonViVC'=> 'string',
            'TienVC'=> 'string',
            'TrangThaiVC' => 'string',
        ]);


        QuanLyVanChuyenModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteVanChuyen($id)
    {
        $vanchuyen = QuanLyVanChuyenModel::findOrFail($id);

        $vanchuyen->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editVanChuyen($id)
    {
        $vanchuyen = QuanLyVanChuyenModel::findOrFail($id);
        return response()->json([
            'vanchuyen' => $vanchuyen
        ]);
    }

    public function updateVanChuyen(Request $request, $id)
    {
        $validated = $request->validate([
            'TenDonViVC'=> 'string',
            'TienVC'=> 'string',
            'TrangThaiVC' => 'string',
        ]);
        // dd($validated);

        $vanchuyen = QuanLyVanChuyenModel::findOrFail($id);
        $vanchuyen->update($validated);

        return response()->json([
            'success' => true,
            'vanchuyen' => $vanchuyen,
        ]);
    }


}
