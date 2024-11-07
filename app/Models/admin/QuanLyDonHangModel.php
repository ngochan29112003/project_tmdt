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
            ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'donhang.MaTK')
            ->leftjoin('khuyenmai', 'khuyenmai.MaKM', '=', 'donhang.MaKM')
            ->leftjoin('khuyenmaivc', 'khuyenmaivc.MaKMVC', '=', 'donhang.MaKMVC')
            ->join('trangthai', 'trangthai.MaTT', '=', 'donhang.MaTT')
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
}
