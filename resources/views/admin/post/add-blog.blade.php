@extends('admin.master')

@section('title')
Add Post
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> New Post</h4>
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>

 	 <div class="widget-body">
 <!--BEGIN FORM-->
 <h3 style="color:green" align="center">
 	<?php
 	  $message = Session::get('message');
 	  if($message){
 	  	echo '<b>'.$message.'</b>';
 	  	Session::put('message');
 	  }
 	?>
 </h3>
  <h2 class="text-center text-success">{{Session::get('message')}}</h2> 
 	 	{!!Form::open(['url'=>'/save-blog','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
 	 	{{-- <form action="" class="form-horizontal" method="post" accept-charset="utf-8"> --}}
 	 	  
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Post Title</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="blog_title">	
 	 	  	</div>
 	 	  </div>
      <div class="control-group">
        <label class="control-label">Category Name</label>
        <div class="controls">
          <select name="category_id">Choose Your 
            <option>Choose Your Category</option>
      @foreach($published_category as $v_category)
            <option value="{{ $v_category->category_id }}">{{ $v_category->category_name }}</option>
      @endforeach      
          </select>
        </div>
      </div>

 	 	  <div class="control-group">
 	 	  	<label class="control-label">Post Short Description</label>
 	 	  	<div class="controls">
 	 	  		<textarea class="span6" id="richTextBody" rows="2" name="blog_short_description"></textarea>
 	 	  	</div>
 	 	  </div>
      <div class="control-group">
        <label class="control-label">Post Long Description</label>
        <div class="controls">
          <textarea class="span6" id="richTextBody1" rows="4" name="blog_long_description"></textarea>
        </div>
      </div>

<div class="control-group">
        <label class="control-label">Post Image</label>
        <div class="controls">
          <input type="file" class="span3" name="blog_image"> 
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">Author Name</label>
        <div class="controls">
          <input type="text" class="span6" name="author_name"> 
        </div>
      </div>

 	 	  <div class="control-group">
 	 	  	<label class="control-label">Publication Status</label>
 	 	  	<div class="controls">
 	 	  		<select name="publication_status" >
 	 	  			<option>Choose Your Status</option>
 	 	  			<option value="1">Publish</option>
 	 	  			<option value="0">Unpublish</option>
 	 	  			
 	 	  		</select>
 	 	  	</div>
 	 	  </div>	

<div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>	
  </div>
</div>



{{-- <div class="form-group">
  	    	<div class="col-sm-offset-2 col-sm-10">
  	    	  <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>	
  	    	</div>
</div> --}}

 	 {!! form::close() !!}		
 	 {{-- 	</form> --}}
 	   </div>
  		
    </div>

  </div>	
</div>




@endsection