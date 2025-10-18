<?php

namespace App\Http\Controllers;

use App\Models\trx_pembelajaran;
use Illuminate\Http\Request;

class KsContoller extends Controller
{
    public function approve($id)
    {
        trx_pembelajaran::find($id)->update([
            'approve' => 1
        ]);

        return back();
    }

    public function unprove($id)
    {
        trx_pembelajaran::find($id)->update([
            'approve' => 0
        ]);

        return back();
    }
}
