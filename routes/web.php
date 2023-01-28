<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
// use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)->group(function (){
    Route::get('/', 'index')->name('login')->middleware('guest');
    Route::post('/admin', 'AdminAuth')->middleware('guest')->name('authadmin');
    Route::post('/auth' ,'authenticate')->name('auth')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/authadmin','AdminLogin')->middleware('guest')->name('AdminAuth');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/dashboard/users','index')->name('dashboard')->middleware('role:users');
    Route::get('/pinjaman/{id}', 'pinjaman')->name('pinjaman')->middleware('role:users');
    Route::get('/pengembalian/{id}', 'pengembalian')->name('pengembalian')->middleware('role:users');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('dashboard/admin','index')->name('admin')->middleware('role:admin');
    Route::get('/peminjaman','pinjaman')->name('peminjaman-admin')->middleware('role:admin');
    Route::get('/barang','barang')->name('barang')->middleware('role:admin');
    Route::get('/users','user')->name('users')->middleware('role:admin');
});
Route::controller(CrudController::class)->group(function() {
    // barang
    Route::post('/add-barang', 'storeBarang')->name('add-barang')->middleware('role:admin');
    Route::get('/delete-barang/{id}', 'deletedBarang')->name('delete-barang')->middleware('role:admin');
    Route::post('/update-barang', 'updateBarang')->name('update-barang')->middleware('role:admin');
    Route::get('/getDataBarang/{id}','getDataBarang')->middleware('role:admin');
    Route::get('/barang/export','exportBarang' )->middleware('role:admin')->name('exportBarang');
    // users
    Route::get('/getDataUsers/{id}', 'getDataUsers')->middleware('role:admin');
    Route::post('/update-user',  'updateUsers')->middleware('role:admin');
    Route::post('/add-user','storeUser')->middleware('role:admin')->name('add-users');
    Route::get('/delete-user/{id}','deleteUsers')->middleware('role:admin');
    Route::get('/getUsersRole/{id}','getUsersRole')->middleware('role:admin');
    Route::post('/user/editrole', 'ChangeRole')->middleware('role:admin');
});
Route::controller(PeminjamanController::class)->group(function(){
    Route::post('/peminjaman/store' , 'store')->middleware('auth')->name('peminjaman');
    Route::get('/peminjaman/acc/{id}' ,'accPeminjaman')->middleware('role:admin');
    Route::get('/peminjaman/pengembalian/{id}' ,'accPeminjaman')->middleware('role:admin');
    Route::get('/pinjaman/pengembalian/{id}', 'pengembalian' )->middleware('role:admin');
    Route::post('/pinjaman/update/{id}' , 'update')->middleware('role:admin')->name('updatePinjaman');
    Route::post('pinjaman/storeAdmin', 'storeAdmin')->name('storeAdmin')->middleware('role:admin');
    Route::get('/pinjaman/deleted/{id}', 'deleteBarang')->middleware('role:admin');
    Route::get('/pinjaman/getdata/{id}' , 'getData')->middleware('role:admin');
});

