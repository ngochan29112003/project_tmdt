<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $fillable=[
        'HoTen',
        'TenDangNhap',
        'MatKhau',
        'VaiTro',
        'AnhDaiDien',
        'Email',
        'NgaySinh',
        'GioiTinh',
        'SDT',
        'DiaChi',
        'TrangThai',
    ];
    public $timestamps = false;
}
