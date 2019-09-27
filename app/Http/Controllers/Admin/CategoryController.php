<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Service;

class CategoryController extends Controller
{
    

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function categoryForm()
    {
        return view('admin.category.categoryform');
    }
    public function categoryPost(Request $r)
    {
    	//dd($r->all());
    	$cat= New Category();
    	$cat->category_name=$r->category_name;
    	$rslt=$cat->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Category added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }



    public function subCategory($id=null)
    {
    	if($id==null){
    		$subcategories = Subcategory::all();
    	}else{
    		$subcategories = Subcategory::where('category_id',$id)->get();
    	}
        
        return view('admin.category.subcategory',compact('subcategories'));
    }

    public function subCategoryForm()
    {
    	$categories = Category::all();
        return view('admin.category.subcategoryform',compact('categories'));
    }
    public function subCategoryPost(Request $r)
    {
    	//dd($r->all());
    	$subcat= New Subcategory();
    	$subcat->subcategory_name=$r->subcategory_name;
    	$subcat->category_id=$r->category_id;
    	$rslt=$subcat->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Category added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }


    public function brand($id=null)
    {
    	if($id==null){
    		$brands = Brand::all();
    	}else{
    		$brands = Brand::where('subcategory_id',$id)->get();
    	}
        
        return view('admin.category.brand',compact('brands'));
    }

    public function brandForm()
    {
    	$categories = Category::all();
    	$subcategories = Subcategory::all();
        return view('admin.category.brandform',compact('subcategories','categories'));
    }
    public function brandPost(Request $r)
    {
    	//dd($r->all());
    	$brand= New Brand();
    	$brand->brand_name=$r->brand_name;
    	$brand->category_id=$r->category_id;
    	$brand->subcategory_id=$r->subcategory_id;
    	$rslt=$brand->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Brand added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }


    public function service()
    {
   
    	$services = Service::all();
        return view('admin.category.service',compact('services'));
    }

    public function serviceForm()
    {
        return view('admin.category.serviceform');
    }
    public function servicePost(Request $r)
    {
    	//dd($r->all());
    	$service= New Service();
    	$service->service_name=$r->service_name;
    	$rslt=$service->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Service added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }
}
