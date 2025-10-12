<?php

namespace App\Http\Controllers;

use App\Models\ta;
use Illuminate\Http\Request;

class TaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tas = ta::all();

        return view('ta.index', compact('tas'));
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
        $sim = ta::create([
           "ta"  => $request->ta,
           "smt" => $request->smt,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($ta)
    {
        $tas = ta::all();

        foreach($tas as $tahun){
            $tahun->aktif = false;
            $tahun->save();
        }

        $t = ta::find($ta);
        $t->aktif = true;
        $t->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ta $ta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ta $ta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ta)
    {
        $del = ta::find($ta);
        $del->delete();

        return back();
    }
}
