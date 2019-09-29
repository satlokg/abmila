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
    	dd($r->all());
    	 $keyword= New Keyword();
    	 $keyword->category_id=$r->category_id;
    	 $keyword->keyword_name=$r->subcategory_name;
    	 $keyword->save();
    	 $keyword= New Keyword();
    	 $keyword->category_id=$r->category_id;
    	 $keyword->keyword_name=$r->subcategory_name.','.$r->service_name;
    	 $keyword->save();
    	 if(isset($r->brand_name)){
    	 	foreach ($r->brand_name as $key => $value) {
    	 	$keyword= New Keyword();
    	 	$keyword->category_id=$r->category_id;
    	 	$keyword->keyword_name=$value.','.$r->subcategory_name.','.$r->service_name;
    	 	$keyword->save();
    	    }
    	 }
    	 
    	 //dd($keyword);
    	 if($keyword){
    		 $notification = array(
                        'message' => 'Keyword added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->route('admin.keyword')->with($notification);
    	}
    }

}
