<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cp extends Model
{
    public function mapels()
    {
        return $this->belongsTo(mapel::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function tas()
    {
        return $this->belongsTo(ta::class, 'ta_id');
    }

    public function tps()
    {
        return $this->hasMany(tp::class, 'cp_id');
    }

    public function kegiatans()
    {
        return $this->hasMany(kegiatan::class, 'cp_id');
    }
}
