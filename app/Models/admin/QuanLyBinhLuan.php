<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class QuanLyBinhLuan extends Model
{
    use HasFactory;

    protected $table = "binhluan"; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaBL'; // Khóa chính của bảng

    public $timestamps = false; // Tắt tính năng timestamps vì bảng này không có các cột created_at, updated_at

    public function getbinhluan_daduyet()
    {
        return $this->join('taikhoan', 'taikhoan.MaTK', '=', 'binhluan.MaTK')
            ->join('sanpham', 'sanpham.MaSP', '=', 'binhluan.MaSP')
            ->where('binhluan.TrangThaiBL', '=', 1) // Lọc theo trạng thái đã duyệt
            ->orderBy('binhluan.NgayTaoBL', 'desc') // Sắp xếp theo ngày tạo giảm dần (mới nhất lên đầu)
            ->get();
    }

    public function getbinhluan_chuaduyet()
    {
        return $this->join('taikhoan', 'taikhoan.MaTK', '=', 'binhluan.MaTK')
            ->join('sanpham', 'sanpham.MaSP', '=', 'binhluan.MaSP')
            ->where('binhluan.TrangThaiBL', '=', 0) // Lọc theo trạng thái chưa duyệt
            ->orderBy('binhluan.NgayTaoBL', 'desc') // Sắp xếp theo ngày tạo giảm dần (mới nhất lên đầu)
            ->get();
    }

    public function getbinhluan_by_trangthai($trangThai)
    {
        return $this->join('taikhoan', 'taikhoan.MaTK', '=', 'binhluan.MaTK')
            ->join('sanpham', 'sanpham.MaSP', '=', 'binhluan.MaSP')
            ->where('binhluan.TrangThaiBL', '=', $trangThai)
            ->orderBy('binhluan.NgayTaoBL', 'desc') // Sắp xếp theo ngày tạo giảm dần (mới nhất lên đầu)
            ->get(); // Lọc theo trạng thái đã cho
    }

    

}
