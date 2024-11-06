<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimKiemModel extends Model
{
    use HasFactory;
    protected $table='sanpham';
    protected $primaryKey = 'MaSP';
    protected $fillable = [
        'TenSP',
    ];
}
