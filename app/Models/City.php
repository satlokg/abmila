<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function listings()
    {
        return $this->hasMany(Listings::class);
    }
 public function listing()
    {
        return $this->hasOne(Listing::class);
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($city) { // before delete() method call this
             $city->zones()->delete();
             // do the rest of the cleanup...
        });
    }
}
