<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
