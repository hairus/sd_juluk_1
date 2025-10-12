<?php

namespace App\Http\Controllers;

use App\Models\pelanggaran_siswa;
use App\Models\penanganan_tatib;
use App\Models\Siswa;
use App\Models\ta;
use App\Models\tatib;
use Illuminate\Http\Request;

class PelanggaranSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        $tatibs = tatib::all();
        $penanganans = penanganan_tatib::all();
        $pelanggarans = pelanggaran_siswa::all();

        return view('pelanggaran.index', compact('siswas', 'tatibs', 'penanganans', 'pelanggarans'));
    }

    public function getPen(Request $request)
    {
        $pens = penanganan_tatib::where('tatib_id', $request->id)->get();

        return view('pelanggaran.getPens', compact('pens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ta = ta::where('aktif', true)->first();
        $sim = pelanggaran_siswa::create([
            "siswa_id" => $request->siswa_id,
            "tatib_id" => $request->pelanggaran,
            "pen_id" => $request->penanganan,
            "catatan" => $request->catatan,
            "ta_id" => $ta->id,
            "guru_id" => auth()->user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggaran_siswa $pelanggaran_siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggaran_siswa $pelanggaran_siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelanggaran_siswa $pelanggaran_siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggaran_siswa $pelanggaran_siswa)
    {
        //
    }

    public function del($id)
    {
        pelanggaran_siswa::where('id', $id)->delete();

        return back();
    }
}
