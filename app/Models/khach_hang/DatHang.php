<?php

namespace App\Models\khach_hang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DatHang extends Model
{
    use HasFactory;
    protected $table="donhang";
    protected $primaryKey='MaDH';

     protected $fillable = [
         'TenKH',
         'SDT',
         'MaSP',
         'GhiChu',
         'TienHang',
         'TienVC',
         'GiamTienHang',
         'GiamTienVC',
         'TongTien',
         'DiaChiGiaoHang',
         'NgayTaoDH',
         'MaPTTT',
         'MaTK',
         'MaKM',
         'MaKMVC',
         'MaVC',
         'ThanhToan',
     ];

    public $timestamps = false;

    public function getdonhang()
    {
        return DB::table('donhang')
            ->join('phuongthucthanhtoan','phuongthucthanhtoan.MaPTTT','=','donhang.MaPTTT')
            ->join('taikhoan','taikhoan.MaTK','=','donhang.MaTK')
            ->leftjoin('khuyenmai','khuyenmai.MaKM','=','donhang.MaKM')
            ->leftjoin('khuyenmaivc','khuyenmaivc.MaKMVC','=','donhang.MaKMVC')
            ->join('donvivanchuyen','donvivanchuyen.MaVC','=','donhang.MaVC')
            ->get();
    }

    public function getpttt()
    {
        return DB::table('phuongthucthanhtoan')->get();
    }

    public function gettaikhoan($MaTK)
    {
        return  DB::table('taikhoan')
            ->select('HoTen', 'SDT', 'DiaChi')
            ->where('MaTK', $MaTK)
            ->first();
    }

    public function getkhuyenmai($MaTK)
    {
        return DB::table('khuyenmai')
            ->where('MaTK', $MaTK) // Điều kiện lọc theo MaTK
            ->where('TrangThaiMa', 'hiện') // Điều kiện lọc theo TrangThaiMa là 'hiện'
            ->get();
    }

    public function getkhuyenmaivc($MaTK)
    {
        return DB::table('khuyenmaivc')
            ->where('MaTK', $MaTK) // Điều kiện lọc theo MaTK
            ->where('TrangThaiMa', 'hiện') // Điều kiện lọc theo TrangThaiMa là 'hiện'
            ->get();
    }


    public function getdvvc()
    {
        return DB::table('donvivanchuyen')->get();
    }
    public function getdonhang_ALL()
    {
        // Retrieve the logged-in user's account ID from the session
        $maTK = session('MaTK');

        return DB::table('donhang')
            ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'donhang.MaTK')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
            ->where('donhang.MaTK', $maTK)  // Filter by the current user's account ID
            ->orderBy('donhang.MaDH', 'desc') // Order by
            ->get();
    }

    public function getdonhang_TT($trangthai)
    {
        // Lấy mã tài khoản từ session
        $maTK = session('MaTK');

        return DB::table('donhang')
            ->join('phuongthucthanhtoan', 'phuongthucthanhtoan.MaPTTT', '=', 'donhang.MaPTTT')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'donhang.MaTK')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'donhang.MaVC')
            ->where('donhang.MaTK', $maTK)  // Lọc theo mã tài khoản
            ->where('donhang.MaTT', $trangthai)  // Lọc theo trạng thái đơn hàng
            ->orderBy('donhang.MaDH', 'desc') // Sắp xếp theo mã đơn hàng
            ->get();
    }

}

