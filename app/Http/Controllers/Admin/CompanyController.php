<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listing;

class CompanyController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
       
    }

    public function company()
    {
        $businesses =  Listing::where('status',1)->get();
        return view('admin.company.company',compact('businesses'));
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
}
