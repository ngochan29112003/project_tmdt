<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyBinhLuan extends Model
{
    use HasFactory;
    protected $table="binhluan";
    protected $primaryKey = 'MaBL';
    public $timestamps = false;

    public function getbinhluan()
    {
        return DB::table('binhluan')
        ->join('taikhoan','taikhoan.MaTK','=','binhluan.MaTK')
        ->get();
    }
}
