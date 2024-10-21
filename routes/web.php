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

        //Danh mục
        Route::get('/danh-sach-danh-muc',[QuanLyDanhMucController::class,'getView'])->name('danh-sach-danh-muc');
        Route::post('/add-danh-muc',[QuanLyDanhMucController::class,'addDanhMuc'])->name('add-danh-muc');
        Route::delete('/delete-danh-muc/{id}',[QuanLyDanhMucController::class,'deleteDanhMuc'])->name('delete-danh-muc');
        Route::get('/edit-danh-muc/{id}', [QuanLyDanhMucController::class, 'editDanhMuc'])->name('edit-danh-muc');
        Route::post('/update-danh-muc/{id}', [QuanLyDanhMucController::class, 'updateDanhMuc'])->name('update-danh-muc');

        //Hãng sản xuất
        Route::get('/danh-sach-hang-san-xuat',[QuanLyHangSanXuatController::class,'getView'])->name('danh-sach-hang-san-xuat');
        Route::post('/add-hang-san-xuat',[QuanLyHangSanXuatController::class,'addHangSanXuat'])->name('add-hang-san-xuat');
        Route::delete('/delete-hang-san-xuat/{id}',[QuanLyHangSanXuatController::class,'deleteHangSanXuat'])->name('delete-hang-san-xuat');
        Route::get('/edit-hang-san-xuat/{id}', [QuanLyHangSanXuatController::class, 'editHangSanXuat'])->name('edit-hang-san-xuat');
        Route::post('/update-hang-san-xuat/{id}', [QuanLyHangSanXuatController::class, 'updateHangSanXuat'])->name('update-hang-san-xuat');

        //Sản phẩm
        Route::get('/danh-sach-san-pham',[QuanLySanPhamController::class,'getView'])->name('danh-sach-san-pham');
        Route::post('/add-san-pham',[QuanLySanPhamController::class,'addSanPham'])->name('add-san-pham');
        Route::get('/edit-san-pham/{id}', [QuanLySanPhamController::class, 'editSanPham'])->name('edit-san-pham');
        Route::post('/update-san-pham/{id}', [QuanLySanPhamController::class, 'updateSanPham'])->name('update-san-pham');
        Route::delete('/delete-san-pham/{id}',[QuanLySanPhamController::class,'deleteSP'])->name('delete-san-pham');


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



