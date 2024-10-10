<?php

use App\Http\Controllers\super_admin\DashBoardController;
use App\Http\Controllers\super_admin\QuanLyTaiKhoanController;
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

    });

    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardKH'])->name('khach-hang-home');
    });

    Route::group(['prefix' => '/admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardSAdmin'])->name('admin-home');

    });
});



