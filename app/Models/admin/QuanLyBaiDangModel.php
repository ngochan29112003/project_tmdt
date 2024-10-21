<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyBaiDangModel extends Model
{
    use HasFactory;

    protected $table = 'baidang';
    protected $primaryKey = 'MaBD';

    protected $fillable = [
      'MaTK',
      'MaSP',
      'TenBD',
      'AnhBD',
      'NoiDungBD',
      'NgayTaoBD',
      'TrangThaiBD'
    ];

    public $timestamps = false;
    public function getBaiDang()
    {
        return DB::table('baidang')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'baidang.MaTK')
            ->join('sanpham', 'sanpham.MaSP', '=', 'baidang.MaSP')
            ->get();
    }

    public function getTaiKhoan()
    {
        return DB::table('taikhoan')->get();
    }

    public function getSanPham()
    {
        return DB::table('sanpham')->get();
    }

}
