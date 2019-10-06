<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Contact;
use App\Models\Opening;
use App\Models\City;
use App\Models\Area;
use App\Models\Pincode;
use App\Models\Keyword;
use App\Models\Listingkeyword;

class ListController extends Controller
{
    Public function businessList(){
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all(); 
    	return view('user.list.business',compact('cities','areas','pincodes'));
    }

    Public function businessPost(Request $r){
    	if($r->listing_id){
        Contact::where('id',$r->contact_id)->update($r->contact);
        Listing::where('id',$r->listing_id)->update($r->general);
        Opening::where('listing_id',$r->listing_id)->delete();
            foreach ($r->opening as $key => $value) {
            $value['listing_id']=$r->listing_id; 
            $res=Opening::Create($value);
        }
        $listing_id=$r->listing_id;
        $keys = Keyword::all(); 
        return view('user.list.keyword',compact('listing_id','keys'));
        }
        else{
            //dd($r->all());
            $list=$r->general;
            $contactDetail=$r->contactDetail; //dd($contactDetail);
            $contact = Contact::where('email',$contactDetail['email'])->first(); //dd($contact);
            if($r->submit != 'new'){
                if($contact!=null){ 
                    return view('user.list.businessDisplay',compact('contact','contactDetail','list'));
                }else{
                    $contact= Contact::Create($contactDetail);
                }
            }
                
            $list['contact_id']=$contact->id;
            $listing= Listing::Create($list);
            $contact->listings()->sync($listing->id);
                if($list){
                    $cities=City::all();
                    $areas=Area::all();
                    $pincodes=Pincode::all();
                    return view('user.list.businessList',compact('cities','areas','pincodes','listing','contact'));
                }
        }
    }
    public function finalPost(Request $r){
        foreach ($r->keys as $k => $v){ 
            $value['keyword']=$v;
            $value['listing_id']=$r->listing_id;
            $res=Listingkeyword::Create($value);
        }
        return view('user.list.thankyou');
    }

    public function autocomplete(Request $request)
    {
        $search = $request->get('term');
      
          $result = Keyword::where('keyword_name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
    }

    public function list(Request $request)
    {
        $search = $request->get('term');
      
          $result = Listingkeyword::where('keyword',$request->key)->with('listing')->get();
    dd($result);
          return response()->json($result);
    }
    
}
