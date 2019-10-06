<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listingkeyword extends Model
{
   	protected $fillable=[
   		'listing_id','keyword'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
