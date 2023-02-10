<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Danhmuccontroller;
use App\Http\Controllers\Sanphamcontroller;
use App\Http\Controllers\Donhangcontroller;
use App\Http\Controllers\Khachhangcontroller;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\Index;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginadController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Index::class,'home']);
Route::get('/product/{id}',[Index::class,'product']);
route::get('/donhang/{id}',[Index::class,'donhang']);
route::get('/chitiet/{id}',[Index::class,'chitiet']);
route::get('/profiles/{id}',[Index::class,'profiles']);
Route::resource('/register_ad',AdminController::class);
Route::get('login_ad', [Loginadcontroller::class,'index']) ->name('login_admin');
Route::post('login_ad', [Loginadcontroller::class,'store']);


require __DIR__.'/auth.php';
route::resource('/sanpham',Sanphamcontroller::class)->middleware(['can:view_admin']);
route::resource('/danhmuc',Danhmuccontroller::class)->middleware(['can:view_admin']);
route::resource('/khachhang',Khachhangcontroller::class)->middleware(['can:view_admin']);
route::resource('/donhang',Donhangcontroller::class);
route::get('/giohang/{id}',[GiohangController::class,'index']);
route::post('/giohang/store',[GiohangController::class,'store']);
route::get('/delete_cart/{id}',[GiohangController::class,'destroy']);


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->middleware(['can:view_admin'])->name('admin');






