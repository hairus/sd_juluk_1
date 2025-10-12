<?php

namespace App\Http\Controllers;

use App\Models\penanganan_tatib;
use App\Models\tatib;
use Illuminate\Http\Request;

class TatibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tatibs = tatib::all();

        return view('tatib.index', compact('tatibs'));
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
        $sim = tatib::create([
           "dimensi" => $request->dimensi,
           "pelanggaran" => $request->pelanggaran,
        ]);

        $sim->penanganans()->create([
            "kat" => $request->penanganan,
            "ket" => "0"
        ]);

        return back();
    }

    public function buyik(Request $request)
    {
        $add = penanganan_tatib::create([
            "kat" => $request->penanganan,
            "ket" => "0",
            "tatib_id" => $request->pelanggaran
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(tatib $tatib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tatib $tatib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tatib $tatib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tatib $tatib)
    {
        //
    }
}
