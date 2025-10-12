<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tatib extends Model
{
    public function penanganans()
    {
        return $this->hasMany(penanganan_tatib::class, 'tatib_id');
    }
}
