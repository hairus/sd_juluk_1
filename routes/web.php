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
