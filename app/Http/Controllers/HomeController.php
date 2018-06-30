<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_id= auth()->user()->id;
        $salesid1 =  DB::table('salesorder')->where('status_id', 1)->count();
        $salesid2 =  DB::table('salesorder')->where('status_id', 2)->count();
        $salesid3 =  DB::table('salesorder')->where('status_id', 3)->count();
        $salesid4 =  DB::table('salesorder')->where('status_id', 4)->count();
        $purchaseid1 =  DB::table('purchaseorder')->where('status_id', 1)->count();
        $purchaseid2=  DB::table('purchaseorder')->where('status_id', 2)->count();
        $purchaseid3 =  DB::table('purchaseorder')->where('status_id', 3)->count();
        $purchaseid4 =  DB::table('purchaseorder')->where('status_id', 4)->count();
       
        return view('home')->with($users_id,'users_id')->with('salesid1',$salesid1)->with('salesid2',$salesid2)->with('salesid3',$salesid3)->with('salesid4',$salesid4)
        ->with('purchaseid1',$purchaseid1)->with('purchaseid2',$purchaseid2)->with('purchaseid3',$purchaseid3)->with('purchaseid4',$purchaseid4);
    }
}
