<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyKhuyenMai extends Model
{
    use HasFactory;
    protected $table="khuyenmai";
    protected $primaryKey='MaKM';

    protected $fillable = [
        'MaTK',
        'TenKM',
        'DieuKien',
        'PhanTramGiam',
        'GiaTriToiDa',
        'SoLuongMa',
        'NgayBD',
        'NgayKT',
    ];
    
    public $timestamps = false;

    public function getkhuyenmai()
    {
        return DB::table('khuyenmai')
        ->join('taikhoan','taikhoan.MaTK','=','khuyenmai.MaTK')
        ->get();
    }

    public function getTK(){
        return DB::table('taikhoan')
        ->where('taikhoan.VaiTro','=',3)
        ->get();
    }
}
