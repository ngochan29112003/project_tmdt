<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongTinTaiKhoanController extends Controller
{
    public function getViewTaiKhoan()
    {
        $MaTK = session('MaTK');
        $taikhoan = DB::table('taikhoan')->get();

//        dd($chitiet);
        return view('khach-hang.thong-tin-tai-khoan',compact('taikhoan'));
    }

    public function editTaiKhoan()
    {
        $MaTK = session('MaTK'); // lấy MaTK từ session
        
        // Lấy thông tin tài khoản với MaTK tương ứng
        $taikhoan = DB::table('taikhoan')->where('MaTK', $MaTK)->first();
        
        return response()->json(['taikhoan' => $taikhoan]);
    }
}