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
        // Validate the input fields
        $request->validate([
            'taikhoan' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the account
        $account = AuthModel::where('TenDangNhap', $request->taikhoan)->first();

        // Check if the account exists
        if (!$account) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản không tồn tại',
            ]);
        }

        // Check if the account is locked
        if ($account->TrangThai == 1) {
            return response()->json([
                'success' => false,
                'status' => 403,
                'message' => 'Tài khoản đã bị khóa.',
            ]);
        }

        // Track login attempts
        $loginAttempts = session()->get('login_attempts_' . $account->MaTK, 0);

        // Verify password
        if (!Hash::check($request->password, $account->MatKhau)) {
            $loginAttempts++;
            session(['login_attempts_' . $account->MaTK => $loginAttempts]);

            // Lock account if login attempts exceed 5
            if ($loginAttempts >= 5) {
                $account->TrangThai = 1; // Lock account
                $account->save(); // Save account status

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

        // Clear login attempts on successful login
        session()->forget('login_attempts_' . $account->MaTK);

        // Save MaTK and VaiTro to session
        session([
            'MaTK' => $account->MaTK,
            'VaiTro' => $account->VaiTro,
        ]);

        // Redirect to the specified route after successful login
        return response()->json([
            'success' => true,
            'status' => 200,
            'redirect' => route('home-page'),
        ]);
    }



    public function logoutAction(Request $request)
    {
        //Xoá session
        $request->session()->flush();

        //Chuyển hướng về Login
        return redirect()->route('home-page');
    }
}
