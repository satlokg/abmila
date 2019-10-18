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
use App\Models\Category;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;
use App\Models\State;

class ListController extends Controller
{
    Public function businessList(){
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all(); 
        $states=State::all(); 
    	return view('user.list.business',compact('cities','areas','pincodes','states'));
    }

    Public function businessPost(Request $r){ dd($r->all());
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
                    $states=State::all(); 
                    return view('user.list.businessList',compact('cities','areas','pincodes','listing','contact','states'));
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
        $cats = Category::all();
        $key = $request->key;
          $results = Listingkeyword::whereHas('listing', function ($query) {
                        $query->where('status', '=', 1);
                        $query->whereHas('lead', function ($query1) {
                            $query1->orderBy('amount','desc');
                        });
                    })->where('keyword',$request->key)->get();
          //dd($results);
        return view('user.list.search',compact('results','cats','key'));
    }
    public function leadUserPost(Request $request)
    {
        //dd($request->all());
       $results = Listingkeyword::whereHas('listing', function ($query) {
                        $query->where('status', '=', 1);
                        $query->limit(7);
                        $query->whereHas('lead', function ($query1) {
                            $query1->orderBy('amount','desc');
                            $query1->whereNotNull('amount');
                        });
                    })->where('keyword',$request->key)->with('listing.lead','listing.contact')->get();
       //dd($results);

       foreach ($results as $key => $listing) {
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->list_title = $listing->business_name; dd($obj);
           Mail::to($listing->contact->email)->send(new LeadMail($obj));
       }
       
        return view('user.list.search',compact('results','cats'));
    }
     public function businessListEdit($id)
    {
        $cats = Category::all();
        $listing = Listing::find($id);
        $cities=City::all();
        $areas=Area::all();
        $pincodes=Pincode::all();
        $states=State::all(); 
        return view('user.list.businessListEdit',compact('cities','areas','pincodes','listing','contact','cats','states'));
    }
    



    ///////ajax
    public function ajax($action=null,$id=null){ //dd($action);
        switch($action){
            case "getPincode": 
               $item=Area::find($id);
                        $html= '<option value="'.$item->pincode->id.'">'.$item->pincode->pincode.'</option>';
                    
              echo $html;
            break;
              
        }

    }
}
