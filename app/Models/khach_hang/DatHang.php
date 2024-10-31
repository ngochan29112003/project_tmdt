<?php

namespace App\Models\khach_hang;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
    use HasFactory;
    protected $table="donhang";
    protected $primaryKey='MaDH';

    public $timestamps = false;

    public function getdonhang()
    {
        return DB::table('donhang')
        ->join('sanpham','sanpham.MaSP','=','donhang.MaSP')
        ->join('phuongthucthanhtoan','phuongthucthanhtoan.MaPTTT','=','donhang.MaPTTT')
        ->join('taikhoan','taikhoan.MaTK','=','donhang.MaTK')
        ->join('khuyenmai','khuyenmai.MaKM','=','donhang.MaKM')
        ->join('donvivanchuyen','donvivanchuyen.MaVC','=','donhang.MaVC')
        ->get();
    }
}
