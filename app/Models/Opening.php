<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    protected $fillable=[
    	'listing_id','day','start','close','status'

    ];
     public function listing()
	    {
	        return $this->belongsTo(Listing::class);
	    }
}
