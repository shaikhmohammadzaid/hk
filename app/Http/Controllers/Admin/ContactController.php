<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\Contact;
use Session;
use DB;

 
class ContactController extends Controller{
	
  public function __construct(){ $this->middleware('auth:admin'); }
   
    public function index()
    { 
	 	$contacts = Contact::select('contact_id', 'user_fullname', 'user_email', 'shop_no','user_message','created_at')->paginate(25);
        return view('admin.contact.index',['contacts' => $contacts]);
    }
    
    public function contact_delete(Request $request)
    { 
          $cid = $request->id;       
          $delete =  DB::table('contacts')->where('contact_id', '=', $cid)->delete(); 
          if($delete == 1) 
    	    {
    		  Session::flash('success','Deleted successfully ');
    		} else {
    		  Session::flash('failure','No Deletion!');			  
    		}
    }
   
     public function view_contact(Request $request){
        
          $r=DB::table('contacts')->where('contact_id', '=', $request->id)->get();

          return $r;
       
      }

	public function contact_read(Request $request)
    { 
      $cid = $request->id;       
      $delete =  $user_status = DB::table('contacts')
                 ->where('contact_id','=', $cid )
                 ->update([ 
                 'msg_read'=>'1',
                 'updated_at'=>date('Y-m-d H:i:s')
                 ]);
	  
	       
		 
    }
   
}