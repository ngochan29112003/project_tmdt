<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\admin\QuanLyBaoCao;
use Illuminate\Http\Request;
class QuanLyBaoCaoController extends Controller
{
    public function getView()
    {
        $quanlybaocaoModel = new QuanLyBaoCao();
        $list_bao_cao= $quanlybaocaoModel->getbaocao() ;
        $list_tai_khoan = $quanlybaocaoModel->getTK();
        return view('admin.quan-ly-bao-cao.danh-sach-bao-cao', 
        compact('list_bao_cao','list_tai_khoan'));
    }

    function addBaoCao(Request $request)
    {
        $validate = $request->validate([
            'MaTK'=>'int',
            'LoaiBC'=>'string',
            'NoiDungBC'=>'string',
            'NgayTaoBC'=>'date',
        ]);

        // Tạo mới sinh viên với dữ liệu đã validate
        QuanLyBaoCao::create($validate);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteBC($id)
    {
        $baocao = QuanLyBaoCao::findOrFail($id);

        $baocao->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editBaoCao($id)
    {
        $baocao = QuanLyBaoCao::findOrFail($id);
        return response()->json([
            'baocao' => $baocao
        ]);
    }

    public function updateBaoCao(Request $request, $id)
    {
        $validated = $request->validate([
            'MaTK'=>'int',
            'LoaiBC'=>'string',
            'NoiDungBC'=>'string',
            'NgayTaoBC'=>'date',
        ]);
        $baocao = QuanLyBaoCao::findOrFail($id);
        $baocao->update($validated);

        return response()->json([
            'success' => true,
            'baocao' => $baocao,
        ]);
    }

}