@extends('frontEnd.master')
@section('title')
Gallery
@endsection
@section('mainContent')


<link href="{{ asset('/public/frontEnd/gallery/') }}/gallery.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('/public/frontEnd/gallery/') }}/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
<script src="{{ asset('/public/frontEnd/gallery/') }}/lightbox-plus-jquery.min.js" type="text/javascript" charset="utf-8" async defer></script>

 <h2 style="background-color: antiquewhite; margin-top: 3px;">Gallery</h2> 
 @foreach($gallery_images as $v_images)
 <div class="gallery">
		
  <a href="{{ asset( $v_images->gallery_image ) }}" title="{{ $v_images->image_name }} <br> {{ $v_images->image_description }}" data-lightbox="mygallery">
    <img src="{{ asset( $v_images->gallery_image ) }}" width="600" height="400">
  </a>
  <div class="desc">{{ $v_images->image_description }}</div>
</div>
 @endforeach
	
	{{ $gallery_images->links() }}  



@endsection