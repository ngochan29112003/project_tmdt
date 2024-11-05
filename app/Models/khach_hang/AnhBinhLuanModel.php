<?php

namespace App\Models\khach_hang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhBinhLuanModel extends Model
{
    use HasFactory;
    protected $table ='anhbinhluan';
    protected $primaryKey ='id';
    protected $fillable=[
        'MaBL',
        'TenAnhBL',
    ];
    public $timestamps = false;
}
