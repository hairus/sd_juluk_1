<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class trx_pembelajaran extends Model
{
    public function mapels()
    {
        return $this->belongsTo(mapel::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function cps()
    {
        return $this->belongsTo(cp::class, 'cp_id');
    }

    public function tps()
    {
        return $this->belongsTo(tp::class, 'tp_id');
    }

    public function kegiatans()
    {
        return $this->belongsTo(kegiatan::class, 'kegiatan_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function dpls()
    {
        return $this->belongsTo(dpl::class, 'dpl_id');
    }
}
