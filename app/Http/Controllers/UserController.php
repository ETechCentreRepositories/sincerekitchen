<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;



class UserController extends Controller{


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user_id = auth()->user()->id;
        $users_id = User::find($user_id);
        $users = Users::All();
     
        return view('employee.employee')->with('users_id',$users_id)->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $users_id = User::find($users_id);
        $users = Users::find($id);
        return view('employee.edit')-> with('users_id',$users_id)-> with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'username'=>'required',
            'password'=>'required',
            'phonenumber' => 'required|min:8|numeric',
            'email' => 'required|email',
         
        ]);
       
        $users = new Users;
        $users->name= Input::get('name');
        $users->email = Input::get('email');
        $users->username = Input::get('username');
        $users->password = Hash:: make(Input::get('password'));
        $users->department = Input::get('department');
        $users->phone_number = Input::get('phonenumber');
        $users->bankdetails = Input::get('bankdetails');
        $users-> save();

        return redirect('/employee');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('inventory')->join('inventory','inventory.product_id','=','products.product_id')
        -> select ('product_name','serial_no','model_no')-> get();
        return redirect('/Inventory');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $Users = Users::find($id);
     return view('employee.edit')-> with('users',$Users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'username'=>'required',
            'password'=>'required',
            'phonenumber' => 'required|min:8|numeric',
            'email' => 'required|email',
         
        ]);
       
        $users = Users::find($id);
        $users->name = $request-> input('name');
        $users->email = $request-> input('email');
        $users->department = $request-> input('department');
        $users->username = $request-> input('username');
        $users->phone_number = $request-> input('phonenumber');
        $users->bankdetails = $request->input('bankdetails');
        $users->save();


        return redirect('/employee');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $users= Users::find($id);
        $users->delete();
        return redirect('/employee')->with('success','Post Removed');
    }

       /**

     * Create a new controller instance.

     *

     * @return void

     */


// public function getInventory(){

//     $inventory = Inventory:: 
//     select('product_name','serial_no','model_no','stock_in','stock_out','image')->get()->toArray();

//     return response($inventory);


// }



}

