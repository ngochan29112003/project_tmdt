<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyKhuyenMai;
use Illuminate\Http\Request;
class QuanLyKhuyenMaiController extends Controller
{
    public function getView()
    {
        $quanlykhuyenmaiModel = new QuanLyKhuyenMai();
        $list_khuyen_mai= $quanlykhuyenmaiModel->getkhuyenmai();
        return view('super-admin.quan-ly-khuyen-mai.danh-sach-khuyen-mai', 
        compact('list_khuyen_mai'));
    }

}