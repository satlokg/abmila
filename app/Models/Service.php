<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function subcategory()
    {
         return $this->belongsTo(Subcategory::class);
    }
}
