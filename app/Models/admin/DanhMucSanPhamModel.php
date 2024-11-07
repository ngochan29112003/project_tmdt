<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMucSanPhamModel extends Model
{
    use HasFactory;
    protected $table ='danhmucsanpham';
    protected $primaryKey ='MaDM';
    protected $fillable=[
        'TenDM',
        'TrangThaiDM',
        'MaHSX'
    ];
    public $timestamps = false;

    public function danhmucSP()
    {
        return DB::table('danhmucsanpham')
            ->join('hangsanxuat', 'hangsanxuat.MaHSX', '=', 'danhmucsanpham.MaHSX')
            ->get();
    }

    public function gethangsanxuat()
    {
        return DB::table('hangsanxuat')
            ->get();
    }
}
