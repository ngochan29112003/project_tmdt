<?php

namespace App\Models\admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraLoiBinhLuan extends Model
{
    use HasFactory;

    protected $table="traloibl";
    protected $primaryKey = 'MaTL';
    protected $fillable = [
        'MaBL',
        'NoiDungTL',
        'NgayTL',
    ];
    public $timestamps = false;

    public function gettraloi()
    {
        return DB::table('traloibl')
        ->join('binhluan','binhluan.MaBL','=','traloibl.MaBL')
        ->get();
    }

    public function getBL(){
        return DB::table('binhluan')->get();
    }
}
