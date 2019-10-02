<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Subcategory;


class AdminController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function vendors()
    {
        return view('admin.vendor');
    }

    public function ajax($action=null,$id=null){ //dd($action);
        switch($action){
            case "getCategory": 
               $item=Subcategory::where('category_id',$id)->get();
                   $html= '<option value="">Select Sub Category</option>';
                    foreach($item as $items){
                        $html.= '<option value="'.$items->id.'">'.$items->subcategory_name.'</option>';
                    }

              echo $html;
            break;
            case "getCategoryName": 
               $item=Subcategory::where('category_id',$id)->get();
                   $html= '<option value="">Select Sub Category</option>';
                    foreach($item as $items){
                        $html.= '<option value="'.$items->subcategory_name.'">'.$items->subcategory_name.'</option>';
                    }

              echo $html;
            break;
            case "getService": 
               $item=Service::where('subcategory_id',$id)->get();
                   $html= '<option value="">Select Sub Category</option>';
                    foreach($item as $items){
                        $html.= '<option value="'.$items->id.'">'.$items->service_name.'</option>';
                    }

              echo $html;
            break;
            case "getServiceName": 
               $item=Service::where('subcategory_id',$id)->get(); //dd($item);
                   $html= '<option value="">Select Service </option>';
                    foreach($item as $items){
                        $html.= '<option value="'.$items->service_name.'">'.$items->service_name.'</option>';
                    }

              echo $html;
            break;

            case "getBrand": 
               $item=Brand::where('subcategory_id',$id)->get();
                   $html= '<option value="">Select Brand</option>';
                    foreach($item as $items){
                        $html.= '<option value="'.$items->id.'">'.$items->brand_name.'</option>';
                    }

              echo $html;
            break;
            
        }

    }

    
}
