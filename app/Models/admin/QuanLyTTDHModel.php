<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyTTDHModel extends Model
{
    use HasFactory;
    protected $table="trangthaidonhang";
    protected $primaryKey='MaTTDH';

    protected $fillable = [
        'MaDH',
        'TrangThai',
        // Các cột khác nếu cần
    ];
    
    public $timestamps = false;

    public function gettrangthai()
    {
        return DB::table('trangthaidonhang')
        ->join('donhang','donhang.MaDH','=','trangthaidonhang.MaDH')
        ->get();
    }
}