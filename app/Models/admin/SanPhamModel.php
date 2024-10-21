<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class SanPhamModel extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'MaSP';
    protected $fillable=[
      'TenSP',
      'AnhSP',
      'GiaBan',
      'SoLuongTonKho',
      'NgayTaoSP',
      'TrangThaiSP',
      'MoTaChiTiet',
      'ThoiGianBaoHanh',
      'MaDM',
      'MaHSX',
    ];
    public $timestamps = false;

    public function getSanPham()
    {
        return DB::table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.MaDM','=','sanpham.MaDM')
            ->join('hangsanxuat','hangsanxuat.MaHSX','sanpham.MaHSX')
            ->get();
    }

    public function getdanhmuc()
    {
        return DB::table('danhmucsanpham')->get();
    }

    public function gethangsx()
    {
        return DB::table('hangsanxuat')->get();
    }


}
