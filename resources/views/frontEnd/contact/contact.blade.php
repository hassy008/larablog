@extends('frontEnd.master')
@section('title')
Contact Us
@endsection
@section('mainContent')
 
<div class="templatemo_post_wrapper">
  <div class="templatemo_post">
  	<h2>Contact Us</h2> 
<h3 style="color:green" align="center">
  <?php
    $message = Session::get('message');
    if($message){
      echo '<b>'.$message.'</b>';
      Session::put('message');
    }
  ?>
 </h3>

  	<form action="{{ url('/contact') }}" method="POST" accept-charset="utf-8">
      {{ csrf_field() }}
  	  <div class="form-group">
  	  	<label name="email">Email: </label>
  	  	<input id="email" name="email" class="form-control">
  	  </div>
  	   <div class="form-group">
  	  	<label name="subject">Subject: </label>
  	  	<input id="subject" name="subject" class="form-control">
  	  </div>
  	   <div class="form-group">
  	  	<label name="message">Message: </label>
  	  	<textarea name="message" id="message" rows="6" class="form-control" placeholder="Typer Your Message Here"></textarea>
  	  </div>	
  	  <div class="control-group">
  <div class="span6">
  	<button type="submit" name="btn" class="btn btn-success btn-block">Send</button>	
  </div>
</div>
  		
  	</form>

  </div>
</div> <!-- End of a post-->

@endsection