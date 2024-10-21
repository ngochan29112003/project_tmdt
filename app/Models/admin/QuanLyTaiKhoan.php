<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    public $timestamps = false;

    public function vaitro()
    {
        return $this->belongsTo(VaiTroTaiKhoan::class, 'VaiTro', 'id_vai_tro');
    }

    public function getTaiKhoan(){
        return DB::table('taikhoan')->get();
    }
}

