<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Http\Request; 
use Auth;
use Session;



class AdminLoginController extends Controller
{
	public function __construct()  
	{ 
		$this->middleware('guest:admin',['except'=>['logout','adminlogout']]);
	}
	 
    public function showloginform()
	 {	
		 return view('admin.auth.login');
	 }
	 
	 
	 public function login(Request  $request)
	 {
		 $this->validate($request,[
		 'email' => 'required|email|min:4',
		 'password' => 'required|min:4',
		 ]);
		
		// if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password,'status' =>1], $request->remember))
		 if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember))
		
		 {  		 	  
		 	return redirect('/admin/dashboard');
		 }
		 
		     Session::flash('success','Email / Wrong password or this account deactivated.');
		    return redirect()->back()->withInput($request->only('email','remember'));
		          
	 }
	 
	 public function adminlogout()
     {
        Auth::guard('admin')->logout();       
        return redirect('/admin');
    } 
	  
}
