<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingContact extends Model
{
    //listing_id	contact_id	status
    protected $fillable=[
    	'listing_id','contact_id','status'

    ];
}
