<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iquiry extends Model
{
    protected $fillable=[
    	'email','phone','name','listing_id','contact_id','keyword_name','inquiry_id'
    ];
    public function contact(){
    	return $this->belongsTo(Contact::class);
    }
    public function listing(){
    	return $this->belongsTo(Listing::class);
    }

    public function inquiry(){
    	return $this->belongsTo(Inquiry::class);
    }
}
