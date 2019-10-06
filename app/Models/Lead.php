<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
    	'lead','amount','listing_id'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
