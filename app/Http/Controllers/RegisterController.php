<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'Email' => 'required',
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
    }
}
