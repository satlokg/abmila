<?php

namespace App\Models;
use App\Models\Keyword;
use App\Models\Category;
use App\Models\Opening;
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
    public function getcategory($key){
    	$k=Keyword::where('keyword_name',$key)->first();
    	$c=Category::find($k->category_id);
    	return $c->category_name;
    	//dd($k->category_id);
    }
    public function getallkey($id){
    	$k=self::where('listing_id',$id)->get();
    	return $k;
    	//dd($k->category_id);
    }
    public function getday($id){
    	$k=Opening::where('listing_id',$id)
    	->where('day',date("l"))
    	->first();
    	return 'Open '.$k->start.'- Close '.$k->close;
    	//dd($k->category_id);
    }

}
