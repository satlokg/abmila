<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $fillable = [
	'slug',
	'page_title',
	'description',
	'header',
	'footer'
];
}
