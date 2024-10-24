<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function getDsGioHang()
    {
        return view('khach-hang.gio-hang');
    }
}
