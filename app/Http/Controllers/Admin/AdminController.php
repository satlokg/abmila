<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Subcategory;
use App\Models\Admin;
use Auth;
use Hash;


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

    public function users()
    {
      $users=Admin::where('role','!=',1)->get();
        return view('admin.users.user',compact('users'));
    }

   public function usersForm()
    {
        return view('admin.users.userform');
    }
    public function usersEdit($id)
    {
        $user= Admin::where('id', $id)->first();
        return view('admin.users.useredit',compact('user'));
    }
    public function usersdelete($id)
    {
        $user= Admin::where('id', $id)->delete();
        $notification = array(
                        'message' => 'User Deleted successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    }
    public function usersPost(Request $r)
    {
       
      
        if($r->id){
            $admin= Admin::find($r->id);
        }else{
            $admin= new Admin();
        }
      $admin->firstname=$r->firstname;
      $admin->role=$r->role;
      $admin->lastname=$r->lastname;
      $admin->email=$r->email;
      $admin->address=$r->address;
      if($r->password){
        $admin->password=Hash::make($r->password);
      }
      
      $rslt=$admin->save();
      if($rslt){
         $notification = array(
                        'message' => 'User added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
      }
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
