<?php

namespace App\Models\khach_hang;

use App\Models\admin\SanPhamModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuanModel extends Model
{
    use HasFactory;
    protected $table ='binhluan';
    protected $primaryKey ='MaBL';
    protected $fillable=[
        'MaTK',
        'MaSP',
        'DanhGia',
        'AnhBL',
        'NoiDungDG',
        'NgayTaoBL',
    ];
    public $timestamps = false;

    public function getBinhLuan($id)
    {
        return DB::table('binhluan')
            ->join('taikhoan', 'binhluan.MaTK', '=', 'taikhoan.MaTK')
            ->join('anhbinhluan', 'binhluan.MaBL', '=', 'anhbinhluan.MaBL')
            ->where('MaSP','=' ,$id)
            ->select('binhluan.*', 'taikhoan.HoTen','anhbinhluan.TenAnhBL')
            ->get();
    }

    public function getAnhBL()
    {
        return DB::table('binhluan')
        ->join('anhbinhluan', 'binhluan.MaBL', '=', 'anhbinhluan.MaBL')->get();
    }


}
