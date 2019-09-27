<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function pincode()
    {
        return $this->belongsTo(Pincode::class);
    }
}
