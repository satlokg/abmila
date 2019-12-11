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
use App\Models\Category;
use App\Models\Paymentlog;

class ListController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	Public function index(Request $r, $id=null,$action=null){
		//dd($r->all());
		if($action=='Approve'){ //dd($action);
			$business =  Listing::where('id',$id)->update(['status'=>1,'reason'=>$r->reason]); //dd($business);
			// return redirect()->back()->with('success', ['your message,here']);   
		}
		if($action=='Reject'){
			$business =  Listing::where('id',$id)->update(['status'=>0,'reason'=>$r->reason]); //dd($business);
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
        if($r->enable247hour){
            $value['listing_id']=$r->listing_id;
            $value['day']=$r->enable247hour;
            $res=Opening::Create($value);
        }else{
            foreach ($r->opening as $key => $value) {
            $value['listing_id']=$r->listing_id; 
            $res=Opening::Create($value);
            }
        }
            return redirect()->route('admin.businessKey',['listing_id'=>$r->listing_id]);
        
        }
        else{
            //dd($r->all());
            $list=$r->general;
            $contactDetail=$r->contactDetail; //dd($contactDetail);
            $contact = Contact::where('phone',$contactDetail['phone'])->first(); //dd($contact);
            if($r->submit != 'new'){
                if($contact!=null){ 
                    return view('admin.list.businessDisplay',compact('contact','contactDetail','list'));
                }else{
                    $contact= Contact::Create($contactDetail);
                }
            }
                
            $list['contact_id']=$contact->id; //dd($list);
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

     public function businessKeyword(Request $r,$listing_id=null,$cat_id=null){
        $listing_id=$listing_id;
        $categories = Category::all();
        if($cat_id){
            $keys = Keyword::where('category_id',$cat_id)->get();
        }else{
            $keys=[];
        }
          //dd($keys);
        return view('admin.list.keyword',compact('listing_id','keys','categories','cat_id'));
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
        $business =  Listing::where('id',$id)->first(); //dd($business->leads);
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
            $lp=Lead::where('listing_id',$r->listing_id)->first();
            $l=Lead::where('listing_id',$r->listing_id)->update([
                'lead'=>$r->lead,
                'amount'=>$r->amount,
                'totalamount'=>$lp->totalamount+$r->totalamount,
                'remainingamount'=>$lp->remainingamount+$r->totalamount,
            ]);
        }
        if($r->totalamount){
            Paymentlog::Create([
                'listing_id'=>$r->listing_id,
                'amount'=>$r->totalamount,
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