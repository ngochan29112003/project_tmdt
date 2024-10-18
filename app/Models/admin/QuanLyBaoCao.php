<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyBaoCao extends Model
{
    use HasFactory;
    protected $table="baocao";
    protected $primaryKey='MaBC';

    public $timestamps = false;

    public function getbaocao()
    {
        return DB::table('baocao')
        ->join('taikhoan','taikhoan.MaTK','=','baocao.MaTK')
        ->get();
    }
}
