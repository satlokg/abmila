<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function pincodes()
    {
        return $this->hasMany(Pincode::class);
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($zone) { // before delete() method call this
             $zone->pincodes()->delete();
             // do the rest of the cleanup...
        });
    }
}
