<?php

namespace App\Http\Controllers;

use App\Models\admin\SanPhamModel;

class DashBoardController extends Controller
{
    public function getViewDashBoardSuperAdmin()
    {
        return view('super-admin.master');
    }

    public function getViewDashBoardUser()
    {
        $model = new SanPhamModel();
        $pcBanChay = $model->getPCBanChay();
        $pcMoi = $model->getPCMoi();
        $pcKM = $model->getPCKm();
        return view('khach-hang.home-page', compact('pcBanChay','pcMoi','pcKM'));
    }
}
