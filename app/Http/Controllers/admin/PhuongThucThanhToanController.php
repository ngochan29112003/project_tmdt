<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\PhuongThucThanhToanModel;
use Illuminate\Http\Request;
class PhuongThucThanhToanController extends Controller
{
    public function getView()
    {
        $pttt = new PhuongThucThanhToanModel();
        $list_pttt = $pttt -> getPhuongThucThanhToan();
        return view('admin.phuong-thuc-thanh-toan.danh-sach-phuong-thuc-thanh-toan'
            , compact('list_pttt'));
    }

}
