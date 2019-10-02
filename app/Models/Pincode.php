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

    public static function boot() {
        parent::boot();

        static::deleting(function($pincode) { // before delete() method call this
             $pincode->areas()->delete();
             // do the rest of the cleanup...
        });
    }
}
