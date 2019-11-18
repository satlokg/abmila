<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Lead;
use App\Models\State;
use App\Models\Inquiry;
use DB;

class ListController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	Public function index($id=null,$action=null){
		
		if($action=='Approve'){ //dd($action);
			$business =  Listing::where('id',$id)->update(['status'=>1]); //dd($business);
			// return redirect()->back()->with('success', ['your message,here']);   
		}
		if($action=='Reject'){
			$business =  Listing::where('id',$id)->update(['status'=>0]); //dd($business);
			// return redirect()->back()->with('success', ['your message,here']);   
		}
		if($id!=null){
			$business =  Listing::where('id',$id)->first(); //dd($business);
			return view('admin.list.view',compact('business'));
		}
		if($action!=null){}
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all();
    	$businesses =  Listing::all();
    	return view('admin.list.index',compact('businesses','areas','pincodes'));
    }
    Public function businessList(){
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all(); 
        $states=State::all(); 
    	return view('admin.list.business',compact('cities','areas','pincodes','states'));
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
        $keys = Keyword::where('category_id',$r->category_id)->get();
        return view('admin.list.keyword',compact('listing_id','keys'));
        }
        else{
            //dd($r->all());
            $list=$r->general;
            $contactDetail=$r->contactDetail; //dd($contactDetail);
            $contact = Contact::where('email',$contactDetail['email'])->first(); //dd($contact);
            if($r->submit != 'new'){
                if($contact!=null){ 
                    return view('admin.list.businessDisplay',compact('contact','contactDetail','list'));
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
                    $categories = Category::all();
                    return view('admin.list.businessList',compact('cities','areas','pincodes','listing','contact','states','categories'));
                }
        }
    }
    public function finalPost(Request $r){
        foreach ($r->keys as $k => $v){ 
            $value['keyword']=$v;
            $value['listing_id']=$r->listing_id;
            $res=Listingkeyword::Create($value);
        }
        return view('admin.list.thankyou');
    }

    Public function lead(){
       $businesses =  Listing::where('status',1)->get();
        return view('admin.list.lead',compact('businesses'));
    }

    Public function leadadd($id=null,$action=null){
        $business =  Listing::where('id',$id)->first(); //dd($business);
        return view('admin.list.lead_add',compact('business'));
    }
    Public function leadPost(Request $r){ 
        $lead=Lead::where('listing_id',$r->listing_id)->first(); 
        if($lead==null){
            $l=Lead::Create([
                'listing_id'=>$r->listing_id,
                'lead'=>$r->lead,
                'amount'=>$r->amount,
                'totalamount'=>$r->totalamount,
                'remainingamount'=>$r->totalamount,
            ]);
        }else{
            $l=Lead::where('listing_id',$r->listing_id)->update([
                'lead'=>$r->lead,
                'amount'=>$r->amount,
                'totalamount'=>$r->totalamount,
                'remainingamount'=>$r->totalamount,
            ]);
        }

        Listing::where('id',$r->listing_id)->update([
                'lead'=>$r->lead,
                'amount'=>$r->amount
                ]);
        return redirect()->route('admin.lead');
    }
    public function businessListEdit($id)
    {
        $cats = Category::all();
        $listing = Listing::find($id);
        $cities=City::all();
        $areas=Area::all();
        $pincodes=Pincode::all();
        $states=State::all(); 
        return view('admin.list.businessListEdit',compact('cities','areas','pincodes','listing','contact','cats','states'));
    }
     public function inquiry()
    {
        $inquiries=Inquiry::orderBy('id','desc')->get();
        return view('admin.list.inquiry',compact('inquiries'));
    }
}