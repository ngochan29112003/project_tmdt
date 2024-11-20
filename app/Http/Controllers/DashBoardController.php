<?php

namespace App\Http\Controllers;

use App\Models\admin\SanPhamModel;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function getViewDashBoardSuperAdmin()
    {

        return view('super-admin.thong-ke.danh-sach-thong-ke');
    }

    public function getViewDashBoardUser()
    {

        
        return view('khach-hang.home-page', compact('pcBanChay','pcMoi','pcKM'));
    }
}
