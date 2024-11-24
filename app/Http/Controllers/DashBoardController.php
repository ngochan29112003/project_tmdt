<?php

namespace App\Http\Controllers;

use App\Models\admin\DashBoardModel;
use App\Models\admin\SanPhamModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class DashBoardController extends Controller
{
    public function getViewDashBoard()
    {
        $dashboard = new DashBoardModel();
        $time = 'Tất cả'; // Mặc định là thống kê theo tháng

        // Thực hiện lấy dữ liệu thống kê
        $tong_tk = $dashboard->getTongSoTK($time);
        $tong_sp = $dashboard->getTongSP($time);
        $tong_dh = $dashboard->getTongDH($time);
        $tong_tien = $dashboard->getTongTien($time);
        $tong_tien = number_format($tong_tien, 0, ',', '.');

        $list_kh = $dashboard->getDS_Khach_hang();
        $list_sp = $dashboard->getDS_San_pham();

        return view(
            'super-admin.thong-ke.danh-sach-thong-ke',
            compact('tong_tk', 'tong_dh', 'tong_sp', 'tong_tien', 'list_kh', 'list_sp')
        );
    }

    public function getThongKe(Request $request)
    {
        try {
            $dashboard = new DashBoardModel();
            $time = $request->input('LoaiThongKe');

            // Lấy các dữ liệu thống kê
            $tong_tk = $dashboard->getTongSoTK($time);
            $tong_sp = $dashboard->getTongSP($time);
            $tong_dh = $dashboard->getTongDH($time);
            $tong_tien = $dashboard->getTongTien($time);
            $tong_tien_formatted = number_format($tong_tien, 0, ',', '.');

            $list_kh = $dashboard->getDS_Khach_hang();
            $list_sp = $dashboard->getDS_San_pham();

            return response()->json([
                'success' => true,
                'tong_tk' => $tong_tk,
                'tong_sp' => $tong_sp,
                'tong_dh' => $tong_dh,
                'tong_tien' => $tong_tien_formatted,
                'list_kh' => $list_kh,
                'list_sp' => $list_sp
            ]);
        } catch (\Exception $e) {
            // Nếu có lỗi, trả về thông báo lỗi
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tải dữ liệu. Vui lòng thử lại.'
            ], 500);
        }
    }

    public function getViewDashBoardUser()
    {
        $model = new SanPhamModel();
        $pcBanChay = $model->getPCBanChay();
        $pcMoi = $model->getPCMoi();
        $pcKM = $model->getPCKm();

        return view('khach-hang.home-page', compact('pcBanChay', 'pcMoi', 'pcKM'));
    }

    public function getExportKH()
    {
        $inputFileName = public_path('Excel\danh-sach-khach-hang.xlsx');

        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);
        $excel = $objReader->load($inputFileName);

        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;
        $sheet = $excel->getActiveSheet();

        $model = new DashBoardModel();
        $khachHangData = $model->getDS_Khach_hang(); // Gọi phương thức lấy dữ liệu

        $num_row = 2;
        // Căn giữa các tiêu đề trong dòng 1
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        foreach ($khachHangData as $kh) {
            $sheet->setCellValue('A' . $num_row, $stt++);
            $sheet->setCellValue('B' . $num_row, $kh->HoTen);
            $sheet->setCellValue('C' . $num_row, $kh->SDT);
            $sheet->setCellValue('D' . $num_row, $kh->SoDonDaMua);
            $sheet->setCellValue('E' . $num_row, $kh->TongTienDaMua);

            $borderStyle = $sheet->getStyle('A' . $num_row . ':E' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            $sheet->getStyle('A' . $num_row . ':E' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;
        }

        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $filename = "danh-sach-khach-hang.xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }

    public function getExportSP()
    {
        // Đường dẫn tới file mẫu Excel cho sản phẩm
        $inputFileName = public_path('Excel\danh-sach-san-pham.xlsx');

        // Xác định loại file và đọc file mẫu
        $inputFileType = IOFactory::identify($inputFileName);
        $objReader = IOFactory::createReader($inputFileType);
        $excel = $objReader->load($inputFileName);

        // Thiết lập trang tính và kiểu font
        $excel->setActiveSheetIndex(0);
        $excel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $stt = 1;  // Biến đếm số thứ tự sản phẩm
        $sheet = $excel->getActiveSheet();

        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
        $model = new DashBoardModel();
        $sanPhamData = $model->getDS_San_pham(); // Gọi phương thức lấy dữ liệu sản phẩm

        $num_row = 2;  // Bắt đầu từ dòng 2 (sau tiêu đề)

        // Căn giữa các tiêu đề trong dòng 1
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Lặp qua từng sản phẩm và thêm vào file Excel
        foreach ($sanPhamData as $sp) {
            $sheet->setCellValue('A' . $num_row, $stt++);  // Cột A: số thứ tự
            $sheet->setCellValue('B' . $num_row, $sp->TenSP);  // Cột B: Tên sản phẩm

            // Kiểm tra số lượng tồn kho, nếu nhỏ hơn 0 thì gán bằng 0
            $soLuongTonKho = ($sp->SoLuongTonKho < 0) ? 0 : $sp->SoLuongTonKho;
            $sheet->setCellValue('C' . $num_row, $soLuongTonKho);  // Cột C: Số lượng tồn kho

            $sheet->setCellValue('D' . $num_row, $sp->SoLuongDaBan);  // Cột D: Số lượng đã bán

            // Thêm viền cho các ô trong dòng
            $borderStyle = $sheet->getStyle('A' . $num_row . ':D' . $num_row)->getBorders();
            $borderStyle->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Căn chỉnh các cột
            $sheet->getStyle('A' . $num_row . ':D' . $num_row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $num_row++;  // Chuyển sang dòng tiếp theo
        }

        // Thiết lập độ rộng cột tự động
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Đặt tên cho file Excel xuất ra
        $filename = "danh-sach-san-pham.xlsx";

        // Thiết lập header để tải file về
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Xóa tất cả dữ liệu buffer trước khi xuất file
        ob_end_clean();

        // Tạo và lưu file Excel
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }

    public function guiMaKM(Request $request)
    {
        // Validate dữ liệu yêu cầu
        $request->validate([
            'MaTK' => 'required|integer'  // Kiểm tra MaTK hợp lệ
        ]);

        $model = new DashBoardModel();
        $email = $model->getEmail($request->email);
        // Lấy thông tin người dùng từ bảng 'taikhoan' dựa vào MaTK
        $user = Taikhoan::find($request->MaTK);  // Tìm tài khoản theo MaTK

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Tài khoản không tồn tại.'], 400);
        }

        // Lấy mã khuyến mãi ngẫu nhiên từ bảng 'khuyenmai' (hoặc chọn mã cụ thể nếu cần)
        $discountCode = KhuyenMai::inRandomOrder()->first();  // Lấy mã ngẫu nhiên từ bảng

        if (!$discountCode) {
            return response()->json(['success' => false, 'message' => 'Không có mã khuyến mãi nào.'], 400);
        }

        // Gửi mã khuyến mãi qua email
        Mail::send('email_view', ['code' => $discountCode->MaKM], function ($email) use ($user) {
            $email->subject('Mã giảm giá của bạn')
                ->to($user->Email);
        });

        // Trả về phản hồi thành công
        return response()->json(['success' => true, 'message' => 'Mã giảm giá đã được gửi qua email.']);
    }
}
