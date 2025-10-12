<?php

namespace App\Http\Controllers;

use App\Models\kelas;
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
        $users = User::all();


        return view('home', compact('users'));
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
