<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Category;
use App\Models\Service;
use App\Models\Brand;
use App\Models\Subcategory;
use Redirect;

class KeywordController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function index()
    {
        $keywords = Keyword::all();
        return view('admin.keyword.index',compact('keywords'));
    }

    public function keywordForm()
    {
    	$categories=Category::all();
    	$subcategories=Subcategory::all();
    	$services=Service::all();
    	$brands=Brand::all();
        return view('admin.keyword.keywordform',compact('categories','services','brands','subcategories'));
    }

    public function keywordPost(Request $r)
    {
    	//dd($r->all());
         $resk = Subcategory::where('id',$r->subcategory_name)->first(); 
         $key = Keyword::where('keyword_name',$resk->subcategory_name)->first(); 
         if($key == null){
            $keyword= New Keyword();
             $keyword->category_id=$r->category_id;
             $keyword->keyword_name=$resk->subcategory_name;
             $keyword->save();
         }
         $srv = Service::where('id',$r->service_name)->first(); 
         $key1=$resk->subcategory_name.' '.$srv->service_name;
    	 $keys = Keyword::where('keyword_name',$key1)->first();

         if($keys == null){
    	 $keyword= New Keyword();
    	 $keyword->category_id=$r->category_id;
    	 $keyword->keyword_name=$key1;
    	 $keyword->save();
        }

    	 if(isset($r->brand_name)){
    	 	foreach ($r->brand_name as $key => $value) {

                $brnd = Brand::where('brand_name',$value)->first(); 
                $key2=$brnd->name.' '.$resk->subcategory_name.' '.$srv->service_name;
                $keyb = Keyword::where('keyword_name',$key2)->first();

                if($keyb == null){
        	 	$keyword= New Keyword();
        	 	$keyword->category_id=$r->category_id;
        	 	$keyword->keyword_name=$value.' '.$resk->subcategory_name.' '.$srv->service_name;
        	 	$keyword->save();
             }
    	    }
    	 }
    	 
    	 
    	 if(isset($keyword)){
    		 $notification = array(
                        'message' => 'Keyword added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->route('admin.keyword')->with($notification);
    	}
        else{
            $notification = array(
                        'message' => 'Keyword added not successfully', 
                        'alert-type' => 'error'
                    );
         return redirect()->route('admin.keyword')->with($notification);
        }
    }
    public function keywordManual()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $services=Service::all();
        return view('admin.keyword.manual',compact('categories','services','subcategories'));
    }
    public function manualpost(Request $r)
    {

         $resk = Subcategory::where('id',$r->subcategory_name)->first(); 
         $key = Keyword::where('keyword_name',$resk->subcategory_name)->first(); 
         if($key == null){
            $keyword= New Keyword();
             $keyword->category_id=$r->category_id;
             $keyword->keyword_name=$resk->subcategory_name;
             $keyword->save();
         }
         $srv = Service::where('id',$r->service_name)->first(); 
         $key1=$resk->subcategory_name.' '.$srv->service_name;
         $keys = Keyword::where('keyword_name',$key1)->first();

         if($keys == null){
         $keyword= New Keyword();
         $keyword->category_id=$r->category_id;
         $keyword->keyword_name=$key1;
         $keyword->save();
        }

         if(isset($r->keyword_name)){

                $key2=$r->keyword_name.' '.$resk->subcategory_name.' '.$srv->service_name;
                $keyb = Keyword::where('keyword_name',$key2)->first();

                if($keyb == null){
                $keyword= New Keyword();
                $keyword->category_id=$r->category_id;
                $keyword->keyword_name=$r->keyword_name.' '.$resk->subcategory_name.' '.$srv->service_name;
                $keyword->save();
            }
         }
         
         
         if(isset($keyword)){
             $notification = array(
                        'message' => 'Keyword added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->route('admin.keyword')->with($notification);
        }
        else{
            $notification = array(
                        'message' => 'Keyword added not successfully', 
                        'alert-type' => 'error'
                    );
         return redirect()->route('admin.keyword')->with($notification);
        }
    }

}
