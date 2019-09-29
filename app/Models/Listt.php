<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listt extends Model
{
    protected $table = "lists";
    protected $fillable = [
    	'business_name','description','address1','address2','landmark','city_id','area_id','pincode_id','state_id',	'country_id'	
    ];
}
