<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
