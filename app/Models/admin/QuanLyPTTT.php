<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyPTTT extends Model
{
    use HasFactory;
    protected $table="phuongthucthanhtoan";
    protected $primaryKey='MaPTTT';

    // protected $fillable = [
    //     'MaTK',
    //     'TenKM',
    //     'DieuKien',
    //     'PhanTramGiam',
    //     'GiaTriToiDa',
    //     'SoLuongMa',
    //     'NgayBD',
    //     'NgayKT',
    // ];
    
    public $timestamps = false;

    public function getpttt()
    {
        return DB::table('phuongthucthanhtoan')
        ->get();
    }
}