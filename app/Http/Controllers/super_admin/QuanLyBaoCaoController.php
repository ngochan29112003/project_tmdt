<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyBaoCao;
use Illuminate\Http\Request;
class QuanLyBaoCaoController extends Controller
{
    public function getView()
    {
        $quanlybaocaoModel = new QuanLyBaoCao();
        $list_bao_cao= $quanlybaocaoModel->getbaocao() ;
        return view('super-admin.quan-ly-bao-cao.danh-sach-bao-cao', 
        compact('list_bao_cao'));
    }

}