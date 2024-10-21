<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HangSanXuatModel extends Model
{
    use HasFactory;
    protected $table ='hangsanxuat';
    protected $primaryKey = 'MaHSX';
    protected $fillable=[
        'TenHSX',
        'TrangThaiHSX'
    ];
    public $timestamps = false;

    public function getHangSX()
    {
        return DB::table('hangsanxuat')->get();
    }
}
