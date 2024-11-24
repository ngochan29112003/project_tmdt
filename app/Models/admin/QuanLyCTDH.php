<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyCTDH extends Model
{
    use HasFactory;
    protected $table="chitietdonhang";
    protected $primaryKey='MaCTDH';

//     protected $fillable = [
//         'MaTK',
//         'TenKM',
//         'DieuKien',
//         'PhanTramGiam',
//         'GiaTriToiDa',
//         'SoLuongMa',
//         'NgayBD',
//         'NgayKT',
//     ];

    public $timestamps = false;

    public function getctdh()
    {
        return DB::table('chitietdonhang')
            ->get();
    }
}
