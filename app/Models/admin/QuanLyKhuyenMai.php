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
    public $timestamps = false;

    public function getkhuyenmai()
    {
        return DB::table('khuyenmai')
        ->join('taikhoan','taikhoan.MaTK','=','khuyenmai.MaTK')
        ->get();
    }
}
