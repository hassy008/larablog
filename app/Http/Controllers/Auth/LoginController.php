<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
//use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }









/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $githubUser = Socialite::driver($service)->user();

        //dd($githubUser);

        //if user logged in before using the same account
        $user= User::where('provider_id', $githubUser->getId())->first();

        if($user){
             Auth::login($user, true);
        }else{

        //add user to database
        $user = User::create([
            'email'=>$githubUser->getEmail(),
            'name'=>$githubUser->getName(),
            'provider_id'=>$githubUser->getId(),
            ]);
        //login the user
        Auth::login($user, true);
        }

        return redirect($this->redirectTo);

        //$githubUser->token;
    }





}
