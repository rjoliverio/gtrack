<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    public function redirectPath()
    {
        // if (method_exists($this, 'redirectTo')) {
        //     return $this->redirectTo();
        // }
        $user_type="driver";
        if(Auth::user()->user_type=="Admin"){
            $user_type="admin";
        }
        toast('Password Reset Successful!','success');
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/'.$user_type.'/profile';
    }
}
