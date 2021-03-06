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

use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Inquiry;
use App\Models\State;
use App\Models\Iquiry;
use App\Models\Lead;
use App\Models\Banner;
use App\Models\Zone;
use Carbon\Carbon;


class ListController extends Controller
{
    Public function businessList(){
    	$cities=City::all();
    	$areas=Area::all();
    	$pincodes=Pincode::all(); 
        $states=State::all(); 
    	return view('user.list.business',compact('cities','areas','pincodes','states'));
    }

    Public function businessPost(Request $r){ //dd($r->all());
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
            return redirect()->route('businessKey',['listing_id'=>$r->listing_id]);
        
        }
        else{
            //dd($r->all());
            $list=$r->general;
            $contactDetail=$r->contactDetail; //dd($contactDetail);
            $contact = Contact::where('phone',$contactDetail['phone'])->first(); //dd($contact);
            if($r->submit != 'new'){
                if($contact!=null){ 
                    return view('user.list.businessDisplay',compact('contact','contactDetail','list'));
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
                    return view('user.list.businessList',compact('cities','areas','pincodes','listing','contact','states','categories'));
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
        return view('user.list.keyword',compact('listing_id','keys','categories','cat_id'));
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

    public function autolocation(Request $request)
    {
        $search = $request->get('term');
      
          $result = Area::where('area_name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
    }

    public function list(Request $request, $cat=null)
    {
        if($cat != null){
          $key = $request->get('term');
          $cats = Category::all();
         
          $cat = Category::where('category_name',$cat)->first(); 
          if($cat){
            $add = Banner::where('category_id',$cat->category_id)->first();
          }else{
            $add =null;
          }

          foreach ($cat->keywords as $key => $value) {
            $result=Listingkeyword::leftjoin('listings','listingkeywords.listing_id','=','listings.id')
            ->where('listingkeywords.keyword',$value->keyword_name);
            $result->where('listings.status', '=', 1)->orderBy('listings.amount','desc');
            if(isset($results)){
              $results->push($result->first());
            }else{
              $results=$result->get();
            }
            
          }
          //$listings=Listing::where('category_id',$cat)->get();
            
          return view('user.list.search',compact('results','cats','key','add'));
        }else{
          $search = $request->get('term');
          $cats = Category::all();
          $key = $request->key;
          $location = $request->location;
          if($location){
            $area=Area::where('area_name',$location)->first();
          }
          $cat = Keyword::where('keyword_name',$key)->first();
          if($cat){
            $add = Banner::where('category_id',$cat->category_id)->first();
          }else{
            $add =null;
          }
          //dd($add);
            // $results = Listingkeyword::whereHas('listing', function ($query) {
            //               $query->where('status', '=', 1);
            //               $query->orderBy('amount','desc');
            //           })->where('keyword',$request->key)->get();
          
            $result=Listingkeyword::leftjoin('listings','listingkeywords.listing_id','=','listings.id')
            ->where('listingkeywords.keyword',$request->key);
            if(isset($area)){
              $result->where('listings.area_id', '=', $area->id);
            }
            $result->where('listings.status', '=', 1)->orderBy('listings.amount','desc');
            $results=$result->get();
          return view('user.list.search',compact('results','cats','key','add'));
          }
        
    }

     public function listSearch(Request $request)
    {
        
    }
    public function leadUserPost(Request $request)
    {
        //dd($request->all());
        $inq= new Inquiry();
          $inq->name=$request->name;
          $inq->email=$request->email;
          $inq->phone=$request->phone;
          $inq->keyword_name=$request->key;
          $inq->save();
       $results = Listingkeyword::whereHas('listing', function ($query) {
                        $query->where('status', '=', 1);
                        $query->orderBy('amount','desc');
                        $query->whereNotNull('amount');
                    
                    })->limit(7)->where('keyword',$request->key)->with('listing.contact')->get();
      
       foreach ($results as $key => $listings) {
        $request->list_title = $listings->listing->business_name; 
           $lead1 = Iquiry::where('listing_id',$listings->listing->id)->whereDate('created_at', Carbon::today())->count();
            Iquiry::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'listing_id'=>$listings->listing->id,
            'contact_id'=>$listings->listing->contact->id,
            'keyword_name'=>$request->key,
            'inquiry_id'=>$inq->id,
            'cost'=>$listings->listing->amount
           ]);
            $data=collect([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'listing_id'=>$listings->listing->id,
            'contact_id'=>$listings->listing->contact->id,
            'keyword_name'=>$request->key
           ]);
           $user=$listings->listing->contact;
            //dd($listings->listing->contact->email);
            if($listings->listing->lead > $lead1){
                $pl=Lead::where('listing_id',$listings->listing->id)->first(); 
                if($pl->totalamount > $pl->remainingamount){
                     Notification::send($user, new ItemNotification($data));
                }
                 $l=Lead::where('listing_id',$listings->listing->id)->update([
                'remainingamount'=>($pl->totalamount-$pl->amount),
                ]);
            }
           
       }
       $key = $request->key;
       $cats = Category::all();
        return view('user.list.search',compact('results','cats','key'));
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
    
public function businessdetail($key=null)
    {
       $id=decrypt($key, 'abmila');
        $listing = Listing::find($id);
        //dd($listing); 
        return view('user.list.businessDetail',compact('listing'));
    }




    ///////ajax
    public function ajax($action=null,$id=null){ //dd($action);
        switch($action){
            case "getPincode": 
               $item=Area::find($id);
                        $html= '<option value="'.$item->pincode->id.'">'.$item->pincode->pincode.'</option>';
                    
              echo $html;

              case "getCategory": 
               $keys = Keyword::where('category_id',$id)->get();
               $html='<option>select</option>';
                                    foreach($keys as $key){
                                        $html.='<option>'.$key->keyword_name.'</option>';
                                    }
                                    
               
              echo $html;
            break;
              
        }

    }
}
