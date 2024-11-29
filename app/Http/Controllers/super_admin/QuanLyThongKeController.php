<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DashBoardModel;
use App\Models\admin\QuanLyThongKeModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class QuanLyThongKeController extends Controller
{

    public function getViewDashBoard()
    {
        $thongke = new QuanLyThongKeModel();
        $time = 'Tất cả'; // Mặc định là thống kê theo tháng

        // Thực hiện lấy dữ liệu thống kê
        $tong_tk = $thongke->getTongSoTK($time);
        $tong_sp = $thongke->getTongSP($time);
        $tong_dh = $thongke->getTongDH($time);
        $tong_tien = $thongke->getTongTien($time);
        $tong_tien = number_format($tong_tien, 0, ',', '.');

        $list_kh = $thongke->getDS_Khach_hang();
        $list_sp = $thongke->getDS_San_pham();

        return view(
            'super-admin.thong-ke.danh-sach-thong-ke',
            compact('tong_tk', 'tong_dh', 'tong_sp', 'tong_tien', 'list_kh', 'list_sp')
        );
    }

    public function getThongKe(Request $request)
    {
        try {
            // Debug log
            \Log::info('LoaiThongKe: ' . $request->input('LoaiThongKe'));

            $thongke = new QuanLyThongKeModel();
            $time = $request->input('LoaiThongKe');  // Lấy loại thống kê từ request

            // Kiểm tra giá trị $time để đảm bảo nó hợp lệ
            if (!in_array($time, ['Tất cả', 'Tháng', 'Quý', 'Năm'])) {
                throw new \Exception('Loại thống kê không hợp lệ.');
            }

            // Lấy các dữ liệu thống kê
            $tong_tk = $thongke->getTongSoTK($time);
            $tong_sp = $thongke->getTongSP($time);
            $tong_dh = $thongke->getTongDH($time);
            $tong_tien = $thongke->getTongTien($time);
            $tong_tien = number_format($tong_tien, 0, ',', '.');

            // Trả lại dữ liệu dưới dạng JSON
            return response()->json([
                'success' => true,
                'tong_tk' => $tong_tk,
                'tong_sp' => $tong_sp,
                'tong_dh' => $tong_dh,
                'tong_tien' => $tong_tien
            ]);
        } catch (\Exception $e) {
            // Log lỗi
            \Log::error('Error: ' . $e->getMessage());

            // Trả lại thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại.'
            ], 500);
        }
    }

    // Phương thức xuất dữ liệu khách hàng ra file Excel
    public function getExportKH()
    {
        // Đọc file mẫu Excel từ thư mục public
        $inputFileName = public_path('Excel\danh-sach-khach-hang.xlsx');

        // Xác định kiểu file và đọc file Excel mẫu
        $inputFileType = IOFactory::identify($inputFileName);  // Xác định loại file (xlsx, xls...)
        $objReader = IOFactory::createReader($inputFileType);   // Tạo đối tượng đọc file
        $excel = $objReader->load($inputFileName);               // Tải file vào đối tượng Excel

        // Thiết lập font chữ mặc định cho toàn bộ file
        $excel->setActiveSheetIndex(0);                           // Chọn sheet đầu tiên
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');  // Đặt font cho toàn bộ file

        $stt = 1;  // Biến đếm số thứ tự khách hàng
        $sheet = $excel->getActiveSheet();  // Lấy đối tượng sheet hiện tại

        // Lấy dữ liệu khách hàng từ cơ sở dữ liệu thông qua model
        $model = new QuanLyThongKeModel();
        $khachHangData = $model->getDS_Khach_hang();  // Gọi phương thức lấy danh sách khách hàng

        $num_row = 2;  // Bắt đầu nhập dữ liệu từ dòng 2 (sau tiêu đề)

        // Căn giữa các tiêu đề trong dòng 1
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Căn giữa tiêu đề

        // Lặp qua từng khách hàng và thêm vào file Excel
        foreach ($khachHangData as $kh) {
            // Thêm thông tin khách hàng vào các cột tương ứng
            $sheet->setCellValue('A' . $num_row, $stt++);  // Cột A: Số thứ tự
            $sheet->setCellValue('B' . $num_row, $kh->HoTen);  // Cột B: Họ và tên
            $sheet->setCellValue('C' . $num_row, $kh->SDT);  // Cột C: SĐT
            $sheet->setCellValue('D' . $num_row, $kh->SoDonDaMua);  // Cột D: Số đơn đã mua

            // Kiểm tra nếu Số đơn đã mua bằng 0 thì gán tổng tiền đã mua bằng 0
            $tongTien = ($kh->SoDonDaMua == 0) ? 0 : $kh->TongTienDaMua;
            $sheet->setCellValue('E' . $num_row, $tongTien);  // Cột E: Tổng tiền đã mua

            // Căn chỉnh các cột theo yêu cầu:
            // Cột STT và Cột SĐT căn giữa
            $sheet->getStyle('A' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('C' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Cột Họ và tên căn trái, Cột SoDonDaMua và TongTienDaMua căn phải
            $sheet->getStyle('B' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('D' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->getStyle('E' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            // Thêm viền cho các ô trong dòng
            $borderStyle = $sheet->getStyle('A' . $num_row . ':E' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);  // Thêm viền mỏng cho các ô

            $num_row++;  // Chuyển sang dòng tiếp theo
        }

        // Thiết lập độ rộng tự động cho các cột
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);  // Tự động điều chỉnh độ rộng cột
        }

        // Đặt tên cho file Excel xuất ra
        $filename = "danh-sach-khach-hang.xlsx";

        // Thiết lập headers để trình duyệt tải file về
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Xóa bộ đệm trước khi xuất file
        ob_end_clean();

        // Lưu file Excel vào output stream (tải xuống)
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }

    // Phương thức xuất dữ liệu sản phẩm ra file Excel
    public function getExportSP()
    {
        // Đọc file mẫu Excel từ thư mục public
        $inputFileName = public_path('Excel\danh-sach-san-pham.xlsx');

        // Xác định kiểu file và đọc file Excel mẫu
        $inputFileType = IOFactory::identify($inputFileName);  // Xác định loại file (xlsx, xls...)
        $objReader = IOFactory::createReader($inputFileType);   // Tạo đối tượng đọc file
        $excel = $objReader->load($inputFileName);               // Tải file vào đối tượng Excel

        // Thiết lập font chữ mặc định cho toàn bộ file
        $excel->setActiveSheetIndex(0);                           // Chọn sheet đầu tiên
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');  // Đặt font cho toàn bộ file

        $stt = 1;  // Biến đếm số thứ tự sản phẩm
        $sheet = $excel->getActiveSheet();  // Lấy đối tượng sheet hiện tại

        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu thông qua model
        $model = new QuanLyThongKeModel();
        $sanPhamData = $model->getDS_San_pham();  // Gọi phương thức lấy danh sách sản phẩm

        $num_row = 2;  // Bắt đầu nhập dữ liệu từ dòng 2 (sau tiêu đề)

        // Căn giữa các tiêu đề trong dòng 1
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Căn giữa tiêu đề

        // Lặp qua từng sản phẩm và thêm vào file Excel
        foreach ($sanPhamData as $sp) {
            // Thêm thông tin sản phẩm vào các cột tương ứng
            $sheet->setCellValue('A' . $num_row, $stt++);  // Cột A: Số thứ tự
            $sheet->setCellValue('B' . $num_row, $sp->TenSP);  // Cột B: Tên sản phẩm
            // Kiểm tra nếu SoLuongTonKho nhỏ hơn 0 thì gán giá trị bằng 0
            $soLuongTonKho = ($sp->SoLuongTonKho < 0) ? 0 : $sp->SoLuongTonKho;
            $sheet->setCellValue('C' . $num_row, $soLuongTonKho);  // Cột C: Số lượng tồn kho
            $sheet->setCellValue('D' . $num_row, $sp->SoLuongDaBan);  // Cột D: Số lượng đã bán

            // Căn chỉnh các cột theo yêu cầu:
            // Cột STT căn giữa, Cột Tên sản phẩm căn trái
            $sheet->getStyle('A' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('B' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
            // Cột Số lượng tồn kho và Số lượng đã bán căn phải
            $sheet->getStyle('C' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->getStyle('D' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            // Thêm viền cho các ô trong dòng
            $borderStyle = $sheet->getStyle('A' . $num_row . ':D' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);  // Thêm viền mỏng cho các ô

            $num_row++;  // Chuyển sang dòng tiếp theo
        }

        // Thiết lập độ rộng tự động cho các cột
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);  // Tự động điều chỉnh độ rộng cột
        }

        // Đặt tên cho file Excel xuất ra
        $filename = "danh-sach-san-pham.xlsx";

        // Thiết lập headers để trình duyệt tải file về
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Xóa bộ đệm trước khi xuất file
        ob_end_clean();

        // Lưu file Excel vào output stream (tải xuống)
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
