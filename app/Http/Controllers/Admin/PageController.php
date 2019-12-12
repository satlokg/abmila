<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Subscriber;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index',compact('pages'));
    }

    public function pageForm()
    {
        return view('admin.page.pageform');
    }
    public function pagePost(Request $r)
    {
    	//dd($r->all());
    	$page= New Page();
    	$page->slug=$r->slug;
    	$page->page_title=$r->page_title;
    	$page->description=$r->description;
    	$page->header=$r->header;
    	$page->footer=$r->footer;
    	$rslt=$page->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Page added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }


    public function pageEdit($id){
        if($id != null){
            $pages = Page::find($id);
            //dd($banners);
        }
        return view('admin.page.page_edit',compact('pages'));
    }

    public function pageUpdate(Request $r){
        //dd($r->id);
        $page= Page::find($r->id);
        $page->slug=$r->slug;
        $page->page_title=$r->page_title;
        $page->description=$r->description;
        $page->header=$r->header;
        $page->footer=$r->footer;
        $rslt=$page->save();
        if($rslt){

         return redirect('admin/page')->with('success','Subcategory updated successfully');
        }else{
            return redirect('admin/page')->with('unsuccess','Subcategory update failed !');
        }
    }

    public function pageDelete(Request $request){
        $id = $request->id;
        if (isset($id) && !empty($id)){
            Page::where('id','=',$id)->delete();
          }
    }

    public function subscriber()
    {
        $subscribers = Subscriber::all();
        return view('admin.page.subscriber',compact('subscribers'));
    }

   
    
}
