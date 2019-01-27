<?php

namespace App\Http\Controllers;

//use DB;
use Illuminate\Http\Request;
//use Illuminate\Routing\redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session; //added by hassy008
session_start();

class socialController extends Controller
{
    public function addSocialMedia(){

    	$all_social_account=DB::table('social')
    	             ->first();
    	$social_media=view('admin.social.update-social')
    				->with('all_social_account', $all_social_account);
    	
    	return view('admin.master')
    			->with('mainContent',$social_media);
    }

    public function saveSocialContact(Request $request){
    	$data=array();
    	$data['fb']=$request->fb;
    	$data['tw']=$request->tw;
    	$data['ln']=$request->ln;
    	$data['gp']=$request->gp;
    	$data['yt']=$request->yt;
    

    	DB::table('social')	
    	    ->update($data);

    	//Session::put('message','Category Save Successfully');
    	/*$social_media=view('admin.social.update-social');
    				//->with('all_social_account', $all_social_account);
    	
    	return view('admin.master')
    			->with('mainContent',$social_media);*/
      	Session::put('message','Social Account Save Successfully');			
    	return redirect::to('/social');		
    }



    
}
