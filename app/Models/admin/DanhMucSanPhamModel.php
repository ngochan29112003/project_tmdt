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
        'icon'
    ];
    public $timestamps = false;

    public function danhmucSP()
    {
        return DB::table('danhmucsanpham')
            ->get();
    }

    public function gethangsanxuat()
    {
        return DB::table('hangsanxuat')
            ->get();
    }
}
