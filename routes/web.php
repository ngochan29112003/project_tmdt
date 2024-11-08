<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\khach_hang\ChiTietSanPhamController;
use App\Http\Controllers\khach_hang\GioHangController;
use App\Http\Controllers\khach_hang\DatHangController;
use App\Http\Controllers\khach_hang\ThongTinTaiKhoanController;
use App\Http\Controllers\khach_hang\TraCuuDonHangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\super_admin\PhuongThucThanhToanController;
use App\Http\Controllers\super_admin\QuanLyQuyenAdminController;
use App\Http\Controllers\super_admin\QuanLyBaiDangController;
use App\Http\Controllers\super_admin\QuanLyBaoCaoController;
use App\Http\Controllers\super_admin\QuanLyBinhLuanController;
use App\Http\Controllers\super_admin\TraLoiBinhLuanController;
use App\Http\Controllers\super_admin\QuanLyDanhMucController;
use App\Http\Controllers\super_admin\QuanLyDonHangController;
use App\Http\Controllers\super_admin\QuanLyTTDHController;
use App\Http\Controllers\super_admin\QuanLyHangSanXuatController;
use App\Http\Controllers\super_admin\QuanLyKhuyenMaiController;
use App\Http\Controllers\super_admin\QuanLySanPhamController;
use App\Http\Controllers\super_admin\QuanLyTaiKhoanController;
use App\Http\Controllers\super_admin\QuanLyVanChuyenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[DashBoardController::class,'getViewDashBoardUser'])->name('home-page');
Route::get('/register',[RegisterController::class,'getViewRegister'])->name('index.register');
Route::post('/register/add',[RegisterController::class,'addAccount'])->name('add-account');
Route::get('/login',[LoginController::class,'getViewLogin'])->name('index.login');
Route::post('/login',[LoginController::class,'loginAction'])->name('login-action');
Route::get('/logout', [LoginController::class, 'logoutAction'])->name('logout');

Route::get('/chi-tiet-san-pham/{id}', [ChiTietSanPhamController::class, 'getViewChiTietSP'])->name('chi-tiet-san-pham');

Route::group(['prefix' => '/', 'middleware' => 'isLogin'], function () {
    Route::group(['prefix' => '/super-admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardSuperAdmin'])->name('super-admin-home');

        // Tài khoản
        Route::group(['prefix' => '/tai-khoan'], function () {
            Route::get('/danh-sach',[QuanLyTaiKhoanController::class,'getView'])->name('danh-sach-tai-khoan');
            Route::get('/danh-sach-admin',[QuanLyTaiKhoanController::class,'getViewTaiKhoanAd'])->name('tai-khoan-admin');
            Route::post('/danh-sach-admin/add',[QuanLyTaiKhoanController::class,'addTaiKhoanAd'])->name('tai-khoan-admin-add');            Route::get('/edit/{id}', [QuanLyDanhMucController::class, 'editDanhMuc'])->name('edit-danh-muc');
            Route::get('/danh-sach-admin/edit/{id}', [QuanLyTaiKhoanController::class, 'editTaiKhoanAd'])->name('tai-khoan-admin-edit');
            Route::post('/danh-sach-admin/update/{id}', [QuanLyTaiKhoanController::class, 'updateTaiKhoanAd'])->name('tai-khoan-admin-update');
            Route::delete('/danh-sach-admin/delete/{id}', [QuanLyTaiKhoanController::class, 'deleteTaiKhoanAd'])->name('tai-khoan-admin-delete');
            Route::get('/danh-sach-khach-hang',[QuanLyTaiKhoanController::class,'getViewTaiKhoanKhach'])->name('tai-khoan-khach-hang');
            Route::post('/unlock', [QuanLyTaiKhoanController::class, 'unlockAccount'])->name('unlock.route');
            Route::post('/lock', [QuanLyTaiKhoanController::class, 'lockAccount'])->name('lock.route');
            Route::get('filter-accounts', [QuanLyTaiKhoanController::class, 'filterAccounts'])->name('super-admin.filter-accounts');
        });

        //Phân quyền admin
        Route::group(['prefix' => '/phan-quyen-admin'], function () {
            Route::get('/danh-sach',[QuanLyQuyenAdminController::class,'getView'])->name('danh-sach-phan-quyen-admin');
            Route::get('/danh-sach/{id}',[QuanLyQuyenAdminController::class,'getViewPhanQuyen'])->name('phan-quyen-admin');
            Route::post('/phan-quyen-admin/update', [QuanLyQuyenAdminController::class, 'updatePermissions'])->name('phan-quyen-admin.update');
            Route::post('/phan-quyen-admin/update-single', [QuanLyQuyenAdminController::class, 'updateSinglePermission'])->name('phan-quyen-admin.update-single');
        });

        // Danh mục
        Route::group(['prefix' => '/danh-muc'], function () {
            Route::get('/danh-sach',[QuanLyDanhMucController::class,'getView'])->name('danh-sach-danh-muc');
            Route::post('/add',[QuanLyDanhMucController::class,'addDanhMuc'])->name('add-danh-muc');
            Route::delete('/delete/{id}',[QuanLyDanhMucController::class,'deleteDanhMuc'])->name('delete-danh-muc');
            Route::get('/edit/{id}', [QuanLyDanhMucController::class, 'editDanhMuc'])->name('edit-danh-muc');
            Route::post('/update/{id}', [QuanLyDanhMucController::class, 'updateDanhMuc'])->name('update-danh-muc');
            Route::get('/super-admin/danh-muc/filter', [QuanLyDanhMucController::class, 'filterDanhMuc'])->name('filter-danh-muc');
            Route::get('/export', [QuanLyDanhMucController::class, 'exportDanhMuc'])->name('export-danh-muc');
            Route::post('/hien', [QuanLyDanhMucController::class, 'hienDanhMuc'])->name('hien-danh-muc');
            Route::post('/an', [QuanLyDanhMucController::class, 'anDanhMuc'])->name('an-danh-muc');


        });

        // Hãng sản xuất
        Route::group(['prefix' => '/hang-san-xuat'], function () {
            Route::get('/danh-sach',[QuanLyHangSanXuatController::class,'getView'])->name('danh-sach-hang-san-xuat');
            Route::post('/add',[QuanLyHangSanXuatController::class,'addHangSanXuat'])->name('add-hang-san-xuat');
            Route::delete('/delete/{id}',[QuanLyHangSanXuatController::class,'deleteHangSanXuat'])->name('delete-hang-san-xuat');
            Route::get('/edit/{id}', [QuanLyHangSanXuatController::class, 'editHangSanXuat'])->name('edit-hang-san-xuat');
            Route::post('/update/{id}', [QuanLyHangSanXuatController::class, 'updateHangSanXuat'])->name('update-hang-san-xuat');
            Route::get('/export', [QuanLyHangSanXuatController::class, 'exportHSX'])->name('export-hang-san-xuat');
        });

        // Sản phẩm
        Route::group(['prefix' => '/san-pham'], function () {
            Route::get('/danh-sach',[QuanLySanPhamController::class,'getView'])->name('danh-sach-san-pham');
            Route::post('/add',[QuanLySanPhamController::class,'addSanPham'])->name('add-san-pham');
            Route::get('/edit/{id}', [QuanLySanPhamController::class, 'editSanPham'])->name('edit-san-pham');
            Route::post('/update/{id}', [QuanLySanPhamController::class, 'updateSanPham'])->name('update-san-pham');
            Route::delete('/delete/{id}',[QuanLySanPhamController::class,'deleteSP'])->name('delete-san-pham');
        });

        // Đơn hàng
        Route::group(['prefix' => '/don-hang'], function () {
            Route::get('/danh-sach',[QuanLyDonHangController::class,'getView'])->name('danh-sach-don-hang');
            Route::post('/updateTT/{id}', [QuanLyDonHangController::class, 'updateTTDH'])->name('update-trang-thai-don-hang');
            Route::post('/loc-trang-thai-don-hang', [QuanLyDonHangController::class, 'filterDonHang'])->name('loc-trang-thai-don-hang');
            Route::get('/in-don-hang/{id}',[QuanLyDonHangController::class,'InDH'])->name('in-don-hang');
        });

        //Trạng thái đơn hàng
        Route::group(['prefix' => '/trang-thai-don-hang'], function () {
            Route::get('/danh-sach',[QuanLyTTDHController::class,'getView'])->name('danh-sach-trang-thai-don-hang');
            Route::delete('/delete/{id}',[QuanLyTTDHController::class,'deleteTTDH'])->name('delete-trang-thai-don-hang');

        });

        // Phương thức thanh toán
        Route::group(['prefix' => '/phuong-thuc-thanh-toan'], function () {
            Route::get('/danh-sach',[PhuongThucThanhToanController::class,'getView'])->name('danh-sach-phuong-thuc-thanh-toan');
        });

        // Vận chuyển
        Route::group(['prefix' => '/van-chuyen'], function () {
            Route::get('/danh-sach',[QuanLyVanChuyenController::class,'getView'])->name('danh-sach-van-chuyen');
        });

        // Bài đăng
        Route::group(['prefix' => '/bai-dang'], function () {
            Route::get('/danh-sach',[QuanLyBaiDangController::class,'getView'])->name('danh-sach-bai-dang');
            Route::post('/add',[QuanLyBaiDangController::class,'addBaiDang'])->name('add-bai-dang');
            Route::get('/edit/{id}', [QuanLyBaiDangController::class, 'editBaiDang'])->name('edit-bai-dang');
            Route::post('/update/{id}', [QuanLyBaiDangController::class, 'updateBaiDang'])->name('update-bai-dang');
            Route::delete('/delete/{id}',[QuanLyBaiDangController::class,'deleteBaiDang'])->name('delete-bai-dang');
        });

        // Bình luận
        Route::group(['prefix' => '/binh-luan'], function () {
            Route::get('/danh-sach',[QuanLyBinhLuanController::class,'getView'])->name('danh-sach-binh-luan');
            Route::delete('/delete/{id}',[QuanLyBinhLuanController::class,'deleteBL'])->name('delete-binh-luan');
        });

        //Trả lời bình luận
        Route::group(['prefix' => '/tra-loi-binh-luan'], function () {
            Route::get('/danh-sach',[TraLoiBinhLuanController::class,'getView'])->name('danh-sach-tra-loi-binh-luan');
            Route::post('/add',[TraLoiBinhLuanController::class,'addTraLoi'])->name('add-tra-loi-binh-luan');
            Route::get('/edit/{id}', [TraLoiBinhLuanController::class, 'editTraLoi'])->name('edit-tra-loi-binh-luan');
            Route::post('/update/{id}', [TraLoiBinhLuanController::class, 'updateTraLoi'])->name('update-tra-loi-binh-luan');
            Route::delete('/delete/{id}',[TraLoiBinhLuanController::class,'deleteTL'])->name('delete-tra-loi-binh-luan');
        });

        // Khuyến mãi
        Route::group(['prefix' => '/khuyen-mai'], function () {
            Route::get('/danh-sach',[QuanLyKhuyenMaiController::class,'getView'])->name('danh-sach-khuyen-mai');
            Route::post('/add',[QuanLyKhuyenMaiController::class,'addKhuyenMai'])->name('add-khuyen-mai');
            Route::get('/edit/{id}', [QuanLyKhuyenMaiController::class, 'editKhuyenMai'])->name('edit-khuyen-mai');
            Route::post('/update/{id}', [QuanLyKhuyenMaiController::class, 'updateKhuyenMai'])->name('update-khuyen-mai');
            Route::delete('/delete/{id}',[QuanLyKhuyenMaiController::class,'deleteKM'])->name('delete-khuyen-mai');
        });

        // Báo cáo
        Route::group(['prefix' => '/bao-cao'], function () {
            Route::get('/danh-sach',[QuanLyBaoCaoController::class,'getView'])->name('danh-sach-bao-cao');
            Route::post('/add',[QuanLyBaoCaoController::class,'addBaoCao'])->name('add-bao-cao');
            Route::get('/edit/{id}', [QuanLyBaoCaoController::class, 'editBaoCao'])->name('edit-bao-cao');
            Route::post('/update/{id}', [QuanLyBaoCaoController::class, 'updateBaoCao'])->name('update-bao-cao');
            Route::delete('/delete/{id}',[QuanLyBaoCaoController::class,'deleteBC'])->name('delete-bao-cao');
        });
    });


    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardUser'])->name('khach-hang-home');
        Route::get('/home/tra-cuu-don-hang',[TraCuuDonHangController::class,'getViewTraCuuDonHang'])->name('tra-cuu-don-hang');
        Route::post('/add-binh-luan', [ChiTietSanPhamController::class, 'addBinhLuan'])->name('them-binh-luan');

        // Giỏ hàng
        Route::group(['prefix' => '/gio-hang'], function () {
            Route::get('/', [GioHangController::class, 'getDsGioHang'])->name('gio-hang');
            Route::post('/them', [GioHangController::class, 'addToCart'])->name('them-gio-hang');
            Route::post('/giam-so-luong', [GioHangController::class, 'decreaseQuantity'])->name('gio-hang.giam-so-luong');
            Route::post('/tang-so-luong', [GioHangController::class, 'increaseQuantity'])->name('gio-hang.tang-so-luong');
            Route::post('/xoa-san-pham', [GioHangController::class, 'removeFromCart'])->name('gio-hang.xoa-san-pham');

        });


        //Đơn hàng
        Route::group(['prefix' => '/don-hang'], function () {
            Route::get('/', [DatHangController::class, 'getDonHang'])->name('don-hang');
            Route::post('/thanh-toan', [DatHangController::class, 'thanhToan'])->name('thanh-toan');
        });


        //Account
        Route::group(['prefix'=> '/thong-tin-tai-khoan'], function () {
            Route::get('/', [ThongTinTaiKhoanController::class, 'getViewTaiKhoan'])->name('thong-tin-tai-khoan');
            Route::get('/edit{id}', [ThongTinTaiKhoanController::class, 'editTaiKhoan'])->name('edit-thong-tin-tai-khoan');
            Route::post('/update{id}', [ThongTinTaiKhoanController::class, 'updateTTTaiKhoan'])->name('update-thong-tin-tai-khoan');
        });
    });

    Route::group(['prefix' => '/admin'], function () {
        Route::get('/home',[DashBoardController::class,'getViewDashBoardSAdmin'])->name('admin-home');
    });
});




