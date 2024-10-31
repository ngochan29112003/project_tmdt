<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiTietSanPhamController extends Controller
{
    public function getChiTietDonHang()
    {


        return view('khach-hang.chi-tiet-san-pham');
    }
}
