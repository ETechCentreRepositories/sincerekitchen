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
        $salesPack =  DB::table('salesorder')->where('status_id', 1)->count();
        return view('home')->with($users_id,'users_id')->with('salesPack',$salesPack);
    }
}
