<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentlog extends Model
{
    protected $fillable=[
    	'listing_id','amount'
    ];
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
