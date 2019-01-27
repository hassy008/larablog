@extends('admin.master')

@section('title')
Add Category
@endsection


@section('mainContent')
<div class="row-fluid">
  <div class="span12">
     <div class="widget green">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i> Add Social Media</h4>
        <span class="tools">
          <a href="javascript;" class="glyphicon-chevron-down"></a>
        {{--  <a href="javascript;" class="icon-remove"></a> --}}
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
    {!!Form::open(['url'=>'/save-social','method'=>'post','class'=>'form-horizontal']) !!}
    {{-- <form action="" class="form-horizontal" method="post" accept-charset="utf-8"> --}}
   
 {{--  @foreach($all_social_account as $all_social_account)    
        <div class="controls">
          <input type="hidden" class="span6" name="id" value="{{ $id->id }}">  
        </div> --}}
      <div class="control-group">
        <label class="control-label">Facebook</label>
        <div class="controls">
          <input type="text" class="span6" name="fb" value="{{ $all_social_account->fb }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">Twitter</label>
        <div class="controls">
          <input type="text" class="span6" name="tw" value="{{ $all_social_account->tw }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">LinkedIn</label>
        <div class="controls">
          <input type="text" class="span6" name="ln" value="{{ $all_social_account->ln }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">Google Plus</label>
        <div class="controls">
          <input type="text" class="span6" name="gp" value="{{ $all_social_account->gp }}"> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Youtube</label>
        <div class="controls">
          <input type="text" class="span6" name="yt" value="{{ $all_social_account->yt }}"> 
        </div>
      </div>
 


<div class="control-group">
  <div class="span6">
    <button type="submit" name="btn" class="btn btn-success btn-block">Save Social</button>  
  </div>
</div>

 

   {!! form::close() !!}    
   {{--   </form> --}}
     </div>
      
    </div>

  </div>  
</div>




@endsection