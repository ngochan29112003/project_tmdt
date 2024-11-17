<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuanLyVanChuyenModel extends Model
{
    use HasFactory;

    protected $table = 'donvivanchuyen';
    protected $primaryKey = 'MaVC';

    protected $fillable=[
        'TenDonViVC',
        'TienVC',
        'TrangThaiVC',
    ];

    public $timestamps = false;
    public function getDonViVanChuyen()
    {
        return DB::table('donvivanchuyen')
            // ->join('donvivanchuyen', 'donvivanchuyen.MaVC', '=', 'thongtinvanchuyen.MaVC')
            ->get();
    }
}
