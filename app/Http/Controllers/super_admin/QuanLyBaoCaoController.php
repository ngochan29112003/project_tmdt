<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class QuanLyBaoCaoController extends Controller
{
    public function getView()
    {
        return view('super-admin.quan-ly-bao-cao.danh-sach-bao-cao');
    }

}