<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Admin;
use Session;
use DB;
class MessageController extends Controller
{
      public function __construct(){ $this->middleware('auth:admin'); }


    public function index()
    { 
	 	$messages = Message::select('message_id','title', 'message', 'category','created_at')->paginate(15); 
        return view('admin.message.index',['messages' => $messages]);
    } 
	
	public function delete_message(Request $request)
    {
       
      $mid = $request->mid;       
      $delete =  DB::table('messages')->where('message_id', '=', $mid)->delete(); 
      if($delete == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }
}
