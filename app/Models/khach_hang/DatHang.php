<?php

namespace App\Models\khach_hang;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        ->where('MaTK', $MaTK)
        ->get();
    }

    public function getkhuyenmaivc($MaTK)
    {
        return DB::table('khuyenmaivc')
        ->where('MaTK', $MaTK)
        ->get();
    }

    public function getdvvc()
    {
        return DB::table('donvivanchuyen')->get();
    }

}

