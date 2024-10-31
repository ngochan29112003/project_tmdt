<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getViewRegister()
    {
        return view('register');
    }

    public function addAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'HoTen' => 'required|string|regex:/^[\p{L} ]+$/u|max:255', // chỉ cho phép chữ cái và khoảng trắng
            'TenDangNhap' => 'required|string|regex:/^[a-zA-Z0-9]+$/', // chỉ cho phép chữ cái và số, không có dấu và khoảng trắng
            'Email' => 'required|string',
            'SDT' => 'required|string|regex:/^\d{10}$/', // bắt buộc, đủ 10 chữ số
            'MatKhau' => [
                'required',
                'string',
                'min:8', // ít nhất 8 ký tự
                'regex:/[a-z]/',      // ít nhất 1 chữ cái thường
                'regex:/[A-Z]/',      // ít nhất 1 chữ cái hoa
                'regex:/[0-9]/',      // ít nhất 1 số
                'regex:/[@$!%*?&]/',  // ít nhất 1 ký tự đặc biệt
            ],
            'repwd' => 'required|string|same:MatKhau',
        ]);

        // Kiểm tra mật khẩu không trùng khớp trước tiên
        if ($request->MatKhau !== $request->repwd) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Mật khẩu không trùng khớp'
            ]);
        }

        // Kiểm tra các yêu cầu khác của mật khẩu
        if ($validator->fails()) {
            // Lấy thông báo lỗi cụ thể
            $errors = $validator->errors();
            $errorMessages = [];

            // Kiểm tra từng trường hợp
            if ($errors->has('HoTen')) {
                $errorMessages[] = 'Họ tên: Chỉ cho phép chữ cái và khoảng trắng.';
            }else
            if ($errors->has('TenDangNhap')) {
                $errorMessages[] = 'Tên đăng nhập: Chỉ cho phép chữ cái và số, không có dấu và khoảng trắng.';
            }else
            if ($errors->has('SDT')) {
                $errorMessages[] = 'Bắt buộc, số điện thoại đủ 10 chữ số.';
            }else
            if ($errors->has('MatKhau')) {
                $errorMessages[] = 'Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái thường, chữ cái hoa, số và ký tự đặc biệt.';
            }else
            if ($errors->has('repwd')) {
                $errorMessages[] = 'Mật khẩu không trùng khớp.';
            }

            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => $errorMessages,
            ]);
        }

        // Kiểm tra tài khoản đã có trong hệ thống chưa
        $existingAccount = AuthModel::where('TenDangNhap', $request->TenDangNhap)->first();
        if ($existingAccount) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Tài khoản đã tồn tại, vui lòng chọn tài khoản khác',
            ], 400);
        }

        // Băm password
        $hashedPassword = Hash::make($request->MatKhau);

        // Lưu thông tin vào database
        $newAccount = new AuthModel();
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
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Có lỗi xảy ra khi lưu tài khoản',
            ], 500);
        }
    }

}
