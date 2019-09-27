<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function subcategory()
    {
         return $this->belongsTo(Subcategory::class);
    }
}
