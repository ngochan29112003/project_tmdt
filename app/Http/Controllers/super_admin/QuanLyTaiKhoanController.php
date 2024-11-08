<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
//        dd($dataTaiKhoan);
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

    public function addTaiKhoanAd(Request $request)
    {
        $validate = $request->validate([
            'VaiTro' =>  'int',
            'TrangThai' =>  'int',
            'HoTen' =>  'string',
            'TenDangNhap' =>  'string',
            'MatKhau' =>  'string',
            'Email' =>  'string',
            'NgaySinh' =>  'date',
            'GioiTinh' =>  'string',
            'SDT' =>  'string',
            'DiaChi' =>  'string',
        ]);

        // Kiểm tra tài khoản đã có trong hệ thống chưa
        $existingAccount = AuthModel::where('TenDangNhap', $request->TenDangNhap)->first();
        if ($existingAccount) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác',
            ], 400);
        }

        // Kiểm tra email đã có trong hệ thống chưa
        $existingEmail = AuthModel::where('Email', $request->Email)->first();
        if ($existingEmail) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Email đã tồn tại, vui lòng chọn email khác',
            ], 400);
        }

        // Băm password
        $hashedPassword = Hash::make($request->MatKhau);

        // Lưu thông tin vào database
        $newAccount = new AuthModel();
        $newAccount->VaiTro = $request->VaiTro;
        $newAccount->TrangThai = $request->TrangThai;
        $newAccount->HoTen = $request->HoTen;
        $newAccount->TenDangNhap = $request->TenDangNhap;
        $newAccount->MatKhau = $hashedPassword;
        $newAccount->Email = $request->Email;
        $newAccount->NgaySinh = $request->NgaySinh;
        $newAccount->GioiTinh = $request->GioiTinh;
        $newAccount->SDT = $request->SDT;
        $newAccount->DiaChi = $request->DiaChi;

        if ($newAccount->save()) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Tạo tài khoản thành công',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Có lỗi xảy ra khi lưu tài khoản',
            ], 500);
        }
    }

    public function editTaiKhoanAd($id)
    {
        $tk = AuthModel::findOrFail($id);
        return response()->json([
            'tk' => $tk
        ]);
    }

    public function updateTaiKhoanAd(Request $request, $id)
    {
        $validated = $request->validate([
            'VaiTro' =>  'int',
            'TrangThai' =>  'int',
            'HoTen' =>  'string',
            'TenDangNhap' =>  'string',
            'MatKhau' =>  'string|nullable',
            'Email' =>  'string',
            'NgaySinh' =>  'date',
            'GioiTinh' =>  'string',
            'SDT' =>  'string',
            'DiaChi' =>  'string',
        ]);

        $tk = AuthModel::findOrFail($id);

        $validated['MatKhau'] = Hash::make($validated['MatKhau']);

        $tk->update($validated);

        return response()->json([
            'success' => true,
        ]);
    }

    function deleteTaiKhoanAd($id)
    {
        $tk = AuthModel::findOrFail($id);

        $tk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

}
