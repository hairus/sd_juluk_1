<?php

namespace App\Http\Controllers;

use App\Models\cp;
use App\Models\dpl;
use App\Models\GuruMapel;
use App\Models\kegiatan;
use App\Models\kelas;
use App\Models\ta;
use App\Models\tp;
use App\Models\trx_pembelajaran;
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
        $kls = GuruMapel::select('kelas_id')->where([
            "guru_id" => auth()->user()->id,
        ])->distinct()->get();
        $pems = trx_pembelajaran::where([
            "guru_id" => auth()->user()->id,
        ])->whereMonth('tgl_pembelajaran', date('m'))->orderBy('created_at', 'DESC')->get();

        return view('guru.pembelajaran', compact('gms', 'pems', 'kls'));
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

    public function sim(Request $request)
    {
        $count_keg = count($request->keg);
        if ($count_keg >= 1) {
            $ta = ta::where('aktif', 1)->first();
            $tanggalFormatted = \Carbon\Carbon::createFromFormat('m/d/Y', $request->tgl)->format('Y-m-d');
            for ($i = 0; $i < $count_keg; $i++) {
                trx_pembelajaran::create([
                    "tgl_pembelajaran" => $tanggalFormatted,
                    "guru_id" => auth()->user()->id,
                    "mapel_id" => $request->mapel,
                    "kelas_id" => $request->kelas_id,
                    "cp_id" => $request->cp,
                    "tp_id" => $request->tp,
                    "kegiatan_id" => $request->keg[$i],
                    "ta_id" => $ta->id,
                    "dpl_id" => $request->dpl,
                ]);
            }
            return back()->with('message', 'Berhasil Input Pembelajaran');
        } else {
            return back()->with('pesan', 'maaf Pemilihan kegiatan kurang dari 3 kegiatan');
        }
    }

    public function delPem($id)
    {
        trx_pembelajaran::find($id)->delete();

        return back();
    }

    public function getDl(Request $request)
    {
        $dls = dpl::all();

        $cek = trx_pembelajaran::where([
            "cp_id" => $request->cp_id
        ])->count();

        $data = trx_pembelajaran::where([
            "cp_id" => $request->cp_id
        ])->first();

        if ($cek >= 1) {
            $dls = dpl::where('id', $data->dpl_id)->get();
            return view('guru.dls', compact('dls'));
        } else {
            return view('guru.dls', compact('dls'));
        }
    }
}
