<?php

namespace App\Application\Controllers\Website\Auth;

use App\Application\Controllers\Controller;
use App\Application\Model\UserInfo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Rules\Captcha;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    protected function validateLogin(\Illuminate\Http\Request $request)
    {
      //dd($request);
        $this->validate($request, [
            $this->loginUsername() => 'required',
            'password' => 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
      //dd("ok");
        if($user->group_id == 1||$user->group_id == 3){

           return redirect('/admin/home');
        }
        return redirect('/');
    }
    public function loginUsername()
    {
        return 'email';
    }
}
