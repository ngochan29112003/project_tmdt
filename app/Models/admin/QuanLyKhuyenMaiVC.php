<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyKhuyenMaiVC extends Model
{
    use HasFactory;
    protected $table="khuyenmaivc";
    protected $primaryKey='MaKMVC';

    protected $fillable = [
        'MaTK',
        'TenKMVC',
        'DieuKien',
        'PhanTramGiam',
        'GiaTriToiDa',
        'SoLuongMa',
        'NgayBD',
        'NgayKT',
    ];
    public $timestamps = false;

    public function getkhuyenmaivc()
    {
        $currentDate = now(); // Lấy ngày hiện tại

        // Lấy tất cả các khuyến mãi
        $khuyenMaiList = DB::table('khuyenmaivc')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'khuyenmaivc.MaTK')
            ->select('khuyenmaivc.*', 'taikhoan.HoTen')
            ->get();

        foreach ($khuyenMaiList as $item) {
            // Kiểm tra các điều kiện để thay đổi trạng thái mã
            if ($item->SoLuongMa == 0 || $item->NgayBD > $currentDate || $item->NgayKT < $currentDate) {
                $item->TrangThaiMa = 'ẩn'; // Cập nhật trạng thái mã
            } else {
                $item->TrangThaiMa = 'hiện'; // Trạng thái mã bình thường
            }

            // Cập nhật vào cơ sở dữ liệu
            DB::table('khuyenmaivc')
                ->where('MaKMVC', $item->MaKMVC)
                ->update(['TrangThaiMa' => $item->TrangThaiMa]);
        }

        return $khuyenMaiList; // Trả về danh sách khuyến mãi với trạng thái đã được cập nhật
    }

    public function getTK(){
        return DB::table('taikhoan')
            ->get();
    }

}
