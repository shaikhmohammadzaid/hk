<?php
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use App\Models\User;
use Session;
use DB;
use Auth; 
use Cache;
use App\Models\Task_management;
use Illuminate\Support\Facades\Hash;

class PmController extends Controller{ 
    
    public function __construct(){ $this->middleware('auth:admin'); }
	
    public function index()
    {  
    	

        if(Auth::user()->job_title=='projectmanager' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){
 

             $id=Auth::user()->id;
            $admins = DB::table('admins')->leftjoin('location as location_id','location_id.location_id','=','admins.location_id')
      ->leftjoin('branch as branch_id','branch_id.branch_id','=','admins.branch_id')
                                   ->select('admins.*','location_id.location_name as location','branch_id.branch_name as branch')
             ->where('job_title','=','projectmanager')->orderBy('id','Desc')->paginate(10);           
        
       $locations = DB::table('location')->get();
       $branches = DB::table('branch')->get();

        return view('admin.projectmanager.index',['admins' => $admins,'locations' => $locations,'branches' => $branches]);

       } else {return view('admin.error.unauthenticate');}
       
     
    }
    public function dashboard()
    {  
        return view('admin.dashboard');
    }

	 public function show_branch(Request $request)
    {
              if ($request->ajax()) 
              {
                  
                  return response(DB::table('branch')->where('location_id','=',$request->location_id)->get());
              }
    }
   
	public function pm_status_inactive(Request $request)
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
	
	public function pm_delete(Request $request)
    {
       
      $uid = $request->id; 
      $deletepm =  DB::table('admins')->where('id', '=', $uid)->delete(); 
      if($deletepm == 1) 
	    {
         $pm_id=NULL;
           DB::table('admins')->where('pm_id', $uid)->update(['pm_id'=>$pm_id] );
		      Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }
	
	public function pm_edit(Request $request)
    {     
	    $id = $request->id;
        $name = $request->name;     
        $email = $request->email;	
        if ($request->password == NULL) 
        {
        	
			$location_id = $request->location;  
      $branch_id = $request->branch; 
      $block = $request->block;    
	          
	        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
			if($allexit)
			{
			  $data['error']= $request->email ." already exits";
			}
			else
			{
			 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email,'location_id'=>$location_id,'branch_id'=>$branch_id,'block'=>$block  ] );  
				if($user == 1) {
				  Session::flash('success','User Updated  successfully ');
				  $data['error'] = "success";
				  return $data;
				} 
        else 
        {
				  Session::flash('failure','No Updation!');
				  
				}
			} 
			return $data;		 	# code...
        }
        else
        {
        	$password =  Hash::make($request->password);
			   $location_id = $request->location;  
          $branch_id = $request->branch;   
           $block = $request->block;   
	          
	        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
			if($allexit)
			{
			  $data['error']= $request->email ." already exits";
			}
			else
			{
			  $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email,'password'=>$password,'location_id'=>$location_id,'branch_id'=>$branch_id,'block'=>$block ] );  
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

   // ================Task Management ==========================
    
    public function assignTask()
    {  
       if(Auth::user()->job_title=='projectmanager'){
          	 
             $id=Auth::user()->id;

          	 $tms=Task_management::leftjoin('admins as pm_id','pm_id.id','=','task_management.pm_id')
                   ->select('task_management.*','pm_id.name as pm_id')
                   ->where('task_management.pm_id','=',$id)
                   ->paginate(10);

              $emps = DB::table('admins')->where('pm_id','=',$id)->get();
      		
      		
              return view('admin.projectmanager.assignTask.assigntask',['tms' => $tms , 'emps' => $emps]);

         } else {return view('admin.error.unauthenticate');}

    }

     public function pmEmployee()
    {  
       if(Auth::user()->job_title=='projectmanager'){
        
    	    $id=Auth::user()->id;
         	$emps = DB::table('admins')->where('pm_id','=',$id)->get();
        return view('admin.projectmanager.pmEmployee',['emps' => $emps]);

         } else {return view('admin.error.unauthenticate');}
    }
    
    
 

    public function taskAssignEmp(Request $request)
    {  
    	 $task_id=$request->task_id;
    	 $emp_id=$request->emp_id;
       $status=2;
        
        return response( DB::table('task_management')->where('task_id','=',$task_id)->update(['emp_id'=>$emp_id , 'status'=>$status] ));

    	
    }
  // ================Task Management ==========================
   
    public function emp_review_taskstatus(Request $request)
    {
       
      
      $task_id = $request->task_id;     
      $status = $request->status;  
   
      
      $user_status = DB::table('task_management')
     ->where('task_id','=', $task_id )
     ->update([ 
        'status'=>$status
            ]); 
      


    }

 // ================Start Service Management ==========================
     public function ServiceRequest()
    {  

        
          $id=Auth::user()->id;
           $block=Auth::user()->block;
           
          $services = DB::table('user_service_request')->where('pm_id','=',$id)->orWhere('block','=',$block)->get();
 
          $id=Auth::user()->id;
          $emps = DB::table('admins')->where('pm_id','=',$id)->get();
         // var_dump($services); exit;
        return view('admin.projectmanager.serviceRequest',['services' => $services ,'emps' => $emps]);

        
    }

      public function serviceAllocateEmp(Request $request)
    {  
       $service_req=$request->service_req;
       $emp_id=$request->emp_id;
       $pm_id=$request->pm_id;
       $status=2;
        
        return response( DB::table('user_service_request')->where('service_req','=',$service_req)->update(['emp_id'=>$emp_id , 'pm_id'=>$pm_id  , 'status'=>$status] ));

      
    }

     public function emp_review_servicestatus(Request $request)
    {

      $service_req = $request->service_req;     
      $status = $request->status;  

      if($status == 6)
      {
        $u=DB::table('user_service_request')->where('service_req','=', $service_req )->first();

        $user_id = $u->user_id;

        $users = User::select('name', 'email' ,'balance')->where('id','=',$user_id)->get( );
         $bal = $users[0]->balance;
         $uname = $users[0]->name;
         $uemail = $users[0]->email;

         $sb = $u->service_price;
         $sname= getServiceName($u->service_id);
         
        echo $cb= $bal - $sb;

        $trans = DB::table('user_transaction')
        ->insert(['user_id'=>$user_id,'name'=>$uname,'email'=>$uemail,'service_name'=>$sname,'description'=>'Money Debited by employee','debit_amount'=>$sb,'current_balance'=>$cb]);

        $us = DB::table('users')->where('id','=',$user_id)->update(['balance'=>$cb]); 
         
         

      }
      
       $user_status = DB::table('user_service_request')->where('service_req','=', $service_req )->update([ 'status'=>$status ]); 
     
    }
 // ================End Service Management ==========================



}