<?php

namespace App\Models\khach_hang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChiTietSanPhamModel extends Model
{
    use HasFactory;
    protected $table = 'chitietsanpham';
    protected $primaryKey ='MaCTSP';
    protected $fillable = [
        'MaSP',
        'ThongTinKyThuat',
        'NhaCungCap',
        'XuatXu',
        'MoTaSP',
    ];
    public $timestamps = false;

    public function getctsp()
    {
        return DB::table('chitietsanpham')
            ->join('sanpham','sanpham.MaSP','=','chitietsanpham.MaSP')
            ->get();
    }

    public function getsp()
    {
        return DB::table('sanpham')
            ->get();
    }


}
