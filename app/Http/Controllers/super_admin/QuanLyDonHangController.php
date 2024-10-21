<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyDonHangModel;
use Illuminate\Http\Request;
class QuanLyDonHangController extends Controller
{
    public function getView()
    {
        $donhang = new QuanLyDonHangModel();
        $list_donhang = $donhang -> getDonHang();
//        dd($list_donhang->toArray());
        return view('super-admin.quan-ly-don-hang.danh-sach-don-hang'
        , compact('list_donhang'));
    }


}
