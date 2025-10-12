<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penanganan_tatib extends Model
{
    public function tatibs()
    {
        return $this->belongsTo(tatib::class, 'tatib_id');
    }
}
