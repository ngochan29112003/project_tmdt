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

        'MoTaChiTiet',
        'ThoiGianBaoHanh',
        'MaDM',
        'MaHSX',
        'AnhCT1',
        'AnhCT2',
        'AnhCT3',
        'AnhCT4',
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

    public function getPCBanChay()
    {
        return DB::table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.MaDM','=','sanpham.MaDM')
            ->join('hangsanxuat','hangsanxuat.MaHSX','sanpham.MaHSX')
            ->where('sanpham.MaDM','=',30)
            ->take(8)
            ->get();
    }

    public function getPCMoi()
    {
        return DB::table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.MaDM','=','sanpham.MaDM')
            ->join('hangsanxuat','hangsanxuat.MaHSX','sanpham.MaHSX')
            ->where('sanpham.MaDM','=',30)
            ->take(4)
            ->get();
    }

    public function getPCKm()
    {
        return DB::table('sanpham')
            ->join('danhmucsanpham','danhmucsanpham.MaDM','=','sanpham.MaDM')
            ->join('hangsanxuat','hangsanxuat.MaHSX','sanpham.MaHSX')
            ->where('sanpham.MaDM','=',30)
            ->take(4)
            ->get();
    }

    public function getChiTietSP($id)
    {
        return DB::table('sanpham')
            ->where('MaSP','=' ,$id)
            ->first();
    }

    public function getTTSP($id)
    {
        return DB::table('sanpham')
            ->join('danhmucsanpham', 'danhmucsanpham.MaDM', '=', 'sanpham.MaDM')
            ->join('hangsanxuat', 'hangsanxuat.MaHSX', '=', 'sanpham.MaHSX')
            ->where('sanpham.MaSP', $id) // Lọc theo MaSP
            ->first(); // Chỉ lấy một sản phẩm duy nhất
    }

    public function getctsp($id)
    {
        return DB::table('sanpham')
            ->join('chitietsanpham', 'chitietsanpham.MaSP', '=', 'sanpham.MaSP')
            ->where('chitietsanpham.MaSP','=' ,$id)
            ->first();
    }
}
