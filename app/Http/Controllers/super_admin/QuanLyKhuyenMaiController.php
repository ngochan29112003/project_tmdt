<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyKhuyenMaiController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-khuyen-mai.danh-sach-khuyen-mai');
    }

}