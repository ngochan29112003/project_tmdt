<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyDonHangModel;
use App\Models\admin\TrangThaiModel;
use App\Models\admin\QuanLyPTTT;
use App\Models\admin\QuanLyCTDH;
use App\Models\admin\QuanLyVC;
use App\Models\admin\SanPhamModel;
use DB;
use Illuminate\Http\Request;
use PDF;

class QuanLyDonHangController extends Controller
{
    public function getView()
    {
        $donhang = new QuanLyDonHangModel();
        $list_donhang = $donhang->getDonHang();
        $qltt = new TrangThaiModel();
        $list_tt = $qltt->gettt();

        return view('super-admin.quan-ly-don-hang.danh-sach-don-hang',
            compact('list_donhang', 'list_tt'));
    }

    public function show()
    {
        // Kết hợp bảng trangthaidonhang và trangthai
        $list_trang_thai = QuanLyDonHangModel::join('trangthai', 'donhang.MaTT', '=', 'trangthai.MaTT')
            ->select('donhang.MaTT', 'trangthai.TenTT', 'trangthai.MaTT')
            ->get();

        // Danh sách trạng thái
        $list_tt = TrangThaiModel::all();

        return view('your_view', compact('list_trang_thai', 'list_tt'));
    }

    public function updateTTDH(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $ttdh = QuanLyDonHangModel::findOrFail($id);

        // Lấy giá trị mới từ request
        $newMaTT = $request->input('MaTT');

        // Kiểm tra xem MaTT mới có tồn tại trong bảng trangthai không
        $existingStatus = TrangThaiModel::find($newMaTT);

        if (!$existingStatus) {
            return response()->json(['success' => false, 'message' => 'Trạng thái không hợp lệ.']);
        }

        // Cập nhật trạng thái
        $ttdh->MaTT = $newMaTT;
        $ttdh->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
    }


    public function filterDonHang(Request $request)
    {
        $trangThaiId = $request->input('trangThaiId');

        if (empty($trangThaiId)) {
            $list_donhang = (new QuanLyDonHangModel())->getDonHang();
        } else {
            $list_donhang = DB::table('donhang')
                ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
                ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
                ->join('taikhoan', 'taikhoan.MaTK', '=', 'donhang.MaTK')
                ->leftjoin('khuyenmai', 'khuyenmai.MaKM', '=', 'donhang.MaKM')
                ->leftjoin('khuyenmaivc', 'khuyenmaivc.MaKMVC', '=', 'donhang.MaKMVC')
                ->join('trangthai', 'trangthai.MaTT', '=', 'donhang.MaTT')
                ->where('donhang.MaTT', $trangThaiId)
                ->select(
                    'donhang.MaDH',
                    'phuongthucthanhtoan.TenPTTT',
                    'donvivanchuyen.TenDonViVC',
                    'khuyenmai.TenKM',
                    'donhang.TenKH',
                    'donhang.SDT',
                    'donhang.DiaChiGiaoHang',
                    'donhang.NgayTaoDH',  // Lấy ngày tạo đơn hàng
                    'donhang.TienHang',
                    'donhang.TienVC',
                    'donhang.GiamTienHang',
                    'donhang.GiamTienVC',
                    'donhang.TongTien',  // Lấy tổng tiền
                    'donhang.MaTT',
                    'trangthai.MaTT',
                    'trangthai.TenTT'
                )
                ->get();
        }

        $list_tt = (new TrangThaiModel())->gettt();

        // Tạo HTML cho tbody
        $html = '';
        foreach ($list_donhang as $index => $item) {
            $html .= '<tr>';
            $html .= '<td>' . ($index + 1) . '</td>';
            $html .= '<td>' . $item->TenKH . '</td>';
            $html .= '<td>' . $item->SDT . '</td>';
            $html .= '<td>' . $item->DiaChiGiaoHang . '</td>';
            $html .= '<td>' . $item->TenPTTT . '</td>';
            $html .= '<td>' . $item->TenDonViVC . '</td>';
            $html .= '<td>' . number_format($item->TongTien, 0, ',', '.') . '</td>';
            $html.='<td>' . number_format($item->TienHang, 0, ',', '.') . '</td>';
            $html.='<td>' . number_format($item->TienVC, 0, ',', '.') . '</td>';
            $html.='<td>' . number_format($item->GiamTienHang, 0, ',', '.') . '</td>';
            $html.='<td>' . number_format($item->GiamTienVC, 0, ',', '.') . '</td>';
            $html .= '<td class="text-center align-middle">';
            $html .= '<a href="' . route('in-don-hang', $item->MaDH) . '" title="Xuất đơn hàng">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-arrow-right text-danger">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                <path d="M9 15h6" />
                                <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5" />
                            </svg>
                        </a>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<select class="form-select change-status" data-id="' . $item->MaDH . '">';
            foreach ($list_tt as $trangThai) {
                $selected = $item->MaTT == $trangThai->MaTT ? 'selected' : '';
                $html .= '<option value="' . $trangThai->MaTT . '" ' . $selected . '>' . $trangThai->TenTT . '</option>';
            }
            $html .= '</select>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return response()->json(['html' => $html]);
    }

    public function InDH($id) {
        // Gọi hàm ChuyenLenh để lấy nội dung HTML
        $html = $this->ChuyenLenh($id);

        // Kiểm tra xem hàm trả về nội dung HTML hợp lệ
        if (is_array($html) && isset($html['success']) && !$html['success']) {
            return response()->json($html); // Trả về JSON nếu có lỗi
        }

        // Tạo PDF
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($html);

        // Trả về file PDF
        return $pdf->download('don_hang_' . $id . '.pdf');
    }

    public function ChuyenLenh($id) {
        // Thực hiện join để lấy thông tin từ các bảng liên quan
        $donHang = DB::table('donhang')
            ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
            ->where('donhang.MaDH', $id)
            ->select(
                'donhang.*',
                'phuongthucthanhtoan.TenPTTT',
                'donvivanchuyen.TenDonViVC'
            )
            ->first();

        // Kiểm tra nếu đơn hàng tồn tại
        if (!$donHang) {
            return ['success' => false, 'message' => 'Đơn hàng không tồn tại.'];
        }

        // Lấy chi tiết đơn hàng trực tiếp theo MaDH
        $chitietdonhang = QuanLyCTDH::where('MaDH', $id)->get();

        // Tạo HTML cho view trực tiếp
        $html = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>ĐƠN HÀNG PCSTORE</title>
            <style>
                body { font-family: DejaVu Sans; }
                h3 { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid black; padding: 8px; text-align: left; }
            </style>
        </head>
        <body>
            <h3>ĐƠN HÀNG</h3>
            <p>Tên Khách Hàng: {$donHang->TenKH}</p>
            <p>Số Điện Thoại: (+84){$donHang->SDT}</p>
            <p>Địa Chỉ: {$donHang->DiaChiGiaoHang}</p>
            <p>Phương Thức Thanh Toán: " . htmlentities($donHang->TenPTTT) . "</p>
            <p>Đơn Vị Vận Chuyển: " . htmlentities($donHang->TenDonViVC) . "</p>
            <p>Tổng Tiền: " . number_format($donHang->TongTien, 0, ',', '.') . " VNĐ</p>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>";

        $totalThanhTien = 0;
        $stt = 1;

        foreach ($chitietdonhang as $item) {
            // Lấy thông tin sản phẩm tương ứng với MaSP
            $sanPham = SanPhamModel::where('MaSP', $item->MaSP)->first();
            $tenSP = $sanPham ? $sanPham->TenSP : 'N/A';
            $thanhTien = $item->SoLuong * $item->GiaBan;
            $totalThanhTien += $thanhTien;

            $html .= "
                    <tr>
                        <td>{$stt}</td>
                        <td>{$tenSP}</td>
                        <td>{$item->SoLuong}</td>
                        <td>" . number_format($item->GiaBan, 0, ',', '.') . " VNĐ</td>
                        <td>" . number_format($thanhTien, 0, ',', '.') . " VNĐ</td>
                    </tr>";
            $stt++;
        }
        $html .= "
                        </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan='4' style='text-align: right; font-weight: bold;'>Tổng Cộng:</td>
                                    <td>" . number_format($totalThanhTien, 0, ',', '.') . " VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </body>
            </html>";

        return $html;
    }
}
