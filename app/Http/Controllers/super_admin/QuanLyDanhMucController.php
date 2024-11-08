<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;

use App\Models\admin\DanhMucSanPhamModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyDanhMucController extends Controller
{
    public function getView()
    {
        $danh_muc_sp = new DanhMucSanPhamModel();
        $list_danh_muc = $danh_muc_sp->danhmucSP();
        $list_hang_sx = $danh_muc_sp->gethangsanxuat();
        return view('super-admin.quan-ly-danh-muc.danh-sach-danh-muc',
        compact('list_danh_muc', 'list_hang_sx'));
    }

    public function addDanhMuc(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenDM'=> 'string',
            'TrangThaiDM' => 'string',
            'MaHSX' => 'int'
        ]);


        DanhMucSanPhamModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteDanhMuc($id)
    {
        $danhmuc = DanhMucSanPhamModel::findOrFail($id);

        $danhmuc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }

    public function editDanhMuc($id)
    {
        $danhmuc = DanhMucSanPhamModel::findOrFail($id);
        return response()->json([
            'danhmuc' => $danhmuc
        ]);
    }

    public function updateDanhMuc(Request $request, $id)
    {
        $validated = $request->validate([
            'TenDM' => 'string',
            'TrangThaiDM' => 'string',
            'MaHSX' => 'int'
        ]);

        $danhmuc = DanhMucSanPhamModel::findOrFail($id);
        $danhmuc->update($validated);

        return response()->json([
            'success' => true,
            'danhmuc' => $danhmuc,
        ]);
    }
//    public function filterDanhMuc(Request $request)
//    {
//        $productName = $request->get('productName');
//
//        if ($productName) {
//            // Lọc theo Tên sản phẩm nếu có giá trị
//            $dataDM = DanhMucSanPhamModel::where('TenDM', 'LIKE', '%' . $productName . '%')->get();
//        } else {
//            // Hiển thị tất cả nếu không chọn tên sản phẩm
//            $dataDM = DanhMucSanPhamModel::all();
//        }
//
//        return response()->json(['data' => $dataDM]);
//    }

    public function exportDanhMuc()
    {
        $inputFileName = public_path('excel/bangdanhmucexport.xlsx');

        $inputFileType = IOFactory::identify($inputFileName);

        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $cell = $excel->getActiveSheet();

        $model = new DanhMucSanPhamModel();
        $leave_report = $model->danhmucSP();
        $num_row = 2;

        foreach ($leave_report as $row) {
            $cell->setCellValue('A' . $num_row, $stt++);
            $cell->setCellValue('B' . $num_row, $row->TenDM);
            $cell->setCellValue('C' . $num_row, $row->TenHSX);

            $borderStyle = $cell->getStyle('A' . $num_row . ':C' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row . ':C' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach (range('A', 'C') as $columnID) {
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

    public function hienDanhMuc(Request $request)
    {
        // Find the account by ID
        $model = DanhMucSanPhamModel::find($request->id);

        if ($model) {
            $model->TrangThaiDM = 0;
            $model->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function anDanhMuc(Request $request)
    {
        // Find the account by ID
        $model = DanhMucSanPhamModel::find($request->id);

        if ($model) {
            $model->TrangThaiDM = 1;
            $model->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
