<?php

use App\Http\Controllers\super_admin\DashBoardController;
use App\Http\Controllers\super_admin\QuanLyTaiKhoanController;
use App\Http\Controllers\super_admin\QuanLyDanhMucController;
use App\Http\Controllers\super_admin\QuanLyHangSanXuatController;
use App\Http\Controllers\super_admin\QuanLySanPhamController;
use App\Http\Controllers\super_admin\QuanLyDonHangController;
use App\Http\Controllers\super_admin\PhuongThucThanhToanController;
use App\Http\Controllers\super_admin\QuanLyVanChuyenController;
use App\Http\Controllers\super_admin\QuanLyBaiDangController;
use App\Http\Controllers\super_admin\QuanLyBinhLuanController;
use App\Http\Controllers\super_admin\QuanLyKhuyenMaiController;
use App\Http\Controllers\super_admin\QuanLyBaoCaoController;
use App\Http\Controllers\khach_hang\TrangChuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'getViewLogin'])->name('index.login'); //Cái này nữa làm trang web khách

Route::get('/register',[RegisterController::class,'getViewRegister'])->name('index.register');
Route::post('/register/add',[RegisterController::class,'addAccount'])->name('add-account');
Route::get('/login',[LoginController::class,'getViewLogin'])->name('index.login');
Route::post('/login',[LoginController::class,'loginAction'])->name('login-action');
Route::get('/logout', [LoginController::class, 'logoutAction'])->name('logout');
Route::get('/trang-chu-kh',[TrangChuController::class,'getViewTrangChu'])->name('trang-chu');

Route::group(['prefix' => '/', 'middleware' => 'isLogin'], function () {

    Route::group(['prefix' => '/super-admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoard'])->name('super-admin-home');
        Route::get('/danh-sach-tai-khoan',[QuanLyTaiKhoanController::class,'getView'])->name('danh-sach-tai-khoan');
        Route::post('/unlock', [QuanLyTaiKhoanController::class, 'unlockAccount'])->name('unlock.route');
        Route::get('filter-accounts', [QuanLyTaiKhoanController::class, 'filterAccounts'])->name('super-admin.filter-accounts');
        Route::get('/danh-sach-danh-muc',[QuanLyDanhMucController::class,'getView'])->name('danh-sach-danh-muc');
        Route::get('/danh-sach-hang-san-xuat',[QuanLyHangSanXuatController::class,'getView'])->name('danh-sach-hang-san-xuat');
        Route::get('/danh-sach-san-pham',[QuanLySanPhamController::class,'getView'])->name('danh-sach-san-pham');
        Route::get('/danh-sach-don-hang',[QuanLyDonHangController::class,'getView'])->name('danh-sach-don-hang');
        Route::get('/danh-sach-phuong-thuc-thanh-toan',[PhuongThucThanhToanController::class,'getView'])->name('danh-sach-phuong-thuc-thanh-toan');
        Route::get('/danh-sach-van-chuyen',[QuanLyVanChuyenController::class,'getView'])->name('danh-sach-van-chuyen');
        Route::get('/danh-sach-bai-dang',[QuanLyBaiDangController::class,'getView'])->name('danh-sach-bai-dang');
        Route::get('/danh-sach-binh-luan',[QuanLyBinhLuanController::class,'getView'])->name('danh-sach-binh-luan');
        Route::get('/danh-sach-khuyen-mai',[QuanLyKhuyenMaiController::class,'getView'])->name('danh-sach-khuyen-mai');
        Route::get('/danh-sach-bao-cao',[QuanLyBaoCaoController::class,'getView'])->name('danh-sach-bao-cao');
    });

    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardKH'])->name('khach-hang-home');
    });

    Route::group(['prefix' => '/admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardSAdmin'])->name('admin-home');

    });
});



