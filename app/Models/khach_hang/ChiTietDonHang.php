<?php

namespace App\Models\khach_hang;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table="chitietdonhang";
    protected $primaryKey='MaCTDH';

     protected $fillable = [
         'MaDH',
         'MaSP',
         'SoLuong',
         'Gia',
    ];
    
    public $timestamps = false;

    public function getdonhang()
    {
        return DB::table('chitietdonhang')
        ->join('sanpham','sanpham.MaSP','=','chitietdonhang.MaSP')
        ->join('donhang','donvivanchuyen.MaDH','=','chitietdonhang.MaDH')
        ->get();
    }
}