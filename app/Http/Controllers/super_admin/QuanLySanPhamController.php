<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLySanPhamController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-san-pham.danh-sach-san-pham');
    }

}
