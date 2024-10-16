<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyVanChuyenController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-van-chuyen.danh-sach-van-chuyen');
    }

}