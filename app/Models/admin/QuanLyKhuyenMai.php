<?php

namespace App\Models\admin;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyKhuyenMai extends Model
{
    use HasFactory;
    protected $table="khuyenmai";
    protected $primaryKey='MaKM';

    protected $fillable = [
        'MaTK',
        'TenKM',
        'DieuKien',
        'PhanTramGiam',
        'GiaTriToiDa',
        'SoLuongMa',
        'NgayBD',
        'NgayKT',
    ];

    public $timestamps = false;

    public function getkhuyenmai()
    {
        $currentDate = now(); // Lấy ngày hiện tại

        // Lấy tất cả các khuyến mãi
        $khuyenMaiList = DB::table('khuyenmai')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'khuyenmai.MaTK')
            ->select('khuyenmai.*', 'taikhoan.HoTen')
            ->get();

        foreach ($khuyenMaiList as $item) {
            // Kiểm tra các điều kiện để thay đổi trạng thái mã
            if ($item->SoLuongMa == 0 || $item->NgayBD > $currentDate || $item->NgayKT < $currentDate) {
                $item->TrangThaiMa = 'ẩn'; // Cập nhật trạng thái mã
            } else {
                $item->TrangThaiMa = 'hiện'; // Trạng thái mã bình thường
            }

            // Cập nhật vào cơ sở dữ liệu
            DB::table('khuyenmai')
                ->where('MaKM', $item->MaKM)
                ->update(['TrangThaiMa' => $item->TrangThaiMa]);
        }

        return $khuyenMaiList; // Trả về danh sách khuyến mãi với trạng thái đã được cập nhật
    }

    public function getTK(){
        return DB::table('taikhoan')
            ->get();
    }
}
