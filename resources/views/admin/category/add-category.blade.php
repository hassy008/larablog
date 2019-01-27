@extends('admin.master')

@section('title')
Add Category
@endsection


@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-reorder"></i> Add Category</h4>
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
 	 	{!!Form::open(['url'=>'/save-category','method'=>'post','class'=>'form-horizontal']) !!}
 	 	{{-- <form action="" class="form-horizontal" method="post" accept-charset="utf-8"> --}}
 	 	  
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Category Name</label>
 	 	  	<div class="controls">
 	 	  		<input type="text" class="span6" name="categoryName">	
 	 	  	</div>
 	 	  </div>
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Category Description</label>
 	 	  	<div class="controls">
 	 	  		<textarea class="span6" id="richTextBody" rows="4" name="categoryDescription"></textarea>
 	 	  	</div>
 	 	  </div>
 	 	  <div class="control-group">
 	 	  	<label class="control-label">Publication Status</label>
 	 	  	<div class="controls">
 	 	  		<select name="publicationStatus" >
 	 	  			<option>Select Category</option>
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