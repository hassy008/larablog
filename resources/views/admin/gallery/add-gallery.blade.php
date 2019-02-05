@extends('admin.master')
@section('title')
Add Image
@endsection

@section('mainContent')
<div class="row-fluid">
  <div class="span12">
  	 <div class="widget green">
  	 	<div class="widget-title">
  	 	  <h4><i class="icon-recorder">Add Images</i></h4>	
  	 	  <span class="tools">
  	 	  	<a href="javascript;" class="glyphicon-chevron-down"></a>
  	 	  {{-- 	<a href="javascript;" class="icon-remove"></a> --}}
  	 	  </span>		
  	 	</div>
    </div>  
    <h3 class="text text-center" style="color: green;">
   @if(session('status'))
<div class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('status') }}</b>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
    <b>{{ session('error') }}</b>
</div>
@endif
    </h3>
 	 
 	 <div class="widget-body">
 	 	{!! Form::open(['url'=>'/save-images', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
 	  <div class="control-group">
 	  	<label class="control-label">Images Name</label>
 	  	<div class="controls">
 	  		<input type="text" class="span6" name="image_name">	
 	  	</div>
 	  </div>
 	  <div class="control-group">
 	  	<label class="control-label">Image Description</label>
 	  	<div class="controls">
 	  		<textarea class="span6" rows="4" name="image_description"></textarea>
 	  	</div>
 	  </div>

      <div class="control-group">
        <label class="control-label">Image Category</label>
        <div class="controls">
          <select name="category_id">
            <option>Choose Your Category</option>
      @foreach($published_category as $v_cat)
            <option value="{{ $v_cat->category_id }}">{{ $v_cat->category_name }}</option>
      @endforeach      
          </select>
        </div>
      </div>

       <div class="control-group">
        <label class="control-label">Add Image</label>
        <div class="controls">
          <input type="file" class="span6" name="gallery_image"> 
        </div>
      </div>

 	  <div class="control-group">
 	  	<label class="control-label">Publication Status</label>
 	  	<div class="controls">
 	  		<select name="publication_status" required>
 	  			<option>Select Image</option>
 	  			<option value="1">Publish</option>
 	  			<option value="0">Unpublish</option>
 	  			
 	  		</select>
 	  	</div>
 	  </div>	

	<div class="form-actions">
	  <div class="span6">
	  	<button type="submit" name="btn" class="btn btn-success btn-block">Save Image Info</button>
	  	<button type="submit" name="btn" class="btn btn-danger btn-block">
	  		<a href="{{ url('/dashboard') }}" style="text-decoration: none; color: white;">Cancel</a>	
	  	</button>
	  </div>
	</div>

 	 	{!! Form::close() !!}
 	 </div>
  		
    </div>	
  </div>
</div>

@endsection