<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
