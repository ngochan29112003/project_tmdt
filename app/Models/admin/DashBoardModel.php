<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashBoardModel extends Model
{
    use HasFactory;

    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    public $timestamps = false;

    private function getTimeRange($time)
    {
        $now = Carbon::now();

        switch ($time) {
            case 'Tháng':
                // Tháng hiện tại
                $startDate = $now->startOfMonth()->format('Y-m-d');
                $endDate = $now->endOfMonth()->format('Y-m-d');
                break;
            case 'Quý':
                // 3 tháng gần nhất
                $startDate = $now->copy()->subMonths(2)->startOfMonth()->format('Y-m-d');
                $endDate = $now->endOfMonth()->format('Y-m-d');
                break;
            case 'Năm':
                // 12 tháng gần nhất
                $startDate = $now->copy()->subMonths(11)->startOfMonth()->format('Y-m-d');
                $endDate = $now->endOfMonth()->format('Y-m-d');
                break;
            case 'Tất cả':
            default:
                // Không giới hạn
                $startDate = null;
                $endDate = null;
                break;
        }
        return [$startDate, $endDate];
    }

    public function getTongSoTK($time)
    {
        [$startDate, $endDate] = $this->getTimeRange($time);

        $query = DB::table('taikhoan');

        if ($startDate && $endDate) {
            $query->whereBetween('NgayTaoTK', [$startDate, $endDate]);
        }

        return $query->count();
    }

    public function getTongSP($time)
    {
        [$startDate, $endDate] = $this->getTimeRange($time);

        $query = DB::table('sanpham');

        if ($startDate && $endDate) {
            $query->whereBetween('NgayTaoSP', [$startDate, $endDate]);
        }

        return $query->count();
    }


    public function getTongDH($time)
    {
        [$startDate, $endDate] = $this->getTimeRange($time);

        $query = DB::table('donhang')->where('MaTT', '=', '5');

        if ($startDate && $endDate) {
            $query->whereBetween('NgayTaoDH', [$startDate, $endDate]);
        }

        return $query->count();
    }


    public function getTongTien($time)
    {
        [$startDate, $endDate] = $this->getTimeRange($time);

        $query = DB::table('donhang')->where('MaTT', '=', '5');

        if ($startDate && $endDate) {
            $query->whereBetween('NgayTaoDH', [$startDate, $endDate]);
        }

        return $query->sum('TongTien');
    }

    public function getDS_Khach_hang()
    {
        return DB::table('taikhoan')
            ->leftJoin('donhang', 'taikhoan.MaTK', '=', 'donhang.MaTK') // Sử dụng left join để lấy tất cả khách hàng, kể cả những người chưa có đơn hàng
            ->select(
                'taikhoan.MaTK',
                'taikhoan.HoTen',
                'taikhoan.SDT',
                DB::raw('COUNT(donhang.MaDH) as SoDonDaMua'), // Tổng số đơn hàng (sử dụng COUNT để đếm số lượng đơn hàng)
                DB::raw('SUM(donhang.TongTien) as TongTienDaMua') // Tổng tiền đã mua
            )
            ->groupBy('taikhoan.MaTK', 'taikhoan.HoTen', 'taikhoan.SDT') // Gom nhóm theo khách hàng
            ->orderBy('TongTienDaMua', 'desc') // Sắp xếp giảm dần theo tổng tiền
            ->orderBy('SoDonDaMua', 'desc') // Tiếp theo giảm dần theo số đơn hàng
            ->get();
    }

    public function getDS_San_pham()
    {
        return DB::table('sanpham')
            ->leftJoin('chitietdonhang', 'sanpham.MaSP', '=', 'chitietdonhang.MaSP') // Sử dụng left join để lấy cả sản phẩm không có trong chi tiết đơn hàng
            ->leftJoin('donhang', 'chitietdonhang.MaDH', '=', 'donhang.MaDH') // Sử dụng left join với bảng đơn hàng
            ->where(function ($query) {
                $query->where('donhang.MaTT', '=', 5) // Chỉ tính các đơn hàng đã hoàn thành
                    ->orWhereNull('donhang.MaTT'); // Hoặc sản phẩm không có trong đơn hàng
            })
            ->select(
                'sanpham.MaSP',
                'sanpham.TenSP',
                'sanpham.SoLuongTonKho', // Lấy số lượng tồn kho từ bảng sản phẩm
                DB::raw('CAST(IFNULL(SUM(chitietdonhang.SoLuong), 0) AS UNSIGNED) as SoLuongDaBan') // Ép kiểu tổng số lượng đã bán thành số nguyên
            )
            ->groupBy('sanpham.MaSP', 'sanpham.TenSP', 'sanpham.SoLuongTonKho') // Gom nhóm theo sản phẩm
            ->orderBy('SoLuongDaBan', 'desc') // Sắp xếp giảm dần theo số lượng đã bán
            ->get();
    }

    public function getEmail($matk)
    {
        return DB::table('taikhoan')
            ->where('MaTK', '=', $matk)
            ->get('Email');
    }

    public function getMaKM()
    {
        return DB::table('khuyenmai')->get();
    }
}
