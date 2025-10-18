<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
