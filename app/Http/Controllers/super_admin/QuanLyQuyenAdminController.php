<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLyQuyenAdminController extends Controller
{
    public function getView()
    {
        $model = new QuanLyTaiKhoan();
        $dataTaiKhoan = $model->getAdmin();

        // Lấy danh sách quyền và nhóm theo MaTK
        $quyenAdmin = DB::table('taikhoan')
            ->join('phanquyenadmin', 'taikhoan.MaTK', '=', 'phanquyenadmin.MaTK')
            ->join('quyenadmin', 'phanquyenadmin.MaQuyen', '=', 'quyenadmin.id')
            ->select('taikhoan.MaTK', 'taikhoan.HoTen', 'quyenadmin.TenQuyen')
            ->get();

        // Nhóm quyền cho mỗi admin theo MaTK
        $groupedPermissions = [];
        foreach ($quyenAdmin as $item) {
            $MaTK = $item->MaTK;
            if (!isset($groupedPermissions[$MaTK])) {
                $groupedPermissions[$MaTK] = [
                    'HoTen' => $item->HoTen,
                    'TenQuyen' => []
                ];
            }
            $groupedPermissions[$MaTK]['TenQuyen'][] = $item->TenQuyen;
        }

        if (request()->ajax()) {
            // Trả dữ liệu JSON nếu yêu cầu là AJAX
            return response()->json(view('super-admin.quan-ly-quyen-admin.table-content', compact('dataTaiKhoan', 'groupedPermissions'))->render());
        }

        return view('super-admin.quan-ly-quyen-admin.danh-sach', compact('dataTaiKhoan', 'groupedPermissions'));
    }



    public function getViewPhanQuyen($id)
    {
        // Lấy thông tin admin
        $adminPhanQuyen = DB::table('taikhoan')
            ->where('MaTK', '=', $id)
            ->first();

        // Lấy danh sách các quyền
        $listQuyen = DB::table('quyenadmin')->get();

        // Lấy danh sách các quyền đã được phân cho admin
        $assignedPermissions = DB::table('phanquyenadmin')
            ->where('MaTK', $id)
            ->pluck('MaQuyen')
            ->toArray();

        // Truyền dữ liệu vào view
        return view('super-admin.quan-ly-quyen-admin.phan-quyen', compact('adminPhanQuyen', 'listQuyen', 'assignedPermissions'));
    }


    // Ví dụ Controller
    public function updatePermissions(Request $request)
    {
        $MaTK = $request->MaTK;
        $permissions = $request->permissions;

        // Xóa quyền hiện có của admin
        DB::table('phanquyenadmin')->where('MaTK', $MaTK)->delete();

        // Thêm quyền mới
        foreach ($permissions as $MaQuyen) {
            DB::table('phanquyenadmin')->insert([
                'MaTK' => $MaTK,
                'MaQuyen' => $MaQuyen
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function updateSinglePermission(Request $request)
    {
        $MaTK = $request->MaTK;
        $MaQuyen = $request->permissionId;
        $action = $request->action;

        if ($action === 'add') {
            DB::table('phanquyenadmin')->insert([
                'MaTK' => $MaTK,
                'MaQuyen' => $MaQuyen
            ]);
        } else {
            DB::table('phanquyenadmin')
                ->where('MaTK', $MaTK)
                ->where('MaQuyen', $MaQuyen)
                ->delete();
        }

        return response()->json(['success' => true]);
    }


}
