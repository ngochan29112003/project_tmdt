<?php

namespace App\Http\Controllers;

use App\Models\admin\DashBoardModel;
use App\Models\admin\SanPhamModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class DashBoardController extends Controller
{
    public function getViewDashBoardSuperAdmin()
    {
        return view('super-admin.master');
    }

    public function getViewDashBoardUser()
    {
        $model = new SanPhamModel();
        $pcBanChay = $model->getPCBanChay();
        $pcMoi = $model->getPCMoi();
        $pcKM = $model->getPCKm();
//        dd($pcBanChay);
        return view('khach-hang.home-page', compact('pcBanChay','pcMoi','pcKM'));
    }

    public function getViewDashBoardSAdmin()
    {
        return view('admin.master');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query'); // Lấy từ khóa từ form tìm kiếm

        if (empty($keyword)) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng nhập từ khóa tìm kiếm!'
            ], 422);
        }

        $san_pham = DB::table('sanpham')
            ->select('MaSP', 'TenSP', 'AnhSP', 'GiaBan', 'MoTaChiTiet')
            ->where('TenSP', 'LIKE', "%{$keyword}%") // Tìm kiếm sản phẩm theo tên
            ->orWhere('MoTaChiTiet', 'LIKE', "%{$keyword}%") // Hoặc mô tả chi tiết
            ->orderBy('TenSP', 'ASC') // Sắp xếp theo tên sản phẩm
            ->get();

        if ($san_pham->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm nào!'
            ], 404);
        }

        // Lưu danh sách sản phẩm vào session
        session(['san_pham' => $san_pham]);

        // Trả về URL chuyển hướng đến trang tìm kiếm
        return response()->json([
            'success' => true,
            'redirect' => route('view-search', ['keyword' => $keyword]),
        ]);
    }

    public function getViewSearch(Request $request)
    {
        $keyword = $request->input('keyword'); // Lấy từ khóa tìm kiếm từ query string
        $san_pham = session('san_pham'); // Lấy danh sách sản phẩm từ session

        // Trả về view với từ khóa và danh sách sản phẩm
        return view('khach-hang.search', compact('keyword', 'san_pham'));
    }


}
