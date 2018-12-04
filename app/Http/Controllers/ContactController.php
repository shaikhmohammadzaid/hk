<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contact;
use DB;
use Session;
class ContactController extends Controller
{ 
   
 
    public function index()
    {
        return view('contact');
    }
	
	 public function savecontact(Request $request)
     { 	
	 	 
        $user_fullname = $request->p_name;     
        $user_email = $request->p_email;		 
        $user_message = $request->p_message;    
        $shop_no = $request->p_shop_no; 
        $time = date('Y-m-d H:i:s'); 
          
//         DB::table('contacts')->insert(
//          [          
// 		 'user_fullname'=>$user_fullname,
//          'user_email'=>$user_email,		      
// 		 'user_message'=>$user_message,
// 		  'shop_no'=>$shop_no
//           ]
//          );  
		 DB::table('contacts')->insert(
    ['user_fullname' => $user_fullname, 'user_email'=>$user_email,'user_message'=>$user_message,'shop_no'=>$shop_no,'created_at'=>$time]);
	    Session::flash('success','Successfully Send');
        return back();
    }
	
}
