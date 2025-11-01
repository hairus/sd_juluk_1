<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\GuruMapel;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\pelanggaran_siswa;
use App\Models\siswa;
use App\Models\ta;
use App\Models\trx_pembelajaran;
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
        $cek = address::count();
        $mac = shell_exec('ip link show | grep ether | awk \'{print $2}\' | head -n 1');
        if($cek == 0){
            address::create([
                "mac" => trim($mac),
                "active" => 1
            ]);
            return back();
        }else{
            $ad = address::first();
            if(trim($ad->mac) == trim($mac) && $ad->active == true){
                if (auth()->user()->role == 'admin') {
                    $users = User::all();
                    $siswas = Siswa::all();
                    $mapels = Mapel::all();
                    $gms = GuruMapel::all();
                    $kelas = kelas::all();

                    return view('home', compact('users', 'siswas', 'mapels', 'gms', 'kelas'));

                } else if (auth()->user()->role == 'guru') {
                    return redirect('/guru/profile');
                } else if (auth()->user()->role == 'ks') {
                    $ta = ta::where('aktif', 1)->first();
                    $tgl_skr = date('Y-m-d');
                    $tgl_kemarin = date('Y-m-d', strtotime('-1 day', strtotime($tgl_skr)));
                    $trx = trx_pembelajaran::where([
                        'ta_id' => $ta->id,
                    ])->whereBetween('tgl_pembelajaran', [$tgl_kemarin, $tgl_skr])->orderBy('created_at', 'DESC')->orderBy('approve', 'ASC')->get();

                    return view('ks.index', compact('trx'));
                } else {
                    return abort();
                }
            }else{
                return abort(403);
            }
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
