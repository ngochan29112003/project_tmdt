<?php

namespace App\Http\Controllers\super_admin;

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
        return view('super-admin.quan-ly-san-pham.danh-sach-san-pham',
        compact('list_sp','list_danh_muc','list_hang_sx'));
    }

    public function addSanPham(Request $request)
    {
//         dd($request);
        $validate = $request->validate([
            'TenSP'=> 'string',
            'AnhSP' => 'string',
            'GiaBan' => 'string',
            'SoLuongTonKho' => 'string',
            'NgayTaoSP' => 'date',
            'TrangThaiSP' => 'string',
            'MoTaChiTiet' => 'string',
            'ThoiGianBaoHanh' => 'string',
            'MaDM' => 'int',
            'MaHSX' => 'int',
        ]);


        SanPhamModel::create($validate);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Thêm thành công!',
        ]);
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
            'TenSP'=> 'string',
            'AnhSP' => 'string',
            'GiaBan' => 'string',
            'SoLuongTonKho' => 'string',
            'NgayTaoSP' => 'date',
            'TrangThaiSP' => 'string',
            'MoTaChiTiet' => 'string',
            'ThoiGianBaoHanh' => 'string',
            'MaDM' => 'int',
            'MaHSX' => 'int',
        ]);
        $sanpham = SanPhamModel::findOrFail($id);
        $sanpham->update($validated);

        return response()->json([
            'success' => true,
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
