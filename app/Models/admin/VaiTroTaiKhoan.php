<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTroTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'vaitro';
    protected $primaryKey = 'id_vai_tro';
    public $timestamps = false;

    public function taikhoans()
    {
        return $this->hasMany(QuanLyTaiKhoan::class, 'VaiTro', 'id_vai_tro');
    }
}
