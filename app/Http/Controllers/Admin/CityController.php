<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\City;
use App\Models\Pincode;
use App\Models\Area;
use App\Models\State;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

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
    public function zoneEdit($id)
    {
        $zone= Zone::where('id', $id)->first();
        return view('admin.zone.zoneedit',compact('zone'));
    }
    public function zonePost(Request $r)
    {
        $rescity = Zone::where('zone_name',$r->zone_name)->where('city_id',$r->city_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Zone name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
    	
        if($r->id){
            $zone= Zone::find($r->id);
        }else{
            $zone= New Zone();
        }
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
        $states = State::all();
        return view('admin.zone.cityform',compact('states'));
    }

    public function cityEdit($id)
    {
        $states = State::all();
        $city = City::where('id', $id)->first();
        return view('admin.zone.cityeditform',compact('states','city'));
    }

    public function cityPost(Request $r)
    {
        // return request()->validate([
        //         'city_name' => 'required', //|unique:cities

        //     ], [
        //         'city_name.required' => 'This city already exist',
        //     ]);
        $rescity = City::where('city_name',$r->city_name)->where('state_id',$r->state_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'City name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
        if($r->id){
            $city= City::find($r->id);
        }else{
            $city= New City();
        }
    	
    	$city->state_id=$r->state_id;
        $city->city_name=$r->city_name;
    	if($city->save()){
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
    public function pincodeEdit($id)
    {
        $pincode = Pincode::where('id', $id)->first();
        return view('admin.zone.pincodeedit',compact('pincode'));
    }
    public function pincodePost(Request $r)
    {
        $rescity = Pincode::where('pincode',$r->pincode)->where('zone_id',$r->zone_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Pincode already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
    	
        if($r->id){
            $pincode= Pincode::find($r->id);
        }else{
            $pincode= New Pincode();
        }
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
    public function areaEdit($id)
    {
        $area = Area::where('id', $id)->first();
        return view('admin.zone.areaedit',compact('area'));
    }
    public function areaPost(Request $r)
    {
        $rescity = Area::where('area_name',$r->area_name)->where('pincode_id',$r->pincode_id)->first();
        if($rescity){
            $notification = array(
                        'message' => 'Area name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
        if($r->id){
            $area= Area::find($r->id);
        }else{
            $area= New Area();
        }
    	$area->area_name=$r->area_name;
    	$area->pincode_id=$r->pincode_id;
    	$rslt=$area->save();
    	if($rslt){
    		 $notification = array(
                        'message' => 'Area name added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
    	}
    }


    public function state()
    {
        $states = State::all();
        return view('admin.zone.state',compact('states'));
    }

    public function stateForm()
    {
        
        return view('admin.zone.stateform');
    }
    public function stateEdit($id)
    {
        $state = State::where('id', $id)->first();
        return view('admin.zone.stateedit',compact('state'));
    }
    public function statePost(Request $r)
    {
        $resstate = State::where('name',$r->name)->first();
        if($resstate){
            $notification = array(
                        'message' => 'State name already taken', 
                        'alert-type' => 'error'
                    );
         return redirect()->back()->with($notification);
        }
        if($r->id){
            $state= State::find($r->id);
        }else{
            $state= New State();
        }
        $state->name=$r->name;
        $rslt=$state->save();
        if($rslt){
             $notification = array(
                        'message' => 'State name added successfully', 
                        'alert-type' => 'success'
                    );
         return redirect()->back()->with($notification);
        }
    }
}
