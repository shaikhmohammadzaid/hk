<?php
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use Session;
use DB;
use Auth; 
use Cache;
use Illuminate\Support\Facades\Hash;

class SubadminController extends Controller
{ 
       public function __construct(){ $this->middleware('auth:admin'); }

    public function index()
    {  
     	 if(Auth::user()->job_title=='subadmin' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){
	   	$admins = DB::table('admins')->where('job_title','=','subadmin')->paginate(10);		 
        return view('admin.subadmin.index',['admins' => $admins]);
		} else {return view('admin.error.unauthenticate');}
    }
    public function dashboard()
    {  
        return view('admin.dashboard');
    }
	
    public function subadmin_add(Request $request)
    {     
        $name = $request->name;     
        $email = $request->email;				 
        $password =  Hash::make($request->password);
		$job_title = $request->job_title;    
          
        $allexit = Admin::where([ 'email'=>$email ])->exists();
		if($allexit)
		{
		  $data['error']= $request->email ." already exits";
		}
		else
		{
		 $user = DB::table('admins')->insert(['name'=>$name, 'email'=>$email,'password'=>$password,'job_title'=>$job_title ] );  
			if($user == 1) {
			  Session::flash('success','User inserted  successfully ');
			  $data['error'] = "success";
			  return $data;
			} else {
			  Session::flash('failure','No inserted!');
			  
			}
		} 
		return $data;
		
    }
	
	public function subadmin_status_inactive(Request $request)
    {
       
      $uid = $request->id; 
      $status = $request->status;  

      if($status == '1' ){
      $user_status = DB::table('admins')
            ->where('id','=', $uid )
            ->update([ 
        'status'=>'0'
            ]); 
        }
      else if($status == '0'){
        
         $user_status = DB::table('admins')
            ->where('id','=', $uid )
            ->update([ 
        'status'=>'1' 
            ]); 
        }
		 
    }
	
	public function subadmin_delete(Request $request)
    {
       
      $uid = $request->id;       
      $delete =  DB::table('admins')->where('id', '=', $uid)->delete(); 
      if($delete == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }
	
	public function subadmin_edit(Request $request)
    {     
	    $id = $request->id;
        $name = $request->name;     
        $email = $request->email;	
        if ($request->password == NULL) 
        {
        	
			$job_title = $request->job_title;    
	          
	       $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
					if($allexit)
					{
					  $data['error']= $request->email ." already exits";
					}
			else
			{
			 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email ] );  
				if($user == 1) {
				  Session::flash('success','User Updated  successfully ');
				  $data['error'] = "success";
				  return $data;
				} else {
				  Session::flash('failure','No Updation!');
				  
				}
			} 
			return $data;		 	# code...
        }
        else
        {
        	$password =  Hash::make($request->password);
			$job_title = $request->job_title;    
	          
	        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
			if($allexit)
			{
			  $data['error']= $request->email ." already exits";
			}
			else
			{
			 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email,'password'=>$password,] );  
				if($user == 1) {
				  Session::flash('success','User Updated  successfully ');
				  $data['error'] = "success";
				  return $data;
				} else {
				  Session::flash('failure','No Updation!');
				  
				}
			} 
			return $data;
	    }			 
        
		
    }
}