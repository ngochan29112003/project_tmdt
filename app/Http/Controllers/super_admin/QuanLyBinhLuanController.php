<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyBinhLuanController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-binh-luan.danh-sach-binh-luan');
    }

}