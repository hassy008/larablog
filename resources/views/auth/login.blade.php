@extends('frontEnd.master')
@section('title')
Login
@endsection
@section('mainContent')

{{-- using laravel socialite package --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  text-align: center;
}
.wrapper {
  display: inline-flex;
  justify-content: center;
}
.wrapper i {
  padding: 10px;
  text-shadow: 0px 6px 8px rgba(0, 0, 0, 0.6);
  transition: all ease-in-out 150ms;
}
.wrapper a:nth-child(1) {
  color: #dd4b39;
}
.wrapper a:nth-child(2) {
  color: #4867AA;
}
.wrapper a:nth-child(3) {
  color: #1DA1F2;
}
.wrapper i:hover {
  margin-top: -3px;
  text-shadow: 0px 14px 10px rgba(0, 0, 0, 0.4);
}
</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
           <br>
    <h3>Login With Social Media</h3> 
<div class="wrapper">
  <a href="{{ url('/login/facebook') }}"><i class="fa fa-3x fa-facebook-square"></i></a>  
   <a href="{{ url('/login/google') }}"><i class="fa fa-3x fa-google-plus"></i></a>
   <a href="{{ url('/login/github') }}"><i class="fa fa-3x fa fa-github"></i>
</div></a>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
