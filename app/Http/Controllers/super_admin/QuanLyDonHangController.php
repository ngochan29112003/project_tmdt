<?php

namespace App\Http\Controllers\super_admin;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyDonHangModel;
use App\Models\admin\TrangThaiModel;
use DB;
use Illuminate\Http\Request;

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
                ->join('khuyenmai', 'khuyenmai.MaKM', '=', 'donhang.MaKM')
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
                    'donhang.NgayTaoDH',
                    'donhang.TongTien',
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
            $html .= '<td>' . $item->TongTien . '</td>';
            $html .= '<td class="text-center align-middle">';
            $html .= '  <a href="{{ route(\'export-don-hang\', $item->MaDH) }}" title="Xuất đơn hàng">
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
}
