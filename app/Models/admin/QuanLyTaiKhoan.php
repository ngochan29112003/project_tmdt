<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $fillable =[
        'HoTen',
        'AnhDaiDien',
        'Email',
        'NgaySinh',
        'GioiTinh',
        'SDT',
        'DiaChi',
    ];
    public $timestamps = false;

    public function vaitro()
    {
        return $this->belongsTo(VaiTroTaiKhoan::class, 'VaiTro', 'id_vai_tro');
    }

    public function getTaiKhoan(){
        return DB::table('taikhoan')->get();
    }

    public function getAdmin()
    {
        return DB::table('taikhoan')
            ->where('VaiTro','=', 2)
            ->get();
    }

    public function getKhachHang()
    {
        return DB::table('taikhoan')
            ->where('VaiTro','=', 3)
            ->get();
    }
}
