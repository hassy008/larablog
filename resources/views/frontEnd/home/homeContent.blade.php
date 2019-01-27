@extends('frontEnd.master')
@section('title')
Home
@endsection
@section('mainContent')
 
<div class="templatemo_post_wrapper">
  
@foreach($published_post as $v_post) 
  <div class="templatemo_post">

   
      <div class="post_title"><a href="{{ url('/blog-details/'.$v_post->blog_id) }}">{{ $v_post->blog_title }}</a></div>
      <div class="post_info">
      	Posted by {{ $v_post->author_name }}, {{ $v_post->created_at }}, in <a href="#">Comments</a>
      </div>
      
      <div class="post_body">
          <img src="{{ asset( $v_post->blog_image ) }}" alt="free css template" border="1" height="200" width="100%" />
        <p>{{ $v_post->blog_short_description }}</p>
    </div>
  </div>
   @endforeach

  {{ $published_post->links() }}

</div> <!-- End of a post-->


@endsection                