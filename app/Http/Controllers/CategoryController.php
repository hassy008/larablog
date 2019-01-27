<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect; //added by hassy008
session_start();

class CategoryController extends Controller
{
    
    public function addCategory(){
     //   $this->authCheck();
        $add_category_page=view('admin.category.add-category');

        return view('admin.master')
                ->with('mainContent', $add_category_page);
    }

    public function saveCategory(Request $request){
    	$data=array();
    	$data['category_name']=$request->categoryName;
    	$data['category_description']=$request->categoryDescription;
    	$data['publication_status']=$request->publicationStatus;

    	DB::table('categories')->insert($data);
    	Session::put('message','Category Save Successfully');
    	return redirect::To('/add-category');
    }

    public function manageCategory(){
    	$all_category=DB::table('categories')
    					->get();
    	$manage_category_page=view('admin.category.manage-category')
    						->with('all_category_info', $all_category);
    	return view('admin.master')
    			->with('mainContent', $manage_category_page);
    }

    public function unpublishedCategory($category_id){
    	//echo $category_id;
    	DB::table('categories')
    		->where('category_id', $category_id)
    		->update(['publication_status'=>0]);
    	return Redirect::to('/manage-category');	
    }

    public function publishedCategory($id){
    	DB::table('categories')
    		->where('category_id', $id)
    		->update(['publication_status'=>1]);
    	return redirect::to('/manage-category');	
    }

    public function deleteCategory($id){
    	DB::table('categories') 
    		->where('category_id', $id)
    		->delete();
    	return redirect('/manage-category');	
    }

    public function editCategory($id){
    	$category_edit=DB::table('categories')
    					->where('category_id', $id)
    					->first();

    	$edit_category=view('admin.category.edit-category')
    					->with('category_edit', $category_edit);

    	return view('admin.master')
    			->with('mainContent', $edit_category);				
    }

    public function updateCategory(Request $request){
    	$data=array();
    	$data['category_name']=$request->categoryName;
    	$data['category_description']=$request->categoryDescription;
    	$data['publication_status']=$request->publicationStatus;
    	$category_id=$request->categoryId;

    	DB::table('categories')
    			->where('category_id', $category_id)
    	        ->update($data);
    	//Session::put('message','Category Save Successfully');
    	return redirect::To('/manage-category')->with('message', 'Category Info Updated');
    }

}
