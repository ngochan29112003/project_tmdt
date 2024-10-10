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
        // Lấy lại tk và mk được gửi từ Form qua
        $request->validate([
            'taikhoan' => 'required|string',
            'password' => 'required|string',
        ]);

        // Gọi model
        $account = AuthModel::where('TenDangNhap', $request->taikhoan)->first();

        // Tài khoản không tồn tại
        if (!$account) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản không tồn tại',
            ]);
        }

        // Kiểm tra nếu tài khoản bị khóa
        if ($account->TrangThai == 1) {
            return response()->json([
                'success' => false,
                'status' => 403,
                'message' => 'Tài khoản đã bị khóa.',
            ]);
        }

        // Khởi tạo hoặc cập nhật số lần đăng nhập sai trong session
        $loginAttempts = session()->get('login_attempts_' . $account->MaTK, 0);

        // Kiểm tra password
        if (!Hash::check($request->password, $account->MatKhau)) {
            $loginAttempts++;
            session(['login_attempts_' . $account->MaTK => $loginAttempts]);

            // Nếu đăng nhập sai quá 5 lần thì khóa tài khoản
            if ($loginAttempts >= 5) {
                $account->TrangThai = 1; // Khóa tài khoản
                $account->save(); // Lưu thay đổi trạng thái tài khoản

                return response()->json([
                    'success' => false,
                    'status' => 403,
                    'message' => 'Tài khoản đã bị khóa do đăng nhập quá nhiều lần.',
                ]);
            }

            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Mật khẩu không đúng. Số lần đăng nhập sai: ' . $loginAttempts,
            ]);
        }

        // Xoá số lần đăng nhập sai sau khi đăng nhập thành công
        session()->forget('login_attempts_' . $account->MaTK);

        // Lưu MaTK và VaiTro lên session để còn tái sử dụng
        session([
            'MaTK' => $account->MaTK,
            'VaiTro' => $account->VaiTro,]);

        // Kiểm tra quyền người dùng và chuyển hướng
        if ($account->VaiTro == 1) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('super-admin-home'),
            ]);
        } elseif ($account->VaiTro == 2) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'redirect' => route('admin-home'),
            ]);
        } elseif($account->VaiTro == 3) {
            return response()->json([
                'success'  => true,
                'status'   => 200,
                'redirect' => route('khach-hang-home'),
            ]);
        } else {
            return response()->json([
                'success'  => false,
                'status'   => 400,
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
