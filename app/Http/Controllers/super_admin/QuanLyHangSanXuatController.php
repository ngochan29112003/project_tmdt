<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
class QuanLyHangSanXuatController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-hang-san-xuat.danh-sach-hang-san-xuat');
    }
}
