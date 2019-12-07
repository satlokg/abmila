<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Zone;
use App\Models\Pincode;
use App\Models\Area;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\State;
use App\Models\Country;

class AjaxController extends Controller
{
    public function delete($id,$type){
    	switch ($type) {
    		case 'city':
    			$res=City::where('id',$id)->delete();
    			return $res;
    			break;
    		case 'zone':
    			$res=Zone::where('id',$id)->delete();
    			return $res;
    			break;
    		case 'pincode':
    			$res=Pincode::where('id',$id)->delete();
    			return $res;
    			break;
    		case 'area':
    			$res=Area::where('id',$id)->delete();
    			return $res;
    			break;
    		case 'cat':
    			$res=Category::where('id',$id)->delete();
    			return $res;
    			break;
    		case 'subcat':
    			$res=Subcategory::where('id',$id)->delete();
    			return $res;
    			break;
            case 'state':
                $res=State::where('id',$id)->delete();
                return $res;
                break;
            case 'country':
                $res=Country::where('id',$id)->delete();
                return $res;
                break;

    		default:
    			# code...
    			break;
    	}
    }
}
