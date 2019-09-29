<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listt;
use App\Models\Contact;
use App\Models\Opening;
use App\Models\City;
use App\Models\Area;
use App\Models\Pincode;

class ListController extends Controller
{
    Public function businessList(){
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all(); 
    	return view('user.list.businessList',compact('cities','areas','pincodes'));
    }

    Public function businessPost(Request $r){
    	$list=$r->general;
    	$contact=$r->contact; //dd($r->opening);
    	$list= Listt::Create($list);
    	$contact['list_id']=$list->id;
    	$contact= Contact::Create($contact);
    	foreach ($r->opening as $key => $value) {
    		$value['list_id']=$list->id; 
    		$res=Opening::Create($value);
    	}
    }
}
