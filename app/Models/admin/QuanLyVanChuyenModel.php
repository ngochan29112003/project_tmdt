<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyVanChuyenModel extends Model
{
    use HasFactory;

    protected $table = 'thongtinvanchuyen';
    protected $primaryKey = 'MaTTVC';
    public $timestamps = false;
    public function getVanChuyen()
    {
        return DB::table('thongtinvanchuyen')
            ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'thongtinvanchuyen.MaVC')
            ->get();
    }
}
