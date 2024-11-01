<?php

namespace App\Models\khach_hang;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPhamModel extends Model
{
    use HasFactory;
    protected $table="chitietsanpham";
    protected $primaryKey='MaCTSP';

    //  protected $fillable = [
    //      'MaDH',
    //      'MaSP',
    //      'SoLuong',
    //      'Gia',
    // ];
    
    public $timestamps = false;

    public function getctsp()
    {
        return DB::table('chitietsanpham')
        ->join('sanpham','sanpham.MaSP','=','chitietsanpham.MaSP')
        ->get();
    }

}
