<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiTietSanPhamController extends Controller
{
    public function getChiTietDonHang()
    {
<<<<<<< Updated upstream


        return view('khach-hang.chi-tiet-san-pham');
=======
        $model_BL = new BinhLuanModel();
        $model_SP = new SanPhamModel();
        $list_anh_bl = $model_BL->getAnhBL();
        $list_bl = $model_BL->getBinhLuan($id);
        $list_sp = $model_SP->getChiTietSP($id);
        $list_sanpham=$model_SP->getTTSP($id);
        $list_ctsp=$model_SP->getctsp($id);
        // dd($list_sanpham);
        return view('khach-hang.chi-tiet-san-pham', 
        compact('list_bl','list_sp','list_anh_bl', 'list_sanpham', 'list_ctsp'));
>>>>>>> Stashed changes
    }
}
