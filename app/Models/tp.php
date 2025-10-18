<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tp extends Model
{
    public function cps()
    {
        return $this->belongsTo(cp::class, 'cp_id');
    }
}
