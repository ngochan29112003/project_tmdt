<?php

use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\khach_hang\QuanLyTaiKhoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'getViewLogin'])->name('index.login'); //Cái này nữa làm trang web khách

Route::get('/register',[RegisterController::class,'getViewRegister'])->name('index.register');
Route::post('/register/add',[RegisterController::class,'addAccount'])->name('add-account');
Route::get('/login',[LoginController::class,'getViewLogin'])->name('index.login');
Route::post('/login',[LoginController::class,'loginAction'])->name('login-action');
Route::get('/logout', [LoginController::class, 'logoutAction'])->name('logout');

Route::group(['prefix' => '/', 'middleware' => 'isLogin'], function () {

    Route::group(['prefix' => '/admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoard'])->name('admin-home');
        Route::get('/danh-sach-quan-ly',[QuanLyTaiKhoanController::class,'getViewDSQuanLy'])->name('DS-quanly');
        Route::get('danh-sach-khac-hang',[QuanLyTaiKhoanController::class,'getViewDSKhachHang'])->name('DS-khachhang');
    });

    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardKH'])->name('khach-hang-home');
    });

    Route::group(['prefix' => '/super-admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardSAdmin'])->name('super-admin-home');

    });
});



