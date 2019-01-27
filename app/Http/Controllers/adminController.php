<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //added by hassy008
use Illuminate\Support\Facades\Redirect; //added by hassy008
use Session;
session_start();


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminAuthCheck();
        return view('admin.login.login');
    }

    public function adminLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = DB::table('admin')
                ->where('email', $email)
                ->where('password', md5($password))
                ->first();
     /*   echo "<pre>";
        print_r($result);
        exit();*/
        if ($result) {
           Session::put('name',$result->name); 
           Session::put('id', $result->id);
        //  return view('admin.master');  
            return redirect::to('/dashboard');
        } else{
          Session::put('exception','Invalid Email or Password. <br> Try again');  
          return redirect::to('/xyz');
        }
    }
//authentication check
    public function adminAuthCheck(){
        $admin_id = Session::get('id');
      if ($admin_id) {
        return redirect('/dashboard')->send();  
      } else{
        return ;
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
