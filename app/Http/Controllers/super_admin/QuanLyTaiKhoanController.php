<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
class QuanLyTaiKhoanController extends Controller
{
    public function getView()
    {
        $dataTaiKhoan = QuanLyTaiKhoan::all();

        // Pass data to the view
        return view('super-admin.quan-ly-tai-khoan.danh-sach-tai-khoan', compact('dataTaiKhoan'));
    }

    public function unlockAccount(Request $request)
    {
        // Find the account by ID
        $taiKhoan = QuanLyTaiKhoan::find($request->id);

        if ($taiKhoan) {
            // Update the 'TrangThai' to 0 (active)
            $taiKhoan->TrangThai = 0;
            $taiKhoan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
