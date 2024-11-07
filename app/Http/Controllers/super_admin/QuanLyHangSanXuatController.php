<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\HangSanXuatModel;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyHangSanXuatController extends Controller
{
    public function getView()
    {
        $hang_sx = new HangSanXuatModel();
        $list_hang_sx = $hang_sx->getHangSX();
        return view('super-admin.quan-ly-hang-san-xuat.danh-sach-hang-san-xuat',
        compact('list_hang_sx'));
    }

    public function addHangSanXuat(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenHSX'=> 'string',
            'TrangThaiHSX' => 'string',
        ]);

        HangSanXuatModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
    }

    function deleteHangSanXuat($id)
    {
        $hangSX = HangSanXuatModel::findOrFail($id);

        $hangSX->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ]);
    }
    public function editHangSanXuat($id)
    {
        $hangsx = HangSanXuatModel::findOrFail($id);
        return response()->json([
            'hangsx' => $hangsx
        ]);
    }

    public function updateHangSanXuat(Request $request, $id)
    {
        $validated = $request->validate([
            'TenHSX' => 'string',
            'TrangThaiHSX' => 'string',
        ]);

        $hangsx = HangSanXuatModel::findOrFail($id);
        $hangsx->update($validated);

        return response()->json([
            'success' => true,
            'hangsx' => $hangsx
        ]);
    }

    public function exportHSX()
    {
        $inputFileName = public_path('excel/banghsxexport.xlsx');

        $inputFileType = IOFactory::identify($inputFileName);

        $objReader = IOFactory::createReader($inputFileType);

        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $cell = $excel->getActiveSheet();

        $model = new HangSanXuatModel();
        $leave_report = $model->getHangSX();
        $num_row = 2;

        foreach ($leave_report as $row) {
            $cell->setCellValue('A' . $num_row, $stt++);
            $cell->setCellValue('B' . $num_row, $row->TenHSX);

            $borderStyle = $cell->getStyle('A' . $num_row . ':B' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $cell->getStyle('A' . $num_row . ':B' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }
        foreach (range('A', 'B') as $columnID) {
            $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $filename = "danh-sach-hang-san-xuat" . '.xlsx';
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // Xóa tất cả buffer trước khi xuất dữ liệu
        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
