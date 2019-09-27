<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
