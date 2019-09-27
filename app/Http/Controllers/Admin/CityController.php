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

    public function zoneForm()
    {
    	$cities= City::all();
        return view('admin.zone.zoneform',compact('cities'));
    }
    public function zonePost(Request $r)
    {
    	$zone= New Zone();
    	$zone->zone_name=$r->zone_name;
    	$zone->city_id=$r->city_id;
    	$rslt=$zone->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Zone added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }

    public function city()
    {
        $cities = City::all();
        return view('admin.zone.city',compact('cities'));
    }
    public function cityForm()
    {
        return view('admin.zone.cityform');
    }

    public function cityPost(Request $r)
    {
    	$city= New City();
    	$city->city_name=$r->city_name;
    	$rslt=$city->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'City added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }

    public function pincode()
    {
        $pincodes = Pincode::all();
        return view('admin.zone.pincode',compact('pincodes'));
    }

    public function pincodeForm()
    {
    	$zones = Zone::all();
        return view('admin.zone.pincodeform',compact('zones'));
    }
    public function pincodePost(Request $r)
    {
    	$pincode= New Pincode();
    	$pincode->pincode=$r->pincode;
    	$pincode->zone_id=$r->zone_id;
    	$rslt=$pincode->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'City added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }

    public function area()
    {
        $areas = Area::all();
        return view('admin.zone.area',compact('areas'));
    }

    public function areaForm()
    {
    	$pincodes = Pincode::all();
        return view('admin.zone.areaform',compact('pincodes'));
    }
    public function areaPost(Request $r)
    {
    	$area= New Area();
    	$area->area_name=$r->area_name;
    	$area->pincode_id=$r->pincode_id;
    	$rslt=$area->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Pincode added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }
}
