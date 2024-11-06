<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use App\Models\admin\SanPhamModel;
use App\Models\khach_hang\AnhBinhLuanModel;
use App\Models\khach_hang\BinhLuanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChiTietSanPhamController extends Controller
{
    public function getViewChiTietSP($id)
    {
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
    }
    public function addBinhLuan(Request $request)
    {
        $validate = $request->validate([
            'MaTK' => 'int',
            'MaSP' => 'int',
            'DanhGia' => 'int',
            'files.*' => 'nullable|mimes:jpg,jpeg,png|max:1000', // Chỉ cho phép file ảnh
            'NoiDungDG' => 'string',
        ]);



        // Thêm ngày tạo bình luận là ngày hiện tại
        $validate['NgayTaoBL'] = Carbon::now();

        $binhluan = BinhLuanModel::create($validate);

        $imageNames = []; // Mảng để lưu tên ảnh

        if ($request->hasFile('files')) {
            $folderPath = public_path('asset/img-binh-luan');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            foreach ($request->file('files') as $file) {
                // Đặt tên cho ảnh
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($folderPath, $fileName);

                // Lưu tên ảnh vào mảng
                $imageNames[] = $fileName;

                // Lưu hình ảnh vào model AnhBinhLuan (nếu cần)
                AnhBinhLuanModel::create([
                    'TenAnhBL' => $fileName,
                    'MaBL' => $binhluan->MaBL
                ]);
            }

            // Cập nhật tên ảnh vào bình luận
            $binhluan->TenAnhBL = implode(',', $imageNames); // Lưu tên ảnh dưới dạng chuỗi
            $binhluan->save(); // Lưu lại bình luận với tên ảnh
        }


//        if ($request->hasFile('files')) {
//            $folderPath = public_path('asset/img-binh-luan');
//
//            // Tạo thư mục nếu chưa tồn tại
//            if (!file_exists($folderPath)) {
//                mkdir($folderPath, 0777, true);
//            }
//
//            foreach ($request->file('files') as $file) {
//                $fileName = $file->getClientOriginalName();
//                $file->move($folderPath, $fileName);
//
//                AnhBinhLuanModel::create([
//                    'TenAnhBL' => $fileName,
//                    'MaBL' => $binhluan->MaBL
//                ]);
//            }
//        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }


}
