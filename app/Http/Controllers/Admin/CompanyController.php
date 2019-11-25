<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Iquiry;

class CompanyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
       
    }

    public function company($status=null)
    {
        if($status==null || $status=="approved"){
            $businesses =  Listing::where('status',1)->get();
        }else{
            $businesses =  Listing::where('status',0)->get();
        }
        return view('admin.company.company',compact('businesses','status'));
    }
    public function edit($id=null)
    {
        $businesses =  Listing::where('status',1)->get();
        return view('admin.company.company',compact('businesses'));
    }
    public function delete($id=null)
    {
        $businesses =  Listing::where('status',1)->get();
        return view('admin.company.company',compact('businesses'));
    }

    public function distribution($id=null)
    {
        $leads =  Iquiry::where('listing_id',$id)->get();
        return view('admin.company.distribution',compact('leads'));
    }
}
