<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   protected $fillable=[
    	'listing_id','rate','name','phone','msg'
    ];
     public function listing()
	    {
	        return $this->belongsTo(Listing::class);
	    }
}
