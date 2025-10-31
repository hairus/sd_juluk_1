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



Route::get('/admin/dg', [App\Http\Controllers\adminController::class, 'index'])->name('admin.dg');
Route::get('/admin/ds', [App\Http\Controllers\adminController::class, 'ds'])->name('admin.ds');
Route::post('/admin/ig', [App\Http\Controllers\adminController::class, 'ig']);
Route::post('/admin/is', [App\Http\Controllers\adminController::class, 'is']);
Route::get('/admin/del/{id}', [App\Http\Controllers\adminController::class, 'delGuru']);
Route::get('/admin/delSis/{id}', [App\Http\Controllers\adminController::class, 'delSiswa']);
Route::post('/admin/addMapel', [App\Http\Controllers\adminController::class, 'addMapel']);
Route::get('/admin/delMapel/{id}', [App\Http\Controllers\adminController::class, 'delMapel']);
Route::post('/admin/addGm', [App\Http\Controllers\adminController::class, 'addGm']);
Route::get('/admin/delGm/{id}', [App\Http\Controllers\adminController::class, 'delGm']);


Route::get('/admin/manPem', [App\Http\Controllers\adminController::class, 'manPem']);
Route::get('/admin/manDpl', [App\Http\Controllers\adminController::class, 'manDpl']);
Route::post('/admin/addCp', [App\Http\Controllers\adminController::class, 'addCp']);
Route::get('/admin/delCp/{id}', [App\Http\Controllers\adminController::class, 'delCp']);

Route::post('/admin/getCp', [App\Http\Controllers\adminController::class, 'getCp']);
Route::post('/admin/addTp', [App\Http\Controllers\adminController::class, 'addTp']);
Route::post('/admin/addKegiatan', [App\Http\Controllers\adminController::class, 'addKegiatan']);

Route::get('/guru/profile', [App\Http\Controllers\GuruController::class, 'profil']);
Route::get('/guru/pembelajaran', [App\Http\Controllers\GuruController::class, 'pembelajaran']);
Route::post('/guru/getCp', [App\Http\Controllers\GuruController::class, 'getCp']);
Route::post('/guru/getTp', [App\Http\Controllers\GuruController::class, 'getTp']);
Route::post('/guru/getDl', [App\Http\Controllers\GuruController::class, 'getDl']);
Route::post('/guru/getKeg', [App\Http\Controllers\GuruController::class, 'getKeg']);

Route::post('/guru/sim', [App\Http\Controllers\GuruController::class, 'sim']);
Route::get('/guru/delPem/{id}', [App\Http\Controllers\GuruController::class, 'delPem']);

Route::get('/ks/approve/{id}', [App\Http\Controllers\KsContoller::class, 'approve']);
Route::get('/ks/unprove/{id}', [App\Http\Controllers\KsContoller::class, 'unprove']);
//sampai dsini

























































































































































































































































//x1901
