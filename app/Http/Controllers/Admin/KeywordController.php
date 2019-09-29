<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zone;

class KeywordController extends Controller
{
     public function index()
    {
        $zones = Zone::all();
        return view('admin.zone.index',compact('zones'));
    }

}
