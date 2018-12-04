<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inbox;
use App\Models\Admin;
use Auth; 
use Session;
use DB;
class InboxController extends Controller
{
       public function __construct(){ $this->middleware('auth:admin'); }


   
     public function index()
    { 
	 	$inbox_messages = Inbox::select('message_id', 'title', 'message','message_read', 'created_at')
		->where('user_id','=',Auth::user()->id)
    ->orderBy('admin_messages.message_id','desc')
		->paginate(10);
		
        return view('admin.inbox.index',['inbox_messages' => $inbox_messages]);
    }
	
	public function delete_inbox(Request $request)
    {       
      $mid = $request->mid;       
      $delete =  DB::table('admin_messages')->where('message_id', '=', $mid)->delete(); 
      if($delete == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }

   
	
	public function message_read(Request $request)
    { 
      $cid = $request->id;       
      $read =  $user_status = DB::table('admin_messages')
                 ->where('message_id','=', $cid )
                 ->update([ 
                 'message_read'=>'1'
                 ]);	       
		 
    }
}
