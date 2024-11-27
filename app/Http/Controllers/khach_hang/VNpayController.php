<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\khach_hang\VNpayModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class VNpayController extends Controller
{
    public function ThanhToanVNpay(Request $request)
    {
        $maDH = $request->input('redirect'); // Sử dụng 'ma_don_hang' để lấy giá trị đúng từ form

        session(['MaDH' => $maDH]);

        // Lấy tổng tiền từ bảng donhang
        $tongTien = VNpayModel::layTongTienTheoMaDH($maDH);
        if (!$tongTien) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy đơn hàng.']);
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.callback'); // Địa chỉ callback sau khi thanh toán
        $vnp_TmnCode = "40TDNXWG"; // Mã đối tác
        $vnp_HashSecret = "D4TE9VQ4GR8KTEXESP5VGADEWMRG3DK2"; // Mã bảo mật đối tác

        // Thông tin đơn hàng
        // $vnp_TxnRef = $maDH;
        $vnp_TxnRef = time() . mt_rand(10000, 99999);// Mã đơn hàng thực tế (ví dụ: 9704198526191432198)
        $vnp_OrderInfo = 'Thanh toán đơn hàng: ' . $maDH;  // Thông tin mô tả đơn hàng (có thể thay đổi tùy yêu cầu)
        $vnp_OrderType = 'billpayment';  // Loại đơn hàng
        $vnp_Amount = $tongTien * 100;  // Số tiền VNPay yêu cầu (vnd -> dong)
        $vnp_Locale = 'vn';  // Ngôn ngữ
        $vnp_BankCode = 'NCB';  // Mã ngân hàng (có thể tùy chỉnh)
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];  // Địa chỉ IP người dùng

        // Tạo mảng dữ liệu cho VNPay
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis', strtotime('+7 hour')),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Nếu có chọn ngân hàng cụ thể, thêm vào dữ liệu
        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Sắp xếp mảng theo thứ tự tăng dần
        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= ($query ? '&' : '') . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // Tạo URL của VNPay
        $vnp_Url .= "?" . $query;
        if ($vnp_HashSecret) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Chuyển hướng người dùng đến VNPay để thanh toán
        return redirect()->away(path: $vnp_Url);
    }

    public function ketQuaThanhToan(Request $request)
    {
        // Ghi log để debug
        Log::info('Nhận được callback từ VNPay', $request->all());

        $vnp_ResponseCode = $request->vnp_ResponseCode; // Sửa cách lấy response code
        $maDH = session('MaDH');

        Log::info('Mã đơn hàng từ session: ' . $maDH);

        if ($vnp_ResponseCode == '00') {
            try {
                // Thử cập nhật trực tiếp bằng Query Builder
                $updated = DB::table('donhang')
                    ->where('MaDH', $maDH)
                    ->update(['ThanhToan' => '1']);

                Log::info('Kết quả cập nhật: ' . ($updated ? 'thành công' : 'thất bại'));

                if ($updated) {
                    return redirect()
                        ->route('tra-cuu-don-hang')
                        ->with('success', 'Thanh toán thành công.');
                } else {
                    throw new \Exception('Không thể cập nhật trạng thái thanh toán');
                }
            } catch (\Exception $e) {
                Log::error('Lỗi cập nhật thanh toán: ' . $e->getMessage());
                return redirect()
                    ->route('tra-cuu-don-hang')
                    ->with('error', 'Cập nhật trạng thái thanh toán thất bại.');
            }
        } else {
            return redirect()
                ->route('tra-cuu-don-hang')
                ->with('error', 'Thanh toán không thành công.');
        }
    }

    public function HuyDon(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = VNpayModel::find($id);
        // dd($order);
        // Kiểm tra nếu đơn hàng không tồn tại
        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại']);
        }

        $order->MaTT = 6; // Đặt trạng thái là "Hủy"
        $order->save();
        return response()->json(['success' => true, 'message' => 'Hủy đơn hàng thành công']);
    }
}
