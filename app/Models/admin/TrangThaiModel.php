<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiModel extends Model
{
    use HasFactory;
    protected $table="trangthai";
    protected $primaryKey='MaTT';

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

    public function gettt()
    {
        return DB::table('trangthai')->get();
    }
}