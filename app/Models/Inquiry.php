<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
   protected $fillable=[
    	'email','phone','name','keyword_name'
    ];
    public function iquiry()
    {
        return $this->hasMany(Iquiry::class);
    }
}
