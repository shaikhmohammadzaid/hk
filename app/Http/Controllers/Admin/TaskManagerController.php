<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Session;
use DB;
use Auth; 
use Cache;
use Mail;
use App\Models\Task_management;
use App\Models\Dtask_management;


class TaskManagerController extends Controller
{
	public function __construct(){ $this->middleware('auth:admin'); }
    
    public function index()
    {  
    	
     	$tasks = DB::table('task_list')->get();
     	$pms = DB::table('admins')->where('job_title','=','projectmanager')
                                ->where('status','=',1)->get();
	
        return view('admin.admin.taskManager.taskmanager',['pms' => $pms ,'tasks' => $tasks]); 	
    }
     public function dindex()
    {  
      
      $tasks = DB::table('task_list')->get();

            $role = DB::table('role')->get();
      $pms = DB::table('admins')->where('job_title','=','projectmanager')
                                ->where('status','=',1)->get();
  
        return view('admin.admin.taskManager.dtaskmanager',['pms' => $pms ,'tasks' => $tasks , 'role' => $role]);  
    }

     public function showTaskRequest(Request $request)
    {  
         $tms=Task_management::orderBy('task_management.task_id','desc')->paginate(10);
           
        return view('admin.admin.taskmanager.ajax.taskmanagerinfo',compact('tms', $tms));
  
    }

     public function showdTaskRequest(Request $request)
    {  
         $tms=Dtask_management::orderBy('dtask_management.task_id')->paginate(10);
           
        return view('admin.admin.taskmanager.ajax.dtaskmanagerinfo',compact('tms', $tms));
  
    }

     public function searchTaskRequest(Request $request)
    {  
         $title=$request->title;
         $status=$request->status;

         if ($status == 0) {

         	$from = $request->start;
            $to = $request->end;
            $tms=Task_management::whereBetween('assign_date', [$from, $to])
                                 ->where('title', '=', $title)
                                 ->paginate(10);
             
           return view('admin.admin.taskmanager.ajax.taskmanagerinfo',compact('tms', $tms));
         }
         else
         {
         	$from = $request->start;
            $to = $request->end;
            $tms=Task_management::whereBetween('assign_date', [$from, $to])
                         ->where('title', '=', $title)
                         ->where('status', '=', $status)
                         ->paginate(10);

       
           return view('admin.admin.taskmanager.ajax.taskmanagerinfo',compact('tms', $tms));
         

         }
           
 
    }


 public function searchdTaskRequest(Request $request)
    {  
         $title=$request->title;
         $status=$request->status;

         if ($status == 0) {

          $from = $request->start;
            $to = $request->end;
            $tms=Dtask_management::whereBetween('assign_date', [$from, $to])
                                 ->where('title', '=', $title)
                                 ->paginate(10);
             
           return view('admin.admin.taskmanager.ajax.dtaskmanagerinfo',compact('tms', $tms));
         }
         else
         {
          $from = $request->start;
            $to = $request->end;
            $tms=Dtask_management::whereBetween('assign_date', [$from, $to])
                         ->where('title', '=', $title)
                         ->where('status', '=', $status)
                         ->paginate(10);

       
           return view('admin.admin.taskmanager.ajax.dtaskmanagerinfo',compact('tms', $tms));
         

         }
           
 
    }


	    /**
	   * Action to render insert task ASSIGN.
	 
	   */
		  public function add_task_assign(Request $request){

        
		    
        if ($request->ajax()){
		       
		       $t = new Task_management;

              $t->title=$request->title;
              $t->description=$request->description;
              $t->pm_id=$request->pm_id;
              $t->assign_date=$request->assign_date;
              $t->start_time=$request->start_time;
              $t->end_time=$request->end_time;
              $t->status=1;
              
    
              
             if ($t->save()) {
               session()->flash('success_msg', "Task Assined Successfully.");
              $data = "success";
              return $data;  
             }
 
		    }

		  }


       public function add_dtask_assign(Request $request){




   $name = $request->title;   
         $role = $request->role;   
       
      
     $pmss = DB::table('admins')->where('job_title','=',$role)
                               ->get();
     
           $curdate=date('Y-m-d');

    foreach ($pmss as $key) {

      echo $rid=$key->id;


        
       $user = DB::table('task_management')->insert(['emp_id'=>$rid,'status'=>'2','title'=>$name ,'assign_date'=>$curdate ,'fixed'=>'1']);  

       $user = DB::table('dtask_management')->insert(['emp_id'=>$rid,'status'=>'2','title'=>$name ,'assign_date'=>$curdate ]);  
       

          
        
      

    

}
        
      

      }


		  public function deleteAssignTask(Request $request)
		  {
		  	if ($request->ajax())
		  	{
		  		
		  	     $delete =  DB::table('task_management')->where('task_id', '=', $request->task_id)->delete(); 

		  	     if ($delete) 
		  	     {
		  	     	 session()->flash('success_msg', "Assign Task is Successfully Delete.");
                     $data = "success";
                      return $data;
		  	     }
		    }
		  }


      public function deletedAssignTask(Request $request)
      {
        if ($request->ajax())
        {
          
             $delete =  DB::table('dtask_management')->where('task_id', '=', $request->task_id)->delete(); 

             if ($delete) 
             {
               session()->flash('success_msg', "Assign Task is Successfully Delete.");
                     $data = "success";
                      return $data;
             }
        }
      }  


         public function updateAssignTask(Request $request)
		  {
		  	if ($request->ajax())
		  	{
		  	 $update = Task_management::where('task_id',$request->task_id)
                ->update($request->all()); 

                 if ($update) 
		  	     {
		  	     	 session()->flash('success_msg', "Assign Task is Upadte Successfully Delete.");
                     $data = "success";
                      return $data;
		  	     }  
                //return response(Task_management::find($request->task_id));
		    }
		  }  


         public function updatedAssignTask(Request $request)
      {
        if ($request->ajax())
        {
         $update = Dtask_management::where('task_id',$request->task_id)
                ->update($request->all()); 

                 if ($update) 
             {
               session()->flash('success_msg', "Assign Task is Upadte Successfully Delete.");
                     $data = "success";
                      return $data;
             }  
                //return response(Task_management::find($request->task_id));
        }
      }  




}
