<?php

namespace App\Http\Controllers;

use App\Models\GuruMapel;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\pelanggaran_siswa;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $users = User::all();
            $siswas = Siswa::all();
            $mapels = Mapel::all();
            $gms = GuruMapel::all();
            $kelas = kelas::all();

        return view('home', compact('users', 'siswas', 'mapels', 'gms', 'kelas'));
        }else{
            return  redirect('/guru/profile');
        }

    }

    public function logout()
    {
        Auth::logout();

//        // invalidate session biar aman
//        $request->session()->invalidate();
//
//        // regenerate CSRF token
//        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
