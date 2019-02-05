<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();

class GalleryController extends Controller
{
    public function addImage()
    {

    	$published_category = DB::table('categories')
    		->where('publication_status', 1)
    		->get();

    	$add_gallery = view('admin.gallery.add-gallery')
    		->with('published_category', $published_category);
    	
    	return view('admin.master')
    		->with('mainContent', $add_gallery)	;
    }

     public function saveImage(Request $request)
     {
        $data = array();
        $data['image_name']=$request->image_name ;
        $data['image_description']=$request->image_description ;
        $data['category_id']=$request->category_id ;
        $data['publication_status']=$request->publication_status ;

    $files    = $request->file('gallery_image');
	$filename = $files->getClientOriginalName();
	$picture  =date('His').$filename;
	$image_url='public/gallery_image/'.$picture;
	$destinationPath=base_path().'/public/gallery_image/';
	$success        =$files->move($destinationPath, $picture);

	if ($success) {
    		$data['gallery_image']=$image_url;
        	DB::table('gallery')->insert($data);
		return back();
		} 
	else
        {
		$error=$files->getErrorMessage();
	    }	
    }






}
