<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyDonHangController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-don-hang.danh-sach-don-hang');
    }

}
