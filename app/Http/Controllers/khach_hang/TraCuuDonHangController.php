<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TraCuuDonHangController extends Controller
{
    public function getViewTraCuuDonHang()
    {
        return view('khach-hang.tra-cuu-don-hang');
    }
}
