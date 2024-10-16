<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class PhuongThucThanhToanController extends Controller
{
    public function getView()
    {
        return view('super-admin.phuong-thuc-thanh-toan.danh-sach-phuong-thuc-thanh-toan');
    }

}