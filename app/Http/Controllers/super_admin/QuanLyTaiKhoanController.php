<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
class QuanLyTaiKhoanController extends Controller
{
    public function getView()
    {
        $dataTaiKhoan = QuanLyTaiKhoan::with('vaitro')->get(); // Lấy tất cả tài khoản
        return view('super-admin.quan-ly-tai-khoan.danh-sach-tai-khoan', compact('dataTaiKhoan'));
    }

    public function getViewTaiKhoanAd()
    {
        $model = new QuanLyTaiKhoan();
        $dataTaiKhoan = $model->getAdmin();
        return view ('super-admin.quan-ly-tai-khoan.tai-khoan-admin',compact('dataTaiKhoan'));
    }

    public function getViewTaiKhoanKhach()
    {
        $model = new QuanLyTaiKhoan();
        $dataTaiKhoan = $model->getKhachHang();
        return view ('super-admin.quan-ly-tai-khoan.tai-khoan-khach-hang',compact('dataTaiKhoan'));
    }

    public function filterAccounts(Request $request)
    {
        $role = $request->get('role');

        if ($role) {
            // Lọc theo VaiTro nếu có giá trị
            $dataTaiKhoan = QuanLyTaiKhoan::with('vaitro')->where('VaiTro', $role)->get();
        } else {
            // Hiển thị tất cả nếu không chọn VaiTro
            $dataTaiKhoan = QuanLyTaiKhoan::with('vaitro')->get();
        }

        return response()->json(['data' => $dataTaiKhoan]);
    }


    public function unlockAccount(Request $request)
    {
        // Find the account by ID
        $taiKhoan = QuanLyTaiKhoan::find($request->id);

        if ($taiKhoan) {
            $taiKhoan->TrangThai = 0;
            $taiKhoan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function lockAccount(Request $request)
    {
        // Find the account by ID
        $taiKhoan = QuanLyTaiKhoan::find($request->id);

        if ($taiKhoan) {
            $taiKhoan->TrangThai = 1;
            $taiKhoan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
