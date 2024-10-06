<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getViewLogin()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        //Lấy lại tk và mk được gửi từ Form qua
        $request->validate([
            'taikhoan' => 'required|string',
            'password' => 'required|string',
        ]);

        //Gọi model
        $account = AuthModel::where('TenDangNhap', $request->taikhoan)->first();

        // Tài khoản không có
        if (!$account) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản không tồn tại',
            ]);
        }

        // Kiểm tra password
        if (!Hash::check($request->password, $account->MatKhau)) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Mật khẩu không đúng',
            ]);
        }

        // Lưu MaTK và VaiTro lên session để còn tái sử dụng
        session([
            'MaTK' => $account->MaTK,
            'VaiTro' => $account->VaiTro,
        ]);

        // Kiểm tra quyền người dùng và chuyển hướng
        if ($account->VaiTro == 0) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('khach-hang-home'),
            ]);
        } elseif ($account->VaiTro == 1) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('super-admin-home'),
            ]);
        } else {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('admin-home'),
            ]);
        }
    }

    public function logoutAction(Request $request)
    {
        //Xoá session
        $request->session()->flush();

        //Chuyển hướng về Login
        return redirect()->route('index.login');
    }
}
