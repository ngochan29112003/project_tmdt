<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassWordModel extends Model
{
    use HasFactory;

    protected $table = 'taikhoan'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaTK';  // Khóa chính của bảng, nếu không phải là 'id'
    public $timestamps = false;

    // Các trường cần gán
    protected $fillable = [
        'Email',
        'MatKhau',
    ];
}
