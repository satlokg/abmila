<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Keyword;
use App\Models\Category;
use Hash;

class Listing extends Model
{
   
    protected $fillable = [
    	'business_name','description','address1','address2','landmark','city_id','area_id','pincode_id','state_id',	'country_id','contact_id','offer','lead','amount','listinguuid'
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
   public function getcategory($key){
        $k=Keyword::where('keyword_name',$key)->first();
        $c=Category::find($k->category_id);
        return $c->category_name;
        //dd($k->category_id);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->generateConfirmationCode();
        });
    }
 protected function generateConfirmationCode()
    {
        $this->attributes['listinguuid'] = Hash::make( $this->id );

        if( is_null($this->attributes['listinguuid']) )
            return false; // failed to create listinguuid
        else 
            return true;
    }
}
