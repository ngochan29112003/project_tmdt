<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatHangController extends Controller
{
    public function getDonHang()
    {
        $MaTK = session('MaTK');
        $chitiet = DB::table('donhang')
            ->join('chitietdonhang', 'donhang.MaDH', '=', 'chitietdonhang.MaDH')
            ->join('sanpham', 'sanpham.MaSP', '=', 'chitietdonhang.MaSP')
            ->where('donhang.MaTK', $MaTK)
            ->get();

//        dd($chitiet);
        return view('khach-hang.dat-hang',compact('chitiet'));
    }
}