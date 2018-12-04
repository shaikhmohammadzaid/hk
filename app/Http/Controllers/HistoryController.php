<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class HistoryController extends Controller
{

	 public function __construct()  {  $this->middleware('auth'); }
	 
    public function history()
    {
		$historys=DB::table('user_service_request')
		->join('task_list','task_list.tasklist_id','=','user_service_request.service_id')
		->where('user_service_request.user_id','=',Auth::user()->id)
		->paginate(10); 
     	return view('history',['historys'=>$historys]);
    }
    
}
