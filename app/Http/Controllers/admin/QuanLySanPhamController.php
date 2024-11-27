<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;

use App\Models\admin\SanPhamModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLySanPhamController extends Controller
{
    public function getView()
    {
        $San_Pham = new SanPhamModel();
        $list_sp = $San_Pham->getSanPham();
        $list_danh_muc = $San_Pham->getdanhmuc();
        $list_hang_sx = $San_Pham->gethangsx();
//        dd($San_Pham->toArray());
        return view('admin.quan-ly-san-pham.danh-sach-san-pham',
        compact('list_sp','list_danh_muc','list_hang_sx'));
    }


    public function addSanPham(Request $request)
    {
        // 1. Xác thực dữ liệu
        $validate = $request->validate([
            'TenSP' => 'string|required',
            'AnhSP' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'GiaBan' => 'string|required',
            'SoLuongTonKho' => 'integer|required',
            'NgayTaoSP' => 'date|required',
            'TrangThaiSP' => 'string|required',
            'MoTaChiTiet' => 'string|required',
            'ThoiGianBaoHanh' => 'string|required',
            'MaDM' => 'integer|required',
            'MaHSX' => 'integer|required',
        ]);

        // 2. Xử lý file upload
        $fileNameAnhSP = null;
        $fileNameAnhCT1 = null;

        // Xử lý ảnh chính (AnhSP)
        if ($request->hasFile('AnhSP')) {
            $file = $request->file('AnhSP');
            if ($file->isValid()) {
                $fileNameAnhSP = time() . '_AnhSP.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhSP);
            } else {
                return response()->json(['success' => false, 'message' => 'File ảnh chính không hợp lệ!'], 400);
            }
        }

        // Xử lý ảnh phụ 1 (AnhCT1)
        if ($request->hasFile('AnhCT1')) {
            $file = $request->file('AnhCT1');
            if ($file->isValid()) {
                $fileNameAnhCT1 = time() . '_AnhCT1.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhCT1);
            } else {
                return response()->json(['success' => false, 'message' => 'File ảnh phụ không hợp lệ!'], 400);
            }
        }

        // Xử lý ảnh phụ 2 (AnhCT2)
        if ($request->hasFile('AnhCT2')) {
            $file = $request->file('AnhCT2');
            if ($file->isValid()) {
                $fileNameAnhCT2 = time() . '_AnhCT2.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhCT2);
            } else {
                return response()->json(['success' => false, 'message' => 'File ảnh phụ không hợp lệ!'], 400);
            }
        }

        // Xử lý ảnh phụ 3 (AnhCT3)
        if ($request->hasFile('AnhCT3')) {
            $file = $request->file('AnhCT3');
            if ($file->isValid()) {
                $fileNameAnhCT3 = time() . '_AnhCT3.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhCT3);
            } else {
                return response()->json(['success' => false, 'message' => 'File ảnh phụ không hợp lệ!'], 400);
            }
        }

        // Xử lý ảnh phụ 4 (AnhCT4)
        if ($request->hasFile('AnhCT4')) {
            $file = $request->file('AnhCT4');
            if ($file->isValid()) {
                $fileNameAnhCT4 = time() . '_AnhCT4.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhCT4);
            } else {
                return response()->json(['success' => false, 'message' => 'File ảnh phụ không hợp lệ!'], 400);
            }
        }


        // 3. Tạo sản phẩm mới
        $sanPham = new SanPhamModel([
            'TenSP' => $request->TenSP,
            'AnhSP' => $fileNameAnhSP,
            'AnhCT1' => $fileNameAnhCT1,
            'AnhCT2' => $fileNameAnhCT2,
            'AnhCT3' => $fileNameAnhCT3,
            'AnhCT4' => $fileNameAnhCT4,
            'GiaBan' => $request->GiaBan,
            'SoLuongTonKho' => $request->SoLuongTonKho,
            'NgayTaoSP' => $request->NgayTaoSP,
            'ThoiGianBaoHanh' => $request->ThoiGianBaoHanh,
            'MoTaChiTiet' => $request->MoTaChiTiet,
            'TrangThaiSP' => $request->TrangThaiSP,
            'MaDM' => $request->MaDM,
            'MaHSX' => $request->MaHSX,
        ]);

        if ($sanPham->save()) {
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Thêm thành công',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Thêm không thành công',
            ], 500);
        }
    }

    function deleteSP($id)
    {
        $sp = SanPhamModel::findOrFail($id);

        $sp->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editSanPham($id)
    {
        $sanpham = SanPhamModel::findOrFail($id);
        return response()->json([
            'sanpham' => $sanpham
        ]);
    }

    public function updateSanPham(Request $request, $id)
    {
        $validated = $request->validate([
            'TenSP' => 'required|string',
            'AnhSP' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'GiaBan' => 'required|string',
            'SoLuongTonKho' => 'required|string',
            'NgayTaoSP' => 'required|date',
            'TrangThaiSP' => 'required|string',
            'MoTaChiTiet' => 'nullable|string',
            'ThoiGianBaoHanh' => 'nullable|string',
            'MaDM' => 'required|int',
            'MaHSX' => 'required|int',
            'AnhCT1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'AnhCT4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sanpham = SanPhamModel::findOrFail($id);

        // Xử lý ảnh chính
        if ($request->hasFile('AnhSP')) {
            $file = $request->file('AnhSP');
            if ($file->isValid()) {
                $fileNameAnhSP = time() . '_AnhSP.' . $file->getClientOriginalExtension();
                $file->move(public_path('asset/img-product'), $fileNameAnhSP);

                if ($sanpham->AnhSP && file_exists(public_path($sanpham->AnhSP))) {
                    unlink(public_path($sanpham->AnhSP));
                }

                $validated['AnhSP'] = $fileNameAnhSP;
            }
        }

        // Xử lý ảnh phụ
        foreach (['AnhCT1', 'AnhCT2', 'AnhCT3', 'AnhCT4'] as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                if ($file->isValid()) {
                    $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('asset/img-product'), $fileName);

                    if ($sanpham->{$key} && file_exists(public_path($sanpham->{$key}))) {
                        unlink(public_path($sanpham->{$key}));
                    }

                    $validated[$key] = $fileName;
                }
            }
        }

        $sanpham->update($validated);

        return response()->json([
            'success' => true,
            'response' => 'Cập nhật sản phẩm thành công!',
            'sanpham' => $sanpham,
        ]);
    }



    public function exportSanPham()
    {
        $inputFileName = public_path('excel/bangsanphamexport.xlsx');

        $inputFileType = IOFactory::identify($inputFileName);

        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $cell = $excel->getActiveSheet();

        $model = new SanPhamModel();
        $leave_report = $model->getSanPham();
        $num_row = 2;

        foreach ($leave_report as $row) {
            $cell->setCellValue('A' . $num_row, $stt++);
            $cell->setCellValue('B' . $num_row, $row->TenSP);
            $cell->setCellValue('C' . $num_row, $row->GiaBan);
            $cell->setCellValue('D' . $num_row, $row->SoLuongTonKho);
            $cell->setCellValue('E' . $num_row, $row->MoTaChiTiet);
            $cell->setCellValue('F' . $num_row, $row->ThoiGianBaoHanh);
            $cell->setCellValue('G' . $num_row, $row->TenDM);
            $cell->setCellValue('H' . $num_row, $row->TenHSX);

            $borderStyle = $cell->getStyle('A' . $num_row . ':H' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row . ':H' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach (range('A', 'H') as $columnID) {
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-danh-muc" . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
