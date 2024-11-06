<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use App\Models\ResetPassWordModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class ResetPassWordController extends Controller
{
    public function getViewResetPassWord()
    {
        return view('reset-password'); // return view reset-password.blade.php
    }

    // Gửi mã xác nhận
    public function sendVerificationCode(Request $request)
    {
        $request->validate(['Email' => 'required|email']);
        $user = ResetPassWordModel::where('email', $request->Email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Email không tồn tại.'], 400);
        }

        // Tạo mã xác nhận ngẫu nhiên 6 chữ số
        $verificationCode = rand(100000, 999999);

        // Lưu mã vào session với thời gian hết hạn 3 phút
        session([
            'verification_code' => $verificationCode,
            'verification_code_expires_at' => Carbon::now()->addMinutes(3)
        ]);

        // Gửi mã xác nhận qua email
        Mail::to($user->email)->send(new \App\Mail\VerificationCodeMail($verificationCode));

        return response()->json(['success' => true, 'message' => 'Mã xác nhận đã được gửi.']);
    }

    // Cập nhật mật khẩu
    public function updatePassword(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'maxacnhan' => 'required',
            'MatKhau' => 'required|min:8|confirmed',
        ]);

        $user = ResetPassWordModel::where('email', $request->Email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Email không tồn tại.'], 400);
        }

        // Kiểm tra mã xác nhận và thời gian hết hạn
        if (
            session('verification_code') !== $request->maxacnhan ||
            session('verification_code_expires_at') < Carbon::now()
        ) {
            return response()->json(['success' => false, 'message' => 'Mã xác nhận không đúng hoặc đã hết hạn.'], 400);
        }

        // Cập nhật mật khẩu và xóa mã xác nhận khỏi session
        $user->MatKhau = Hash::make($request->MatKhau);
        $user->save();

        // Xóa mã xác nhận khỏi session
        session()->forget(['verification_code', 'verification_code_expires_at']);

        return response()->json(['success' => true, 'message' => 'Mật khẩu đã được cập nhật.']);
    }
}
