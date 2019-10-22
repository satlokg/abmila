<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;
use App\Models\Rating;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notify(){
         $user= User::all();
         $data=collect([
            'title' => "this is tilte of notification",
            'body' => "this is body of notification"
            ]);
            Notification::send($user, new ItemNotification($data));
            return view('home');
    }

    public function rating(Request $r){
          $this->validate($r, [
            'phone' =>  'unique:ratings',
            ]);
            Rating::create([
                'listing_id'=> $r->listing_id,
                'rate'=> $r->rate,
                'name'=> $r->name,
                'phone'=> $r->phone,
                'msg'=> $r->msg,
            ]);
            return redirect()->back();
    }
}
