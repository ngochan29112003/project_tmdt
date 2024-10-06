<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyTaiKhoanController extends Controller
{
    public function getViewDSQuanLy()
    {
        return view('admin.ql_tk.ds-tk-quan-ly');
    }

    public function getViewDSKhachHang()
    {
        return view('admin.ql_tk.ds-tk-khach-hang');
    }
}
