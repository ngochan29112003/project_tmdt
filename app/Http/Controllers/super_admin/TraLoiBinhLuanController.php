<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\TraLoiBinhLuan;
use Illuminate\Http\Request;
class TraLoiBinhLuanController extends Controller
{
    public function getView()
    {
        $traloibl = new TraLoiBinhLuan();
        $list_traloi = $traloibl -> gettraloi();
        $list_binhluan= $traloibl -> getBL();
        return view('super-admin.quan-ly-tra-loi-bl.danh-sach-tra-loi-bl'
            , compact('list_traloi', 'list_binhluan'));
    }

    function addTraLoi(Request $request)
    {
        $validate = $request->validate([
            'MaBL'=>'int',
            'NoiDungTL'=>'string',
            'NgayTL'=>'date',
        ]);

        // Tạo mới sinh viên với dữ liệu đã validate
        TraLoiBinhLuan::create($validate);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteTL($id)
    {
        $tl = TraLoiBinhLuan::findOrFail($id);

        $tl->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editTraLoi($id)
    {
        $traloi = TraLoiBinhLuan::findOrFail($id);
        return response()->json([
            'traloi' => $traloi
        ]);
    }

    public function updateTraLoi(Request $request, $id)
    {
        $validated = $request->validate([
            'MaBL'=>'int',
            'NoiDungTL'=>'string',
            'NgayTL'=>'date',
        ]);
        $traloi = TraLoiBinhLuan::findOrFail($id);
        $traloi->update($validated);

        return response()->json([
            'success' => true,
            'traloi' => $traloi,
        ]);
    }
}