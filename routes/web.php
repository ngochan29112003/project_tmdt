<?php

use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[LoginController::class,'getViewLogin'])->name('index.login');
Route::get('/register',[RegisterController::class,'getViewRegister'])->name('index.register');
Route::get('/dashboard',[DashBoardController::class,'getViewDashBoard'])->name('index.dashboard');
Route::post('/register/add',[RegisterController::class,'addAccount'])->name('add-account');
