<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'list_id','title','p_name','designation','email','phone','landline','fax','website'

    ];
}
