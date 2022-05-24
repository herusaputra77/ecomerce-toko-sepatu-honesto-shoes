<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminUser;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminOrder;
use App\Http\Controllers\MyakunController;
use App\Http\Controllers\Admin\AdminOngkir;
use App\Http\Controllers\admin\AdminProduk;
use App\Http\Controllers\Admin\AdminBeranda;
use App\Http\Controllers\admin\AdminLaporan;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Admin\AdminPengiriman;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login_user', [AuthController::class, 'login']);
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/add_register', [AuthController::class, 'add_register']);
Route::post('/add_cart', [HomeController::class, 'add_cart']);
Route::post('/cart/update', [CartController::class, 'update_cart']);
Route::post('/search-produk', [HomeController::class, 'search_produk']);


Route::get('/delete-cart/{id}', [HomeController::class, 'delete_cart']);
Route::get('/kategori/{id}', [HomeController::class, 'katagori']);


// checkout
Route::get('/checkout', [CheckoutController::class, 'index']);

//
// akun
Route::get('/my-account', [MyakunController::class, 'index']);
Route::post('/edit-profile', [MyakunController::class, 'edit_profile']);
Route::post('/ganti-password', [MyakunController::class, 'ganti_password']);


//
// ajax
Route::get('/ajax_provinsi/{id}', [MyakunController::class, 'ajax_provinsi']);
Route::get('/ajax_kabupaten/{id}', [MyakunController::class, 'ajax_kabupaten']);

Route::post('/edit_alamat', [MyakunController::class, 'edit_alamat']);

Route::get('/cart', [CartController::class, 'cart']);
Route::post('/jumlah_order', [CartController::class, 'jumlah_order']);
// Pembayaran
Route::get('/pembayaran/{id}', [OrderController::class, 'pembayaran']);
Route::get('/pembayaran-cod/{id}', [OrderController::class, 'pembayaran_cod']);
// terima order
Route::get('/terima-order/{id}', [OrderController::class, 'terima_order']);
Route::post('/update-terima-order', [OrderController::class, 'update_terima_order']);



Route::post('/update-pembayaran', [OrderController::class, 'update_pembayaran']);
Route::post('/update-pembayaran-cod', [OrderController::class, 'update_pembayaran_cod']);


// order
Route::get('/order', [OrderController::class, 'index']);
Route::get('/detail-order/{id}', [OrderController::class, 'detail_order']);
// riwayat order
Route::get('/riwayat-order/{id}', [MyakunController::class, 'detail_order']);
Route::get('/faktur_order/{id}', [MyakunController::class, 'faktur_order']);




Route::post('/add_order', [OrderController::class, 'order']);
// kategori

// Route::get('/add_order', function () {
//     echo 'ada';
// });










Route::get('/app2', function () {
    return view('layouts.app2');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // beranda
    Route::get('beranda', [AdminBeranda::class, 'index']);
    // user
    Route::get('user', [AdminUser::class, 'index']);
    // produk
    Route::get('produk', [AdminProduk::class, 'index']);
    Route::post('add-produk', [AdminProduk::class, 'add_produk']);
    Route::post('edit-produk', [AdminProduk::class, 'edit_produk']);
    Route::get('detail/{id}', [AdminProduk::class, 'detail_produk']);
    Route::post('add-detail', [AdminProduk::class, 'add_detail_produk']);



    Route::get('hapus_produk/{id}', [AdminProduk::class, 'hapus_produk']);
    // kategori
    Route::get('hapus-kategori/{id}', [AdminProduk::class, 'hapus_kategori']);
    Route::post('edit-kategori', [AdminProduk::class, 'edit_kategori']);



    Route::get('kategori', [AdminProduk::class, 'kategori']);
    Route::post('add-kategori', [AdminProduk::class, 'add_kategori']);
    // ongkir
    Route::get('ongkir', [AdminOngkir::class, 'index']);
    Route::post('add-ongkir', [AdminOngkir::class, 'add_ongkir']);
    Route::get('hapus-ongkir/{id}', [AdminOngkir::class, 'hapus_ongkir']);
    // order
    Route::get('data-order', [AdminOrder::class, 'index']);
    Route::get('terima_bukti/{id}', [AdminOrder::class, 'validasi_pembayaran']);
    Route::get('detail-order/{id}', [AdminOrder::class, 'detail_order']);
    // pengiriman
    Route::get('data-kirim', [AdminPengiriman::class, 'index']);
    // laporan

    Route::get('laporan', [AdminLaporan::class, 'index']);
    Route::get('faktur/{id}', [AdminLaporan::class, 'faktur']);
    Route::get('cetak-faktur/{id}', [AdminLaporan::class, 'cetak']);

    // filter
    Route::post('filter_kategori/', [AdminLaporan::class, 'filter_kategori']);
    Route::get('filter_tanggal/', [AdminLaporan::class, 'filter_tanggal']);
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes();
