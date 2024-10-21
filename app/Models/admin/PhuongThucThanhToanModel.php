<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhuongThucThanhToanModel extends Model
{
    use HasFactory;

    protected $table = 'phuongthucthanhtoan';
    protected $primaryKey = 'MaPTTT';
    public $timestamps = false;

    public function getPhuongThucThanhToan()
    {
        return DB::table('phuongthucthanhtoan')->get();
    }
}
