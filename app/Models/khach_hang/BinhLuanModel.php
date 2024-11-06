<?php

namespace App\Models\khach_hang;

use App\Models\admin\SanPhamModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuanModel extends Model
{
    use HasFactory;
    protected $table ='binhluan';
    protected $primaryKey ='MaBL';
    protected $fillable=[
        'MaTK',
        'MaSP',
        'DanhGia',
        'AnhBL',
        'NoiDungDG',
        'NgayTaoBL',
    ];
    public $timestamps = false;

//    public function getBinhLuan()
//    {
//        $anhBL = DB::table('anhbinhluan')
//            ->join('binhluan', 'binhluan.MaBL', '=', 'anhbinhluan.MaBL')
//            ->orderBy('binhluan.NgayTaoBL', 'DESC') // Đổi từ DESC sang ASC
//            ->select('anhbinhluan.TenAnhBL')
//            ->get();
//
//        $binhLuan = DB::table('binhluan')
//            ->join('taikhoan', 'taikhoan.MaTK', '=', 'binhluan.MaTK')
//            ->orderBy('NgayTaoBL', 'DESC') // Đổi từ DESC sang ASC
//            ->get();
//
//        // Trả về cả hai kết quả trong một mảng
//        return [
//            'anhbinhluan' => $anhBL,
//            'binhluan' => $binhLuan
//        ];
//    }

    public function getBinhLuan($id)
    {
        $binhLuan = DB::table('binhluan')
            ->join('taikhoan', 'taikhoan.MaTK', '=', 'binhluan.MaTK')
            ->where('binhluan.MaSP',$id)
            ->orderBy('NgayTaoBL', 'DESC') // Đổi từ DESC sang ASC
            ->get();

        // Lấy ảnh bình luận cho từng bình luận
        $binhLuanWithImages = $binhLuan->map(function ($binhLuanItem) {
            $anhBL = DB::table('anhbinhluan')
                ->where('MaBL', $binhLuanItem->MaBL)
                ->get(); // Lấy ảnh cho mỗi bình luận cụ thể
            $binhLuanItem->anhbinhluan = $anhBL; // Gán ảnh vào bình luận
            return $binhLuanItem;
        });

        // Trả về kết quả đã gắn ảnh vào bình luận
        return [
            'binhluan' => $binhLuanWithImages
        ];
    }


}
