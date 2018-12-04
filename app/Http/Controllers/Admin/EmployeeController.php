<?php
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use App\Models\Emp_task_image;
use Session;
use DB;
use Auth; 
use Cache;
use File;
use Storage;
use App\Models\Emp_service_image;

use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller{ 
    public function __construct(){ $this->middleware('auth:admin'); }
	
	
	 public function emp_updt_taskstatus(Request $request)
    {
       
      $emp_id = $request->emp_id; 
      $task_id = $request->task_id;     
      $status = $request->status;  
      $photo=Emp_task_image::photo($request,'photo');
      
    
      $time=date("h:i:s");
  
      if($status == '2' ){
      $user_status = DB::table('task_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'3','emp_start_time'=>$time
            ]); 
        }
    
    if($status == '3' ){
      $user_status = DB::table('task_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'5','emp_end_time'=>$time,'image'=>$photo
            ]); 
        }
        
    if($status == '4' ){
      $user_status = DB::table('task_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'3','emp_start_time'=>$time
            ]); 
        }
   
            
    }

     public function emp_updt_dtaskstatus(Request $request)
    {
       
      $emp_id = $request->emp_id; 
      $task_id = $request->task_id;     
      $status = $request->status;  
      $photo=Emp_task_image::photo($request,'photo');
      
    
      $time=date("h:i:s");
  
      if($status == '2' ){
      $user_status = DB::table('dtask_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'3','emp_start_time'=>$time
            ]); 
        }
    
    if($status == '3' ){
      $user_status = DB::table('dtask_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'5','emp_end_time'=>$time,'image'=>$photo
            ]); 
        }
        
    if($status == '4' ){
      $user_status = DB::table('dtask_management')
     ->where('task_id','=', $task_id )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'3','emp_start_time'=>$time
            ]); 
        }
   
            
    }


    public function index()
    {  
       if(Auth::user()->job_title=='employee' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){

       

       $date=date('Y-m-d');

     	$allocates = DB::table('task_management')	 
		   ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 2 )
		  ->paginate(10);

      
      $workings = DB::table('task_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 3 )
      ->paginate(10);

       $completes = DB::table('task_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 6 )
      ->paginate(10);

      $pendings= DB::table('task_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 4 )
        ->orwhere('status','=', 5 )
      ->paginate(10);
		
        return view('admin.employee.index',['allocates' => $allocates , 'workings' => $workings ,'completes' => $completes ,'pendings' => $pendings]);

      } else {return view('admin.error.unauthenticate');}

    }

    public function dindex()
    {  

        $pmss = DB::table('task_management')->where('fixed','=',1)
                               ->get();
        $cdate=date('Y-m-d');
         foreach ($pmss as $key) {

       $adate=$key->assign_date;
       $rid=$key->emp_id;
       $title=$key->title;
       $task_id=$key->task_id;
       /*$adate=$key->assign_date;
       $adate=$key->assign_date;*/
  if($adate != $cdate){
        
        
       $user = DB::table('dtask_management')->insert(['emp_id'=>$rid,'status'=>'2','title'=>$title ,'assign_date'=>$cdate ]);  
       
     }

     $user_status = DB::table('task_management')
     ->where('task_id','=', $task_id )
    
     ->update([ 
        'assign_date'=> $cdate,'status'=>'2'
            ]);   

        
}

       if(Auth::user()->job_title=='employee' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){

       

       $date=date('Y-m-d');

      $allocates = DB::table('dtask_management')  
       ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 2 )
      ->paginate(10);

      
      $workings = DB::table('dtask_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 3 )
      ->paginate(10);

       $completes = DB::table('dtask_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 6 )
      ->paginate(10);

      $pendings= DB::table('dtask_management')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 4 )
        ->orwhere('status','=', 5 )
      ->paginate(10);
    
        return view('admin.employee.dindex',['allocates' => $allocates , 'workings' => $workings ,'completes' => $completes ,'pendings' => $pendings]);

      } else {return view('admin.error.unauthenticate');}

    }

   

    public function dashboard()
    {  
        return view('admin.dashboard');
    }
     public function employee_listing()
    {  
      
         if(Auth::user()->job_title=='employee' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){
             $pms = DB::table('admins')->where('job_title','=','projectmanager')->get();
           $list = Admin::where(['job_title'=>'employee'])->paginate(10);
       
        return view('admin.employee.employee-listing',['list' => $list,'pms' => $pms]);

      } else {return view('admin.error.unauthenticate');}
       
    }
	   public function employee_delete(Request $request) {

    $eid       = $request->id;
    $deleteemp = Admin::where('id', '=', $eid)->delete();
    if ($deleteemp == 1) {
      Session::flash('success', 'Deleted successfully ');
    } else {
      Session::flash('failure', 'No Deletion!');
    }

  }

public function employee_status_inactive(Request $request) {

    $uid    = $request->userid;
    $status = $request->status;
   
    if ($status == '1') {
      $user_status = Admin::where('id', '=', $uid)->update(['status' => '0']);
    } else if ($status == '0') {
      $user_status = Admin::where('id', '=', $uid)->update(['status' => '1']);
    }
  }

  public function emp_edit(Request $request) {
    $id    = $request->id;
    $name  = $request->name;
    $email = $request->email;
    $pm_id = $request->pm_id;
    if ($request->password == NULL) {

      $allexit = Admin::where(['email' => $email])->where('id', '!=', $id)->exists();
      if ($allexit) {
        $data['error'] = $request->email." already exits";
      } else {
        $user = DB::table('admins')->where('id', '=', $id)->update(['name' => $name, 'email' => $email, 'pm_id' => $pm_id]);
        if ($user == 1) {
          Session::flash('success', 'Employee Updated  successfully ');
          $data['error'] = "success";
          return $data;
        } else {
          Session::flash('failure', 'No Updation!');
            $data['error'] = "success";
        }
      }
      return $data;
    } else {
      $password = Hash::make($request->password);

      $allexit = Admin::where(['email' => $email])->where('id', '!=', $id)->exists();
      if ($allexit) {
        $data['error'] = $request->email." already exits";
      } else {
        $user = DB::table('admins')->where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password, 'pm_id' => $pm_id]);
        if ($user == 1) {
          Session::flash('success', 'Employee Updated  successfully ');
          $data['error'] = "success";
          return $data;
        } else {
          Session::flash('failure', 'No Updation!');

        }
      }
      return $data;
    }

  }


//============Start Employee Service list ================
  
  public function EmpServiceList()
    {  
       if(Auth::user()->job_title=='employee' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){

       

       $date=date('Y-m-d');

      $allocates = DB::table('user_service_request')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 2 )
      ->paginate(10);

      
      $workings = DB::table('user_service_request')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 3 )
      ->paginate(10);

       $completes = DB::table('user_service_request')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 6 )
      ->paginate(10);

      $pendings= DB::table('user_service_request')   
      ->where('emp_id','=',Auth::user()->id)
       ->where('status','=', 4)
        ->orwhere('status','=', 5 )
      ->paginate(10);
    
        return view('admin.employee.empServiceList',['allocates' => $allocates , 'workings' => $workings ,'completes' => $completes ,'pendings' => $pendings]);

      } else {return view('admin.error.unauthenticate');}

    }
  

  public function emp_updt_serviceStatus(Request $request)
    {
      

      $emp_id = $request->emp_id; 
      $service_req = $request->service_req;     
      $status = $request->status;
      
      $photo=Emp_service_image::photo($request,'photo');

     
      $time=date("h:i:s");
  
      if($status == '2' ){
      $user_status = DB::table('user_service_request')
     ->where('service_req','=', $service_req )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'3','emp_start_time'=>$time
            ]); 
        }
    
    if($status == '3' ){
      $user_status = DB::table('user_service_request')
     ->where('service_req','=', $service_req )
     ->where('emp_id','=', $emp_id )
     ->update([ 
        'status'=>'5','emp_end_time'=>$time,'image'=>$photo
            ]); 
        }
     
   
            
    }

   



}