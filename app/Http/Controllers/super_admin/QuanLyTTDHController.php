<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyTTDHModel;
use App\Models\admin\QuanLyDonHangModel;
use App\Models\admin\TrangThaiModel;
use Illuminate\Http\Request;
class QuanLyTTDHController extends Controller
{
    public function getView()
    {
        $quanlyttdhModel = new QuanLyTTDHModel();
        $qltt= new TrangThaiModel();
        $list_trang_thai= $quanlyttdhModel->gettrangthai();
        $list_tt=$qltt->gettt();
        return view('super-admin.trang-thai-don-hang.danh-sach-trang-thai-don-hang', 
        compact('list_trang_thai', 'list_tt'));
    }

    function deleteTTDH($id)
    {
        $ttdh = QuanLyTTDHModel::findOrFail($id);

        $ttdh->delete();

         return response()->json([
             'success' => true,
             'message' => 'Xóa thành công'
         ]);
    }


    public function show()
    {
        // Kết hợp bảng trangthaidonhang và trangthai
        $list_trang_thai = QuanLyTTDHModel::join('trangthai', 'trangthaidonhang.TrangThai', '=', 'trangthai.MaTT')
            ->select('trangthaidonhang.MaDH', 'trangthaidonhang.TrangThai', 'trangthai.TenTT', 'trangthaidonhang.MaTTDH')
            ->get();

        // Danh sách trạng thái
        $list_tt = TrangThaiModel::all();

        return view('your_view', compact('list_trang_thai', 'list_tt'));
    }

    public function updateTTDH(Request $request, $id)
    {
        $ttdh = QuanLyTTDHModel::findOrFail($id);
        
        // Cập nhật cột TrangThai với giá trị MaTT từ select
        $ttdh->TrangThai = $request->input('TrangThai');
        $ttdh->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
    }
}