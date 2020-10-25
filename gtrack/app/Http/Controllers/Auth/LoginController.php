<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    // protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('guest.login');
    }
    public function redirectPath()
    {
        // if (method_exists($this, 'redirectTo')) {
        //     return $this->redirectTo();
        // }
        $user=Auth::user();
        if($user->user_type=='Admin'){
            return '/admin/dashboard';
        }elseif($user->user_type=='Driver'){
            return '/driver/schedule';
        }
        // return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
