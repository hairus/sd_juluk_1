<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $sim = kelas::create([
           "nama_kelas" => $request->kelas
        ]);

        return back();
    }

    public function destroy($id)
    {
        $del = kelas::find($id);
        $del->delete();

        return back();
    }
}
