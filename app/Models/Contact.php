<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'title','p_name','designation','email','phone','landline','fax','website'

    ];
    public function listings()
    {
        return $this->belongsToMany('App\Models\Listing', 'listing_contact');
    }
    public function listing()
    {
        return $this->hasMany(Listing::class);
    }
}
