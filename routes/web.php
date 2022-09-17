<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use GuzzleHttp\Middleware;

//Aadmin page
Route::prefix('admin')->group(function () {
    //middlewire/ login admin
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginform']);
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginform'])->name('admin.login');
    Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.home');
    Route::get('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout')->middleware('adminMiddle');
    //user
    Route::get('/user', [Admin\UserController::class, 'user'])->name('admin.user');
    Route::get('/user/filter', [Admin\UserController::class, 'filter'])->name('admin.filter');
    Route::get('/user/create', [Admin\UserController::class, 'create'])->name('admin.create');
    Route::post('/user/simpan', [Admin\UserController::class, 'store'])->name('admin.simpan');
    Route::get('/user/update/{id}', [Admin\UserController::class, 'edit'])->name('admin.edit');
    Route::post('/user/edit/{id}', [Admin\UserController::class, 'update'])->name('admin.update');
    Route::get('/user/delete/{id}', [Admin\UserController::class, 'destroy'])->name('admin.delete');
    //product
    Route::get('/product', [Admin\ProductController::class, 'product'])->name('product');
    Route::get('/product/create', [Admin\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/simpan', [Admin\ProductController::class, 'store'])->name('product.simpan');
    Route::get('/product/edit/{id}', [Admin\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/detail/{id}', [Admin\ProductController::class, 'detail'])->name('product.detail');
    Route::post('/product/update/{id}', [Admin\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [Admin\ProductController::class, 'destroy'])->name('product.delete');
    //transaksi
    Route::get('/transaksi', [Admin\TransaksiController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi/{id}', [Admin\TransaksiController::class, 'status'])->name('transaksi.status');
    Route::get('/transaksi/batal/{id}', [Admin\TransaksiController::class, 'batal'])->name('transaksi.batal');
    Route::post('/transaksi/resi/{id}', [Admin\TransaksiController::class, 'resi'])->name('transaksi.resi');
});


Auth::routes(['verify' => true]);
//user pages
Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/jenis/{jenisId}', 'product-jenis')->name('products.jenis');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang')->middleware('auth');
Route::livewire('/checkout', 'checkout')->name('checkout')->middleware('auth');
Route::livewire('/history', 'history')->name('history')->middleware('auth');
Route::livewire('/history/{id}', 'history')->name('history.update')->middleware('auth');

//route bukan livewire halaman user
Route::post('/history/{id}', [Admin\PembayaranController::class, 'pembayaran'])->name('pembayaran');
Route::get('/history/detail/{id}', [Admin\PembayaranController::class, 'detail'])->name('pembayaran.detail');
Route::get('/profile', [Admin\ProfileController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile', [Admin\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
