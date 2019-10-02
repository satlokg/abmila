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
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function categoryForm()
    {
        return view('admin.category.categoryform');
    }
    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.categoryedit',compact('category'));
    }
    public function categoryPost(Request $r)
    {
    	//dd($r->all());
        $rescity = Category::where('category_name',$r->category_name)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Category name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
        if($r->id){
            $cat= Category::find($r->id);
        }else{
            $cat= New Category();
        }
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
    public function subCategoryEdit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.category.subcategoryedit',compact('subcategory'));
    }
    public function subCategoryPost(Request $r)
    {
    	//dd($r->all());
        $rescity = Subcategory::where('subcategory_name',$r->subcategory_name)->where('category_id',$r->category_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Subcategory name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
        if($r->id){
            $subcat= Subcategory::find($r->id);
        }else{
            $subcat= New Subcategory();
        }
    	$subcat->subcategory_name=$r->subcategory_name;
    	$subcat->category_id=$r->category_id;
    	$rslt=$subcat->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Subcategory added successfully', 
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

    public function brandEdit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brand = Brand::find($id);
        return view('admin.category.brandedit',compact('subcategories','categories','brand'));
    }
    public function brandPost(Request $r)
    {
    	//dd($r->all());
        $rescity = Brand::where('brand_name',$r->brand_name)->where('category_id',$r->category_id)->where('subcategory_id',$r->subcategory_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Brand name already taken', 
                        'alert-type' => 'error'
                    );
            return redirect()->back()->with($notification);
        }
        if($r->id){
            $brand= Brand::find($r->id);
        }else{
            $brand= New Brand();
        }
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.category.serviceform',compact('subcategories','categories'));
    }
    public function serviceEdit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $service = Service::find($id);
        return view('admin.category.serviceedit',compact('subcategories','categories','service'));
    }
    public function servicePost(Request $r)
    {
    	//dd($r->all());
        $rescity = Service::where('service_name',$r->service_name)->where('category_id',$r->category_id)->where('subcategory_id',$r->subcategory_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Service name already taken', 
                        'alert-type' => 'error'
                    );
            return redirect()->back()->with($notification);
        }
        if($r->id){
            $service= Service::find($r->id);
        }else{
            $service= New Service();
        }
    	$service->service_name=$r->service_name;
        $service->category_id=$r->category_id;
        $service->subcategory_id=$r->subcategory_id;
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
