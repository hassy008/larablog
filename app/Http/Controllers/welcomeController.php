<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Mail;
use App\User;


class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $published_post=DB::table('blog')
                        ->where('publication_status', 1)
                        ->orderBy('blog_id','desc')
                        ->paginate(3);

        $home=view('frontEnd.home.homeContent')
            ->with('published_post', $published_post);

        return view('frontEnd.master')
                ->with('mainContent', $home);
       // return view('frontEnd.home.homeContent');
    }

    public function contactUs(){
        $contact=view('frontEnd.contact.contact');
        return view('frontEnd.master')
                ->with('mainContent', $contact);
       // return view('frontEnd.contact.contact');
    }

//**********Send message *****************************
    public function postContact(Request $request){
      $this->validate($request, [
        'email'=>'required|email',
        'subject'=>'min:3',
        'message'=>'min:10']);

    $data = array(
            'email'=> $request->email,
            'subject'=> $request->subject,
            'bodyMessage'=> $request->message
            );  
  Mail::send('emails.getemail', $data, function ($message) use ($data){
    $message->from($data['email']);
    $message->to('rummanhasnath@gmail.com');
    $message->subject($data['subject']);

    });

  Session::put('message','Your Message Send Successfully');
  $contact=view('frontEnd.contact.contact');
  return view('frontEnd.master')
                ->with('mainContent', $contact);
  //return redirect::to('/contact');
  }  
//**********Send message *****************************



    public function blogDetails($blog_id)
    {
        $blog_info = DB::table('blog')
                    ->where('blog_id', $blog_id)
                    ->first();
     
//create hit counter
      $data['hit_counter']=$blog_info->hit_counter+1;   
      DB::table('blog')
        ->where('blog_id', $blog_id)
        ->update($data);

        $blog_details= view('frontEnd.blogPost.blogPdetails')
                    ->with('blog_info', $blog_info);
        return view('frontEnd.master')
                ->with('mainContent', $blog_details);                       
    }

    public function categoryBlog($category_id){
        $published_post= DB::table('blog')
            ->where('publication_status',1)
            ->where('category_id', $category_id)
            ->orderBy('blog_id', 'desc')
            ->paginate(3);
        $home=view('frontEnd.home.homeContent')
            ->with('published_post', $published_post);

        return view('frontEnd.master')
                ->with('mainContent', $home);         
    }

   public function galleryPage()
   {
    $gallery_images = DB::table('gallery')
        ->where('publication_status', 1)
        //->get();
        ->paginate(9);

     $gallery=view('frontEnd.gallery.gallery-content')
          ->with('gallery_images', $gallery_images);

     return view('frontEnd.master')
            ->with('mainContent', $gallery);
   }
   
}
