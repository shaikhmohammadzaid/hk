<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         
		$this->middleware(['guest:web','checkstatus'],['except'=>['logout','userlogout']]);
    }
	public function userlogout(Request $request)
    {
         
		Auth::guard('web')->logout();		    
		session()->flush(); 
        return redirect('/');
    } 
	 protected function sendLoginResponse(Request $request)
	 {
	 	$request->session()->regenerate();
		$previous_session = Auth::User()->session_id;
		if ($previous_session) {
			Session::getHandler()->destroy($previous_session);
		}
	
		Auth::user()->session_id = Session::getId();
		Auth::user()->save();
		$this->clearLoginAttempts($request);
	
		return $this->authenticated($request, $this->guard()->user())
			?: redirect()->intended($this->redirectPath());
	 }
}
