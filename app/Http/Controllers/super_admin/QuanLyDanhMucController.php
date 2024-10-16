<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyDanhMucController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-danh-muc.danh-sach-danh-muc');
    }

}
