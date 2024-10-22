<?php

namespace App\Http\Controllers;

class DashBoardController extends Controller
{
    public function getViewDashBoardSuperAdmin()
    {
        return view('super-admin.master');
    }

    public function getViewDashBoardUser()
    {
        return view('khach-hang.home-page');
    }
}
