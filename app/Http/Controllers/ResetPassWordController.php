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
        return view('reset-password'); 
    }

    // Gửi mã xác nhận
    public function GuiMaXacNhan(Request $request)
    {
        $request->validate(['Email' => 'required|string']);

        $user = ResetPassWordModel::where('Email', $request->Email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Email không tồn tại.'], 400);
        }

        // Tạo mã xác nhận ngẫu nhiên
        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        // $code = '123456';

        // Lưu mã xác nhận vào session
        session([
            'code' => $code,
            'time' => Carbon::now()->addMinutes(3)
        ]);

        // Gửi mã qua email
        Mail::send('email_view', ['code' => $code], function ($email) use ($request) {
            $email->subject('Mã xác nhận thay đổi mật khẩu')
                ->to($request->Email);
        });

        return response()->json(['success' => true, 'message' => 'Mã xác nhận đã được gửi.']);
    }


    // Cập nhật mật khẩu
    public function capNhatMatKhauMoi(Request $request)
{
    // Sử dụng Validator để kiểm tra chi tiết lỗi
    $validator = Validator::make($request->all(), [
        'Email' => 'required|email',
        'MatKhau' => [
            'required',
            'string',
            'min:8',                // ít nhất 8 ký tự
            'regex:/[a-z]/',        // ít nhất 1 chữ cái thường
            'regex:/[A-Z]/',        // ít nhất 1 chữ cái hoa
            'regex:/[0-9]/',        // ít nhất 1 số
            'regex:/[@$!%*?&]/',    // ít nhất 1 ký tự đặc biệt
        ],
        're_MatKhau' => 'required|same:MatKhau', // Xác thực trường re_MatKhau khớp với MatKhau
        'maxacnhan' => 'required|string|min:6',  // Xác thực trường maxacnhan (mã xác nhận)
    ]);

    // Kiểm tra nếu có lỗi xác thực
    if ($validator->fails()) {
        // Lấy thông báo lỗi cụ thể từ Validator
        $errors = $validator->errors();
        $errorMessages = [];

        // Thêm thông báo cụ thể cho từng trường hợp lỗi
        if ($errors->has('Email')) {
            $errorMessages[] = 'Email không hợp lệ hoặc chưa được nhập.';
        }
        if ($errors->has('MatKhau')) {
            $errorMessages[] = 'Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái thường, chữ cái hoa, số và ký tự đặc biệt.';
        }
        if ($errors->has('re_MatKhau')) {
            $errorMessages[] = 'Mật khẩu xác nhận không trùng khớp.';
        }
        if ($errors->has('maxacnhan')) {
            $errorMessages[] = 'Mã xác nhận không hợp lệ hoặc chưa được nhập.';
        }

        return response()->json([
            'success' => false,
            'status' => 400,
            'message' => $errorMessages,
        ]);
    }

    // Tìm người dùng dựa trên email
    $user = ResetPassWordModel::where('Email', $request->Email)->first();

    // Kiểm tra nếu người dùng không tồn tại
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Email không tồn tại.'], 400);
    }

    // Kiểm tra mã xác nhận và thời gian hết hạn
    if (
        session('code') !== $request->maxacnhan ||  // Kiểm tra mã xác nhận từ session
        session('time') < Carbon::now()             // Kiểm tra nếu mã đã hết hạn
    ) {
        return response()->json(['success' => false, 'message' => 'Mã xác nhận không đúng hoặc đã hết hạn.'], 400);
    }

    // Cập nhật mật khẩu mới cho người dùng
    $user->update(['MatKhau' => Hash::make($request->MatKhau)]); // Mã hóa mật khẩu trước khi lưu

    // Xóa mã xác nhận khỏi session sau khi hoàn tất
    session()->forget(['code', 'time']);

    return response()->json(['success' => true, 'message' => 'Mật khẩu đã được cập nhật.']);
}

}
