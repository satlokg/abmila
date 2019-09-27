<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\City;
use App\Models\Pincode;
use App\Models\Area;
class CityController extends Controller
{
    

    public function index()
    {
        $zones = Zone::all();
        return view('admin.zone.index',compact('zones'));
    }

    public function city()
    {
        $cities = City::all();
        return view('admin.zone.city',compact('cities'));
    }

    public function pincode()
    {
        $pincodes = Pincode::all();
        return view('admin.zone.pincode',compact('pincodes'));
    }

    public function area()
    {
        $areas = Area::all();
        return view('admin.zone.area',compact('areas'));
    }
}
