<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyVanChuyenModel;
use Illuminate\Http\Request;
class QuanLyVanChuyenController extends Controller
{
    public function getView()
    {
        $vanchuyen = new QuanLyVanChuyenModel();
        $list_vanchuyen = $vanchuyen -> getVanChuyen();
//        dd($list_vanchuyen->toArray());
        return view('super-admin.quan-ly-van-chuyen.danh-sach-van-chuyen'
            , compact('list_vanchuyen'));
    }

}
