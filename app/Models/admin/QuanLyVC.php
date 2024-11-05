<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyVC extends Model
{
    use HasFactory;
    protected $table="donvivanchuyen";
    protected $primaryKey='MaVC';

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

    public function getdvvc()
    {
        return DB::table('donvivanchuyen')
        ->get();
    }
}