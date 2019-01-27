<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();

class PostController extends Controller
{
    public function addBlog(){

    	$published_category=DB::table('categories')
    					->where('publication_status',1)
    					->get();

    	$add_blog_page=view('admin.post.add-blog')
    					->with('published_category', $published_category);
    	return view('admin.master')
    			->with('mainContent',$add_blog_page);
    }

    public function saveBlog(Request $request)
    {
        $this->validate($request, [
            'blog_title' => 'required',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	$data=array();
    	$data['blog_title']=$request->blog_title;
    	$data['category_id']=$request->category_id;
    	$data['blog_short_description']=$request->blog_short_description;
    	$data['blog_long_description']=$request->blog_long_description;
    
    	$data['author_name']=$request->author_name;
    	$data['publication_status']=$request->publication_status;

/*************[IMAGE UPLOAD]******************/
	/* IT's working
    $files    = $request->file('blog_image');
	$filename = $files->getClientOriginalName();
	//$extension= $files->getClientOriginalExtension();
	$picture  =date('His').$filename;
	$image_url='public/post_image/'.$picture;
	$destinationPath=base_path().'/public/post_image/';
	$success        =$files->move($destinationPath, $picture);*/

//test
    $files    = $request->file('blog_image');
    $filename = $files->getClientOriginalName();
    $extension= $files->getClientOriginalExtension();
    $picture  =date('His').$filename.$extension ;
    $image_url='public/post_image/'.$picture;
    $destinationPath=base_path().'/public/post_image/';
    $success        =$files->move($destinationPath, $picture);

	if ($success) {
    		$data['blog_image']=$image_url;
        	DB::table('blog')->insert($data);
        	return redirect::to('/add-blog')->with('message','Your Post Added Successfully');
		} 
	else
        {
		$error=$files->getErrorMessage();
	    }
  	}



    public function manageBlog(){
    	$all_post=DB::table('blog')
    				->get();

    	$manage_post_page= view('admin.post.manage-blog')
    					->with('all_post_info', $all_post);

    	return view('admin.master')
    			->with('mainContent', $manage_post_page);
    }

    public function unpublishedBlog($id){
    	DB::table('blog')
    		->where('blog_id', $id)
    		->update(['publication_status'=>0]);
    	return redirect::to('/manage-blog');	
    }

    public function publishedBlog($id){
    	DB::table('blog')
    		->where('blog_id', $id)
    		->update(['publication_status'=>1]);
    	return redirect::to('/manage-blog');	
	
    }

    public function deleteBlog($id){
    	DB::table('blog')
    		->where('blog_id', $id)
    		->delete();
    	return redirect::to('/manage-blog');	
    }


    public function editBlog($blog_id){
    	
    	$blog_info = DB::table('blog')
    			->where('blog_id', $blog_id)
    			->first();

    	//pick category name
    	$published_category=DB::table('categories')	
    						->where('publication_status', 1)
    						->get();	
    	$edit_blog_page = view('admin.post.edit-blog')
    					->with('blog_info', $blog_info)
    					->with('published_category', $published_category);

    	return view('admin.master')
    		->with('mainContent', $edit_blog_page);						
    }

    public function updateBlog(Request $request){
    	$data=array();
    	$data['blog_title']=$request->blog_title ;
    	$data['category_id']=$request->category_id;
    	$data['blog_short_description']=$request->blog_short_description;
    	$data['blog_long_description']=$request->blog_long_description;
    
    	$data['author_name']=$request->author_name;
    	$data['publication_status']=$request->publication_status;
    	$blog_id = $request->blog_id;
    	$blog_image= $request->blog_image;

if ($_FILES['blog_image']['name']=='') 
{
	 $data['blog_image']=$request->blog_image;
	// $data['blog_image']=$image_url;
    	DB::table('blog')
    	   ->where('blog_id',$blog_id)
    	   ->update($data);
    return redirect::to('/edit-blog/'.$blog_id)->with('message','Your Post Added Successfully');
}
else{ 
/*************[IMAGE UPLOAD]******************/
	$files    = $request->file('blog_image');
	$filename = $files->getClientOriginalName();
	$extension= $files->getClientOriginalExtension();
	$picture  =date('His').$filename;
	$image_url='public/post_image/'.$picture;
	$destinationPath=base_path().'/public/post_image/';
	$success        =$files->move($destinationPath, $picture);

	if ($success) 
	{
		$data['blog_image']=$image_url;
    	DB::table('blog')
    	   ->where('blog_id',$blog_id)
    	   ->update($data);
    	//unlink($request->blog_image);   
    	return redirect::to('/edit-blog/'.$blog_id)->with('message','Your Post Added Successfully');
		} 
	else{
		$error=$files->getErrorMessage();

		}
	}	
  }


}
