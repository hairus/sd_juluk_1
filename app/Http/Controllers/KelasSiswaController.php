<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Imports\UsersImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KelasSiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('kelas-siswa.index', compact('siswas'));
    }

    public function show()
    {
       return Excel::download(new SiswaExport, 'invoices.xlsx');
    }

    public function store(Request $request)
    {

        $path = $request->file('file')->store('uploads', 'public');

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'File berhasil diupload: '.$path);
    }

    public function destroy($id)
    {
        $siswas = Siswa::truncate();

        return back();
    }

}
