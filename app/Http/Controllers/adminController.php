<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use App\Imports\GuruImport;
use App\Imports\SiswaImport;
use App\Models\cp;
use App\Models\dpl;
use App\Models\GuruMapel;
use App\Models\kegiatan;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\ta;
use App\Models\tp;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Excel::download(new GuruExport(), 'guru.xlsx');
    }

    public function ig(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new GuruImport, $request->file('file'));

        return back();
    }

    public function delGuru($id)
    {
        $user = User::find($id);
        $user->delete();

        return back();
    }

    public function ds()
    {
        return Excel::download(new SiswaExport(), 'siswas.xlsx');
    }

    public function is(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return back();
    }

    public function delSiswa($id)
    {
        siswa::find($id)->delete();

        return back();
    }

    public function addMapel(Request $request)
    {
        mapel::create([
            "mapel" => $request->mapel
        ]);

        return back();
    }

    public function delMapel($id)
    {
        mapel::find($id)->delete();

        return back();
    }

    public function addGm(Request $request)
    {
        $ta = ta::where('aktif', 1)->first();
        $count_mapel = count($request->mapel_id);
        $count_kelas = count($request->kelas_id);
        if($count_mapel > 1){
            for ($i = 0; $i < $count_mapel; $i++) {
                GuruMapel::create([
                    "guru_id" => $request->guru_id,
                    "mapel_id" => $request->mapel_id[$i],
                    "kelas_id" => $request->kelas_id[0],
                    "ta_id" => $ta->id,
                ]);
            }
        }else{
            for ($i = 0; $i < $count_kelas; $i++) {
                GuruMapel::create([
                    "guru_id" => $request->guru_id,
                    "mapel_id" => $request->mapel_id[0],
                    "kelas_id" => $request->kelas_id[$i],
                    "ta_id" => $ta->id,
                ]);
            }
        }


        return back();
    }

    public function delGm($id)
    {
        GuruMapel::find($id)->delete();

        return back();
    }

    public function manPem()
    {
        $mapels = mapel::all();
        $kelas = kelas::all();
        $cps = cp::with('mapels', 'kelas', 'tas', 'tps', 'kegiatans')->get();
        $dpls = dpl::all();

        return view('admin.manPem.index', compact('mapels', 'kelas', 'cps', 'dpls'));
    }

    public function addCp(Request $request)
    {
        $ta = ta::where("aktif", 1)->first();
        cp::create([
            "mapel_id" => $request->mapel_id,
            "kelas_id" => $request->kelas_id,
            "ta_id" => $ta->id,
            "smt" => $ta->smt,
            "cp" => $request->cp
        ]);

        return back();
    }

    public function delCp($id)
    {
        $del = cp::find($id);
        $del->delete();

        return back();
    }

    public function getCp(Request $request)
    {
        $cps = cp::where([
            "mapel_id" => $request->mapel_id,
            "kelas_id" => $request->kelas_id,
            "smt" => $request->smt
        ])->get();

        return view('admin.manPem.cp', compact('cps'));
    }

    public function addTp(Request $request)
    {
        tp::create([
            "cp_id" => $request->cp,
            "tp" => $request->tp
        ]);

        return back();
    }

    public function addKegiatan(Request $request)
    {
        kegiatan::create([
            "cp_id" => $request->cp,
            "kegiatan" => $request->kegiatan
        ]);

        return back();
    }
}
