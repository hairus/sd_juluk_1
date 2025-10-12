<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelanggaran_siswa extends Model
{
    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function tatibs()
    {
        return $this->belongsTo(tatib::class, 'tatib_id');
    }

    public function penanganans()
    {
        return $this->belongsTo(penanganan_tatib::class, 'pen_id');
    }

    public function tas()
    {
        return $this->belongsTo(ta::class, 'ta_id');
    }
}
