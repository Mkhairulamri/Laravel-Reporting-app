<?php

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

Route::get('/', 'sistem_kerusakan@index')->name('index');
Route::get('/reset-password','sistem_kerusakan@reset');
Route::post('/login','sistem_kerusakan@login')->name('login.sistem');
Route::get('/logout','sistem_kerusakan@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    //admin
    Route::get('admin/','admin@index')->name('admin');
    Route::get('admin/profil', 'admin@profil')->name('profil.admin');
    Route::get('admin/lalu', 'admin@lalu')->name('lalu');

    // manajemen user
    Route::get('/admin/user','admin@show_data');
    Route::post('/admin/edit/{id}','admin@edit');
    Route::post('/admin/simpan', 'admin@simpan')->name('simpan.user');
    Route::get('/admin/hapus/{id}','admin@hapus')->name('hapus.user');
    Route::put('/admin/update/{id}','admin@update')->name('simpan.update');
    Route::get('/admin/reset/{id}','admin@reset');
    
    // manajemen kategori kerusakan
    Route::get('/admin/kategori-kerusakan','admin@kategori_kerusakan')->name('kategori');
    Route::post('/admin/kategori-kerusakan/simpan','admin@simpan_kategori')->name('simpan.kategori');
    Route::get('/admin/kategori/hapus/{id}','admin@hapus_kategori');
    Route::post('/admin/kategori/update/','admin@update')->name('update.kategori');

    //manajemen data kerusakan
    Route::get('admin/data-kerusakan','admin@data_kerusakan')->name('data.laporan');
    Route::get('admin/laporan-kerusakan','admin@laporan_kerusakan');
    Route::post('admin/update_profil','admin@updateprofil')->name('update.profil');
    Route::get('admin/data-kerusakan/verifikasi/{id}','admin@verifikasi')->name('verifikasi');
    Route::get('admin/data-kerusakan/diterima/{id}','admin@diterima');
    Route::get('admin/data-kerusakan/ditolak/{id}','admin@ditolak');
    Route::get('admin/data-kerusakan/selesai/{id}','admin@selesai');
    Route::post('admin/data-kerusakan/cetak','admin@cetak')->name('cetak.laporan');

    //user
    Route::get('user/','user@index')->name('user');
    Route::get('user/lapor-kerusakan','user@lapor_kerusakan')->name('lapor.kerusakan');
    Route::get('user/profil','user@profil')->name('profil.user');
    Route::post('users/update-profil','user@simpan_update')->name('update.profil.user');
    Route::post('user/simpan_laporan','user@simpan_kerusakan')->name('laporan');
    Route::get('user/form-laporan','user@form_lapor')->name('form-laporan');
    Route::get('user/laporan/lihat/{id}','user@lihat');
    Route::get('user/data-laporan/hapus/{id}','user@hapus_laporan');
    Route::get('user/laporan/ubah/{id}','user@ubah_laporan')->name('ubah_laporan');
    Route::post('user/laporan/simpan-update','sistem_kerusakan@simpan_update')->name('simpan.update.laporan');
});

