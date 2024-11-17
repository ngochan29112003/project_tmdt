<?php

namespace App\Models\khach_hang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Log;

class VNpayModel extends Model
{
    use HasFactory;
    protected $table = 'donhang'; // Bảng donhang trong cơ sở dữ liệu
    protected $primaryKey = 'MaDH'; // Khóa chính của bảng rotected $primaryKey = 'MaDH'; // Khóa chính của bảng

    // Phương thức lấy TongTien từ donhang bằng MaDH
    public static function layTongTienTheoMaDH($maDH)
    {
        return DB::table('donhang')->where('MaDH', $maDH)->value('TongTien');
    }

    // Phương thức cập nhật ThanhToan từ 0 thành 1
    public static function capNhatThanhToan($maDH)
    {
        try {
            // Kiểm tra mã đơn hàng có tồn tại
            $order = self::where('MaDH', $maDH)->first();
            if ($order) {
                $order->ThanhToan = 1; // Cập nhật trạng thái thanh toán
                $order->save(); // Lưu thay đổi
                Log::info('Cập nhật trạng thái thanh toán thành công cho đơn hàng: ' . $maDH);
                return true;
            } else {
                Log::warning('Không tìm thấy đơn hàng với mã: ' . $maDH);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi cập nhật thanh toán: ' . $e->getMessage());
            return false;
        }
    }

}
