<?php

namespace App\Http\Controllers;

use App\Models\cp;
use App\Models\GuruMapel;
use App\Models\kegiatan;
use App\Models\kelas;
use App\Models\tp;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profil()
    {
        return view('guru.profile');
    }

    public function pembelajaran()
    {
        $gms = GuruMapel::where('guru_id', auth()->user()->id)->get();
        $kelas = kelas::all();

        return view('guru.pembelajaran', compact('gms', 'kelas'));
    }

    public function getCp(Request $request)
    {
        $cps = cp::where([
            "mapel_id" => $request->mapel_id,
            "kelas_id" => $request->kelas_id
        ])->get();

        return view('guru.getCp', compact('cps'));
    }

    public function getTp(Request $request)
    {
        $tps = tp::where('cp_id', $request->cp_id)->get();

        return view('guru.getTp', compact('tps'));
    }

    public function getKeg(Request $request)
    {
        $kegs = kegiatan::where('cp_id', $request->cp_id)->get();

        return view('guru.getKeg', compact('kegs'));
    }
}
