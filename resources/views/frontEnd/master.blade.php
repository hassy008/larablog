<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<meta name="keywords" content="free css layout, old blog template, CSS, HTML" />
<meta name="description" content="Old Blog Template - free website template provided by TemplateMo.com" />
<link href="{{ asset('public/frontEnd/templatemo_style.css') }}" rel="stylesheet" type="text/css" />
<!--  Designed by w w w . t e m p l a t e m o . c o m  -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/tabcontent.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/app.css') }}" />
<script type="text/javascript" src="{{ asset('public/frontEnd/tabcontent.js') }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
/***********************************************
* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
</head>
<body>

<div id="templatemo_header_panel">
	<div id="templatemo_title_section">
			<h1>OLD BLOG</h1>
    Write Code and drink Coffee
  </div>
</div> <!-- end of templatemo header panel -->

<!-- Began of menu -->    
@include('frontEnd.includes.header')
<!-- end of menu -->

<div id="templatemo_content_container">
  <div id="templatemo_content">
    <div id="templatemo_content_left">
<!--**************[YIELD]*************** -->
       @yield('mainContent')
    
    </div> <!-- end of content left -->
    
      <div id="templatemo_content_right">
    
    	<div class="templatemo_right_section">
			<div class="tag_section">
                <ul id="countrytabs" class="shadetabs">
                    <li><a href="#" rel="search" class="selected">Search</a></li>                
                    <li><a href="#" rel="category">Category</a></li>
                    <li><a href="#" rel="archive">Archive</a></li>
                </ul>
			</div>
		
            <div class="tabcontent_section">
                <div id="search" class="tabcontent">
                    <form method="get" action="#">
                        <input class="inputfield" name="searchkeyword" type="text" id="searchkeyword"/>
                        <input type="submit" name="submit" class="button" value="Search" />
                    </form>                    
                </div>
			
                <div id="category" class="tabcontent">
                    <?php 
                      $all_category=DB::table('categories')
                                     ->where('publication_status',1)   
                                     ->get();
                    ?>

                    <ul>
                      @foreach($all_category as $vcategory)  
                        <li><a href="{{ url('/category-blog/'.$vcategory->category_id) }}">{{ $vcategory->category_name }}</a></li>
                      @endforeach  
                    </ul>                        
                </div>
            
                <div id="archive" class="tabcontent">
                    <ul>
                        <li><a href="#">January 2049</a></li>
                        <li><a href="#">December 2048</a></li>
                        <li><a href="#">November 2048</a></li>
                        <li><a href="#">October 2048</a></li>
                        <li><a href="#">September 2048</a></li>
                    </ul>                         
                </div>
			</div>

			<script type="text/javascript">
            
            var countries=new ddtabcontent("countrytabs")
            countries.setpersist(true)
            countries.setselectedClassTarget("link") //"link" or "linkparent"
            countries.init()
            
            </script> <!--- end of tag -->
        </div>
    	
        
        <div class="templatemo_right_section">
        	<h2>Popular Posts</h2>
			<?php 
              $popular_post=DB::table('blog')
                        ->where('publication_status',1)
                        ->orderBy('hit_counter','desc')
                        ->limit(5)
                        ->get();
            ?>
            <ul>
              @foreach($popular_post as $v_post)  
                <li><a href="{{ url('/blog-details/'.$v_post->blog_id) }}">{{ $v_post->blog_title }}</a>({{  $v_post->hit_counter }})</li>
              @endforeach  
            </ul>    
        </div>
        
        <div class="templatemo_right_section">
        	<h2>Recent Post</h2>
			<ul>
              <?php
                $recent_post=DB::table('blog')
                        ->orderBy('blog_id', 'desc')
                        ->limit(5)
                        ->Get();
              ?>  
            @foreach($recent_post as $v_post)  
                <li><a href="{{ url('/blog-details/'.$v_post->blog_id) }}">{{ $v_post->blog_title }}</a></li>
             @endforeach 
            </ul>  
        </div>
        
        <div class="templatemo_right_section">
            <h2>Recent Comments</h2>
        	<ul>	
                <li>Lorem Ipsum on <a href="#">Donec mollis aliquet</a></li>
                <li>Consectetuer on <a href="#">Suspendisse a nibh</a></li>
                <li>Sed on <a href="#">Pellentesque vitae magna</a></li>
                <li>Vitae Neque on <a href="#">Nunc blandit orci sit amet</a></li>
              <li>Donec Mollis on <a href="#">Maecenas adipiscing</a></li>
          </ul>
        </div>
        
        <div class="templatemo_right_section">
        	<h2>Search</h2>
			<form method="get" action="#">
                <input class="inputfield" name="keyword" type="text" id="keyword"/>
                <input type="submit" name="submit" class="button" value="Search" />
            </form>
        </div>
        
    </div> <!-- end of right content -->
  </div> <!-- end of content -->
</div> <!-- end of content container -->

	@include('frontEnd.includes.footer')