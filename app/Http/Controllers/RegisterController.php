<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getViewRegister()
    {
        return view('register');
    }

    public function addAccount(Request $request)
    {
//        dd($request->toArray());
        $request->validate([
            'HoTen' => 'required|string|max:255',
            'TenDangNhap' => 'required|string',
            'Email' => 'required|string',
            'SDT' => 'string',
            'MatKhau' => 'required|string',
            'repwd' => 'required|string',
        ]);

        if($request->MatKhau != $request->repwd){
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Mật khẩu không trùng khớp',
            ]);
        }

        // Kiểm tra tài khoản đã có trong hệ thống chưa nếu có rồi thì không tạo nữa
        $existingAccount = AuthModel::where('TenDangNhap', $request->TenDangNhap)->first();
        if ($existingAccount) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác',
            ]);
        }

        // Băm password
        $hashedPassword = Hash::make($request->MatKhau);

        // Lưu thông tin vào database
        $newAccount = new AuthModel(); //Tạo đối tượng để lưu vào database
        $newAccount->HoTen = $request->HoTen;
        $newAccount->TenDangNhap = $request->TenDangNhap;
        $newAccount->Email = $request->Email;
        $newAccount->SDT = $request->SDT;
        $newAccount->MatKhau = $hashedPassword;
        $newAccount->VaiTro = 3;
        $newAccount->TrangThai = 0;

        if ($newAccount->save()) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Tài khoản đăng ký thành công',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Có lỗi xảy ra khi lưu tài khoản',
            ]);
        }

    }
}
