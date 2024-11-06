<?php

namespace App\Http\Controllers;

use App\Models\admin\SanPhamModel;
use Illuminate\Support\Facades\DB;

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
        return view('khach-hang.home-page', compact('pcBanChay','pcMoi','pcKM'));
    }
//     public function getViewTimKiem(Request $request)
//     {
// //        dd($request->input('query'));
//         // Lấy từ khóa tìm kiếm từ form
//         $keyword = $request->input('query');

//         // Kiểm tra nếu có từ khóa, thực hiện tìm kiếm
//         if ($keyword) {
//             // Tìm kiếm theo tên lớp học phần hoặc mã học phần
//             $lop_hoc_phan = TimKiemMoDel::where('TenSP', 'LIKE', "%{$keyword}%")
//                 ->orderBy('TenSP', 'asc') // Sắp xếp theo tên lớp học phần
//                 ->get();
//         }
//         // Trả kết quả về view với thông tin giảng viên và kết quả tìm kiếm
//         return view('khach-hang.san.kq_tim_kiem', compact('lop_hoc_phan'));
//     }
}
