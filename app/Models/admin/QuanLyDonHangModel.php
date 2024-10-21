<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyDonHangModel extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $primaryKey = 'MaDH';
    public $timestamps = false;
    public function getDonHang()
    {
        return DB::table('donhang')
            ->join('sanpham', 'sanpham.MaSP', '=', 'donhang.MaSP')
            ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'donhang.MaTK')
            ->join('khuyenmai', 'khuyenmai.MaKM', '=', 'donhang.MaKM')
            ->select(
                'donhang.MaDH',
                'sanpham.TenSP', // Lấy tên sản phẩm
                'taikhoan.HoTen',
                'phuongthucthanhtoan.TenPTTT',
                'donvivanchuyen.TenDonViVC',
                'khuyenmai.TenKM',
                'taikhoan.SDT',
                'donhang.DiaChiGiaoHang',
                'donhang.TrangThaiDH',// Lấy trạng thái đơn hàng
                'donhang.NgayTaoDH',  // Lấy ngày tạo đơn hàng
                'donhang.TongTien'  // Lấy tổng tiền
            )
            ->get();
    }
}
