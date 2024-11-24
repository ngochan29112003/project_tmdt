<?php

namespace App\Http\Controllers\khach_hang;

use App\Http\Controllers\Controller;
use App\Models\admin\QuanLyTaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongTinTaiKhoanController extends Controller
{
    public function getViewTaiKhoan()
    {
        $MaTK = session('MaTK');
        $taikhoan = DB::table('taikhoan')->first();

//        dd($chitiet);
        return view('khach-hang.thong-tin-tai-khoan',compact('taikhoan'));
    }

    public function editTaiKhoan()
    {
        $MaTK = session('MaTK'); // lấy MaTK từ session

        // Lấy thông tin tài khoản với MaTK tương ứng
        $taikhoan = DB::table('taikhoan')->where('MaTK', $MaTK)->first();

        return response()->json(['taikhoan' => $taikhoan]);
    }

    public function updateTTTK(Request $request)
    {
        try {
            // Xác thực dữ liệu
            $validated = $request->validate([
                'MaTK' => 'required|int',
                'AnhDaiDien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'HoTen' => 'required|string|max:255',
                'GioiTinh' => 'required|string|in:Nam,Nữ',
                'NgaySinh' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        $minAgeDate = now()->subYears(18)->format('Y-m-d');
                        if ($value > $minAgeDate) {
                            $fail('Ngày sinh phải đủ 18 tuổi.');
                        }
                    },
                ],
                'DiaChi' => 'nullable|string|max:255',
                'Email' => [
                    'required',
                    'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|net|org|vn|edu|gov)$/',
                    'max:255',
                ],
                'SDT' => [
                    'required',
                    'string',
                    'regex:/^0[0-9]{9}$/', // Định dạng số điện thoại bắt đầu bằng 0 và có 10 chữ số
                ],
            ], [
                'AnhDaiDien.image' => 'Tệp tải lên phải là một hình ảnh hợp lệ.',
                'AnhDaiDien.mimes' => 'Hình ảnh phải thuộc các định dạng: jpeg, png, jpg, gif.',
                'AnhDaiDien.max' => 'Dung lượng hình ảnh không được vượt quá 2MB.',
                'NgaySinh.required' => 'Ngày sinh là bắt buộc.',
                'NgaySinh.date' => 'Ngày sinh phải là một ngày hợp lệ.',
                'Email.required' => 'Email là bắt buộc.',
                'Email.regex' => 'Email không đúng định dạng. Đảm bảo có đuôi miền hợp lệ như .com, .vn, .org, ...',
                'Email.max' => 'Email không được vượt quá 255 ký tự.',
                'SDT.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
            ]);

            // Tìm thông tin tài khoản
            $thongtintk = QuanLyTaiKhoan::findOrFail($validated['MaTK']);

            // Xử lý file upload nếu có
            if ($request->hasFile('AnhDaiDien')) {
                $file = $request->file('AnhDaiDien');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('asset/img'), $fileName);

                // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
                $validated['AnhDaiDien'] = $fileName;
            }

            // Cập nhật thông tin tài khoản
            $thongtintk->update($validated);

            return response()->json([
                'success' => true,
                'response' => 'Cập nhật thông tin thành công!',
                'thongtintk' => $thongtintk,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], 422); // Mã lỗi 422: Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'response' => 'Có lỗi xảy ra. Vui lòng thử lại.',
            ], 500);
        }
    }
}
