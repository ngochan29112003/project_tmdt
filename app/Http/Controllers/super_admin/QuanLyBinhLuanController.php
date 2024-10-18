<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyBinhLuan;
use Illuminate\Http\Request;
class QuanLyBinhLuanController extends Controller
{
    public function getView()
    {
        $quanlybinhluanModel = new QuanLyBinhLuan();
        $list_binh_luan= $quanlybinhluanModel->getbinhluan();
        return view('super-admin.quan-ly-binh-luan.danh-sach-binh-luan', 
        compact('list_binh_luan'));
    }

}