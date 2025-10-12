<?php

namespace App\Providers;

use App\Models\kelas;
use App\Models\pelanggaran_siswa;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        View::composer('layouts.app', function ($view) {
            // hitung di sini
            $siswas      = Siswa::count();
            $gurus       = User::count();
            $kelas       = Kelas::count();
            $pelanggaran = pelanggaran_siswa::count();

            // kirim data ke view
            $view->with(compact('siswas', 'gurus', 'kelas', 'pelanggaran'));
        });
    }
}
