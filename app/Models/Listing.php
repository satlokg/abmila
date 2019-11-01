<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
   
    protected $fillable = [
    	'business_name','description','address1','address2','landmark','city_id','area_id','pincode_id','state_id',	'country_id','contact_id','offer','lead','amount'
    ];
    public function contacts()
    {
        return $this->belongsToMany('App\Models\Contact', 'listing_contact');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function listingkeyword()
    {
        return $this->hasOne(Listingkeyword::class);
    }
    public function listingkeywords()
    {
        return $this->hasMany(Listingkeyword::class);
    }
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
    public function lead()
    {
        return $this->hasOne(Lead::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function iquiry()
    {
        return $this->hasOne(Iquiry::class);
    }

    public function opennings()
    {
        return $this->hasMany(Opening::class);
    }
   
}
