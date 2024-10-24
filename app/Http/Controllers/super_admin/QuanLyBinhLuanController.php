<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyBinhLuan;
use Illuminate\Http\Request;
class QuanLyBinhLuanController extends Controller
{
    public function getView()
    {
        $quanlybinhluanModel = new QuanLyBinhLuan();
        $list_binh_luan= $quanlybinhluanModel->getbinhluan();
        $list_traloi= $quanlybinhluanModel->gettlbinhluan();
        return view('super-admin.quan-ly-binh-luan.danh-sach-binh-luan', 
        compact('list_binh_luan', 'list_traloi'));
    }

    function deleteBL($id)
    {
        $binhluan = QuanLyBinhLuan::findOrFail($id);

        $binhluan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
} 