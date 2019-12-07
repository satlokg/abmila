<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Zone;
use App\Models\Banner;
use App\Models\File;

class AdvertismentController extends Controller
{
    public function __construct()
    {
    	
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
    	$banners = Banner::all();
        return view('admin.advertisment.index', compact('banners'));
    }
    public function add()
    {
    	$categories=Category::all();
    	$zones=Zone::all();
        return view('admin.advertisment.advertismentForm', compact('categories','zones'));
    }
    public function post(Request $r)
    {
    	$this->validate($r,[
		                'file_upload' => 'file|mimes:jpg,PNG,JPEG,jpeg,JPG|max:2048',
					            ]);
    	$banner= new Banner();
    	$banner->category_id = $r->category_id;
    	$banner->subcategory_id = $r->subcategory_id;
    	$banner->zone_id = $r->zone_id;
    	$banner->title = $r->title;
    	$banner->description = $r->description;
    	$banner->url = $r->url;
    	$banner->save();
    	if($r->hasfile('filenames'))
         {
            foreach($r->file('filenames') as $file)
            {
                // $name=$file->getClientOriginalName();
                // $file->move(public_path().'/files/', $name);
              $destinationPath = public_path('upload_file'); 
              $filepath =$destinationPath.'/'. File::sanitize($file->getClientOriginalName());
              $fileinfo = pathinfo(File::generateFilename($filepath));
              $imageName= $fileinfo['basename'];
              $file->move($destinationPath,$imageName);
                $f= new File();
                 $f->filepath=$imageName;
                 $f->banner_id=$banner->id;
                 $f->save(); 
            }
         }
         if($banner){
         	$notification = array(
                        'message' => 'Banner successfully Aded', 
                        'alert-type' => 'success'
                    );
         }else{
         	$notification = array(
                        'message' => 'Banner not successfully Aded', 
                        'alert-type' => 'error'
                    );
         }
         return back()->with($notification);
    }

    public function view($id=null)
    {
    	if($id){
    		$categories=Category::all();
    	    $zones=Zone::all();
    		$banner = Banner::find($id);
        return view('admin.advertisment.view', compact('banner','categories','zones'));
    }else{
    	$notification = array(
                        'message' => 'Something went wrong', 
                        'alert-type' => 'success'
                    );
        return back()->with($notification);
    }
    	
    }

    public function delete($id=null)
    {
    	$banners = Banner::find($id)->delete();
    	$notification = array(
                        'message' => 'Banner successfully Deleted', 
                        'alert-type' => 'success'
                    );
        return back()->with($notification);
    }
}
