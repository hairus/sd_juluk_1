<?php

use App\Http\Controllers\TaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

// setup kelas
Route::resource('/kelas',\App\Http\Controllers\KelasController::class);
Route::resource('/ta',TaController::class);
Route::get('/ta/del/{id}',[TaController::class, 'destroy']);
Route::resource('/tatib',\App\Http\Controllers\TatibController::class);
Route::post('/tatib/add',[\App\Http\Controllers\TatibController::class, 'buyik']);
// setup kelas siswa
Route::resource('/kelas-siswa',\App\Http\Controllers\KelasSiswaController::class);


//pelanggaran
Route::resource('/pelanggaran-siswa',\App\Http\Controllers\PelanggaranSiswaController::class);
Route::post('/pelanggaran-siswa/getPen',[\App\Http\Controllers\PelanggaranSiswaController::class, 'getPen']);
Route::get('/pelanggaran-siswa/del/{id}',[\App\Http\Controllers\PelanggaranSiswaController::class, 'del']);



Route::get('/admin/dg', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dg');
Route::get('/admin/ds', [App\Http\Controllers\AdminController::class, 'ds'])->name('admin.ds');
Route::post('/admin/ig', [App\Http\Controllers\AdminController::class, 'ig']);
Route::post('/admin/is', [App\Http\Controllers\AdminController::class, 'is']);
Route::get('/admin/del/{id}', [App\Http\Controllers\AdminController::class, 'delGuru']);
Route::get('/admin/delSis/{id}', [App\Http\Controllers\AdminController::class, 'delSiswa']);
Route::post('/admin/addMapel', [App\Http\Controllers\AdminController::class, 'addMapel']);
Route::get('/admin/delMapel/{id}', [App\Http\Controllers\AdminController::class, 'delMapel']);
Route::post('/admin/addGm', [App\Http\Controllers\AdminController::class, 'addGm']);
Route::get('/admin/delGm/{id}', [App\Http\Controllers\AdminController::class, 'delGm']);


Route::get('/admin/manPem', [App\Http\Controllers\AdminController::class, 'manPem']);
Route::post('/admin/addCp', [App\Http\Controllers\AdminController::class, 'addCp']);
Route::get('/admin/delCp/{id}', [App\Http\Controllers\AdminController::class, 'delCp']);

Route::post('/admin/getCp', [App\Http\Controllers\AdminController::class, 'getCp']);
Route::post('/admin/addTp', [App\Http\Controllers\AdminController::class, 'addTp']);
Route::post('/admin/addKegiatan', [App\Http\Controllers\AdminController::class, 'addKegiatan']);

Route::get('/guru/profile', [App\Http\Controllers\GuruController::class, 'profil']);
Route::get('/guru/pembelajaran', [App\Http\Controllers\GuruController::class, 'pembelajaran']);
Route::post('/guru/getCp', [App\Http\Controllers\GuruController::class, 'getCp']);
Route::post('/guru/getTp', [App\Http\Controllers\GuruController::class, 'getTp']);
Route::post('/guru/getKeg', [App\Http\Controllers\GuruController::class, 'getKeg']);

Route::post('/guru/sim', [App\Http\Controllers\GuruController::class, 'sim']);
Route::get('/guru/delPem/{id}', [App\Http\Controllers\GuruController::class, 'delPem']);

Route::get('/ks/approve/{id}', [App\Http\Controllers\KsContoller::class, 'approve']);
Route::get('/ks/unprove/{id}', [App\Http\Controllers\KsContoller::class, 'unprove']);
//sampai dsini

