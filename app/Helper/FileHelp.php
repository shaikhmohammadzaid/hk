<?php 

use App\Models\Admin;
use Carbon\Carbon;

function menuActive($route_name)
{
    return Route::currentRouteName() == $route_name ? 'active' : '';
}
//===========Start Admin // Sub-Admin Dashboard =========================
    function total_amount()
        {
              $total_amount = DB::table('add_money')->sum('add_money.add_amount'); 
                return $total_amount;   
        }

    function today_amount()
        {
              $today_amount = DB::table('add_money')->whereDate('created_at', Carbon::today())->sum('add_money.add_amount'); 
                return $today_amount;   
        }

     function today_users()
        {
              $today_users = DB::table('users')->whereDate('created_at', Carbon::today())->count(); 
                return $today_users;   
        }


    function total_task() 
       { 
         $date=date('Y-m-d');
        $task = DB::table('task_management')->count(); 
        return $task;
       }
        function total_task_todo() 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('task_management')->where('status','=', 2 )->count(); 
        return $todo;
       }
        function total_task_working() 
       { 
         $date=date('Y-m-d');
        $working = DB::table('task_management')->where('status','=', 3 )->count(); 
        return $working;
       }
         function total_task_pending() 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('task_management')->where('status','=', 4 )->orwhere('status','=', 5 )->count(); 
        return $pending;
       }
         function total_task_complete() 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('task_management')->where('status','=', 6 )->count(); 
        return $complete;
       }

       

    function total_service() 
       { 
         $date=date('Y-m-d');
        $service = DB::table('user_service_request')->count(); 
        return $service;
       }

        function total_service_todo() 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('user_service_request')->where('status','=', 2 )->count(); 
        return $todo;
       }
        function total_service_working() 
       { 
         $date=date('Y-m-d');
        $working = DB::table('user_service_request')->where('status','=', 3 )->count(); 
        return $working;
       }
         function total_service_pending() 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('user_service_request')->where('status','=', 4 )->orwhere('status','=', 5 )->count(); 
        return $pending;
       }
         function total_service_complete() 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('user_service_request')->where('status','=', 6 )->count(); 
        return $complete;
       }

//===========End Admin // Sub-Admin Dashboard =========================


//===========Start Cash Opreater Dashboard =========================
   

    function today_cashopt_amount($cashopt_id)
        {
              $today_amount = DB::table('add_money')->where('cashopt_id','=', $cashopt_id)->whereDate('created_at', Carbon::today())->sum('add_money.add_amount'); 
                return $today_amount;   
        }

    

//===========End  Dashboard =========================

//===========Start Project Manager Dashboard =========================
    function total_pm_emp($pm_id) 
    { 
      $total_pm_emp = DB::table('admins')->where('pm_id','=',$pm_id)->count(); return $total_pm_emp; 
    }

     function total_pm_emp_active($pm_id) 
    { 
      $total_pm_emp_active = DB::table('admins')->where('pm_id','=',$pm_id)->where('status','=',1)->count();
       return $total_pm_emp_active; 
    }
    
     function total_pm_emp_leave($pm_id) 
    { 
      $total_pm_emp_active = DB::table('admins')->where('pm_id','=',$pm_id)->where('status','=',0)->count();
       return $total_pm_emp_active; 
    }

     function total_pm_task($pm_id) 
       { 
         $date=date('Y-m-d');
        $task = DB::table('task_management')->where('pm_id','=',$pm_id)->count(); 
        return $task;
       }
        function total_pm_task_todo($pm_id) 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('task_management')->where('pm_id','=',$pm_id)->where('status','=', 2 )->count(); 
        return $todo;
       }
        function total_pm_task_working($pm_id) 
       { 
         $date=date('Y-m-d');
        $working = DB::table('task_management')->where('pm_id','=',$pm_id)->where('status','=', 3 )->count(); 
        return $working;
       }
         function total_pm_task_pending($pm_id) 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('task_management')->where('pm_id','=',$pm_id)->where('status','=', 4 )->orwhere('status','=', 5 )->count(); 
        return $pending;
       }
         function total_pm_task_complete($pm_id) 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('task_management')->where('pm_id','=',$pm_id)->where('status','=', 6 )->count(); 
        return $complete;
       }


        function total_pm_service($pm_id) 
       { 
         $date=date('Y-m-d');
        $task = DB::table('user_service_request')->where('pm_id','=',$pm_id)->count(); 
        return $task;
       }
        function total_pm_service_todo($pm_id) 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('user_service_request')->where('pm_id','=',$pm_id)->where('status','=', 2 )->count(); 
        return $todo;
       }
        function total_pm_service_working($pm_id) 
       { 
         $date=date('Y-m-d');
        $working = DB::table('user_service_request')->where('pm_id','=',$pm_id)->where('status','=', 3 )->count(); 
        return $working;
       }
         function total_pm_service_pending($pm_id) 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('user_service_request')->where('pm_id','=',$pm_id)->where('status','=', 4 )->orwhere('status','=', 5 )->count(); 
        return $pending;
       }
         function total_pm_service_complete($pm_id) 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('user_service_request')->where('pm_id','=',$pm_id)->where('status','=', 6 )->count(); 
        return $complete;
       }
   

//===========End Project Manager Dashboard =========================



    function getfilename($file){
        $microtime       = microtime();
        $search          = array('.',' ');
        $microtime       = str_replace($search, "_", $microtime);
        $fileName_replace = str_replace(' ', "_", $file->getClientOriginalName());
        $fileName        = $microtime.'_'.$fileName_replace;

        return $fileName;
    }
	
    function getfolderpathexit($filepath,$imagename){
        $file_exit = $filepath.'/'.$imagename;
        if (empty($imagename)) {
            return "no";
        }else{
            if (file_exists($file_exit)) {
                return "yes";
            }else{
                return "no";
            }
        }
    }

    function UnlinkImage($filepath,$fileName){
        $old_image = $filepath.$fileName;
        
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
    }
    
     function message() {    
       $message = DB::table('message')->select('message')->get(); 
       return $message[0]->message;
    }

    function message_count($id) { 	 
	   $message = DB::table('admin_messages')->where('user_id','=',$id)->where('message_read','=',0)->count(); 
       return $message;
    }

     function message_title($id) {   
       $message = DB::table('admin_messages')->where('user_id','=',$id)
                                    ->where('message_read','=',0)
                                    ->orderBy('admin_messages.message_id','desc')
                                    ->limit(5)->get(); 
       return $message;

    }
//  Admin Counting of total, active, inactive starts here	
	function totaladmin() { $totaladmin = DB::table('admins')->where('job_title','=','admin')->count(); return $totaladmin; }
	function totaladmin_active() { $totaladmin_active = DB::table('admins')->where('job_title','=','admin')->where('status','=',1)->count(); return $totaladmin_active; }	
	function totaladmin_inactive() { $totaladmin_inactive = DB::table('admins')->where('job_title','=','admin')->where('status','=',0)->count(); return $totaladmin_inactive; }
 
 //  Subadmin Counting of total, active, inactive starts here	
	function totalsubadmin() { $totalsubadmin = DB::table('admins')->where('job_title','=','subadmin')->count(); return $totalsubadmin; }
	function totalsubadmin_active() { $totalsubadmin_active = DB::table('admins')->where('job_title','=','subadmin')->where('status','=',1)->count(); return $totalsubadmin_active; }	
	function totalsubadmin_inactive() { $totalsubadmin_inactive = DB::table('admins')->where('job_title','=','subadmin')->where('status','=',0)->count(); return $totalsubadmin_inactive; }	
		
//  User Counting of total, active, inactive starts here	
	function totaluser() { $totaluser = DB::table('users')->count(); return $totaluser; }
	function totaluser_active() { $totaluser_active = DB::table('users')->where('status','=',1)->count(); return $totaluser_active; }
	function totaluser_inactive() { $totaluser_inactive = DB::table('users')->where('status','=',0)->count(); return $totaluser_inactive; }
 


 
//  Project Manager Counting of total, active, inactive starts here	
	function totalprojectmanager() { $totalprojectmanager = DB::table('admins')->where('job_title','=','projectmanager')->count(); return $totalprojectmanager; }
	function totalprojectmanager_active() { $totalprojectmanager_active = DB::table('admins')->where('job_title','=','projectmanager')->where('status','=',1)->count(); return $totalprojectmanager_active; }	
	function totalprojectmanager_inactive() { $totalprojectmanager_inactive = DB::table('admins')->where('job_title','=','projectmanager')->where('status','=',0)->count(); return $totalprojectmanager_inactive; }

//  Cash Operator Counting of total, active, inactive starts here	
	function totalcashoperator() { $totalcashoperator = DB::table('admins')->where('job_title','=','cashoperator')->count(); return $totalcashoperator; }
	function totalcashoperator_active() { $totalcashoperator_active = DB::table('admins')->where('job_title','=','cashoperator')->where('status','=',1)->count(); return $totalcashoperator_active; }	
	function totalcashoperator_inactive() { $totalcashoperator_inactive = DB::table('admins')->where('job_title','=','cashoperator')->where('status','=',0)->count(); return $totalcashoperator_inactive; }


//  Employee Counting of total, active, inactive starts here	
	function totalemployee() { $totalemployee = DB::table('admins')->where('job_title','=','employee')->count(); return $totalemployee; }
	function totalemployee_active() { $totalemployee_active = DB::table('admins')->where('job_title','=','employee')->where('status','=',1)->count(); return $totalemployee_active; }	
	function totalemployee_inactive() { $totalemployee_inactive = DB::table('admins')->where('job_title','=','employee')->where('status','=',0)->count(); return $totalemployee_inactive; }	
  function totalemployee_leave() { $totalemployee_leave = DB::table('admins')->where('job_title','=','employee')->where('status','=',2)->count(); return $totalemployee_leave; } 

//  Contact Counting of total read and unread starts here	
	function totalcontact() { $totalcontact = DB::table('contacts')->count(); return $totalcontact; }
	function totalcontact_read() { $totalcontact_read = DB::table('contacts')->where('msg_read','=','1')->count(); return $totalcontact_read; }	
    function totalcontact_unread() { $totalcontact_unread = DB::table('contacts')->where('msg_read','=','0')->count(); return $totalcontact_unread; }	


     function pm_task_status($status,$task_id) { 
      
         if ($status == 1) 
         {
              echo "<span class='label label-primary'>Assign</span>";
         }
         elseif($status == 2)
         {
              echo "<span class='label label-warning'>Allocated</span>";
         }
         elseif($status == 3)
         {
              echo "<span class='label label-danger'>Working</span>";
         }
         elseif($status == 4)
         {
              echo "<span class='label label-info'>Pending</span>";
         }
		 elseif($status == 5)
         {
              
               echo "<a type='button' class='label label-warning' id='review' data-id='$task_id' >Review</a>";
         }
         elseif($status == 6)
         {
              echo "<span class='label label-success'>Completed</span>";
         } 
		 else { }

      

     }

        function task_status($status) { 
      
         if ($status == 1) 
         {
              echo "<span class='label label-primary'>Assign</span>";
         }
         elseif($status == 2)
         {
              echo "<span class='label label-warning'>Allocated</span>";
         }
         elseif($status == 3)
         {
              echo "<span class='label label-danger'>Working</span>";
         }
         elseif($status == 4)
         {
              echo "<span class='label label-info'>Pending</span>";
         }
         elseif($status == 5)
         {
              
               echo "<a type='label' class='label label-warning'  >Review</a>";
         }
         elseif($status == 6)
         {
              echo "<span class='label label-success'>Completed</span>";
         } 
         else { }

      

     }

    function location_name($id) { 
        $location = DB::table('location')->where('location_id','=',$id)->first(); 
        return $location->location_name; 
    } 


		function getpm_name($pid) {	
				$pmname = DB::table('admins')->where('id','=',$pid)->first(); 
				return $pmname->name;	
		}
        function getbalance($id) { 
                $user_balance = DB::table('users')->where('id','=',$id)->first(); 
                return $user_balance->balance;   
        }

        function get_location() { 
                $location = DB::table('location')->get(); 
                return $location;   
        }

        function set_location($id) { 
            if($id)
            {
                 $locations = DB::table('location')->where('location_id','=',$id)->first();
                 return $locations->location_name; 
            }
                 
        }
         function set_branch($id) { 
            if($id)
            {
                 $branches = DB::table('branch')->where('branch_id','=',$id)->first();
                 return $branches->branch_name; 
            }
                 
        }
        
         function pm_service_status($status,$service_req) { 
      
         if ($status == 1) 
         {
              echo "<span class='label label-primary'>Assign</span>";
         }
         elseif($status == 2)
         {
              echo "<span class='label label-warning'>Allocated</span>";
         }
         elseif($status == 3)
         {
              echo "<span class='label label-danger'>Working</span>";
         }
         elseif($status == 4)
         {
              echo "<span class='label label-info'>Pending</span>";
         }
         elseif($status == 5)
         {
              
               echo "<a type='button' class='label label-warning' id='review' data-id='$service_req' style='cursor: pointer;' >Review</a>";
         }
         elseif($status == 6)
         {
              echo "<span class='label label-success'>Completed</span>";
         } 
         else { }

       }

        function service_status($status) { 
          
             if ($status == 1) 
             {
                  echo "<span class='label label-primary'>Assign</span>";
             }
             elseif($status == 2)
             {
                  echo "<span class='label label-warning'>Allocated</span>";
             }
             elseif($status == 3)
             {
                  echo "<span class='label label-danger'>Working</span>";
             }
             elseif($status == 4)
             {
                  echo "<span class='label label-info'>Pending</span>";
             }
             elseif($status == 5)
             {
                  
                   echo "<a type='button' class='label label-warning' id='review' >Review</a>";
             }
             elseif($status == 6)
             {
                  echo "<span class='label label-success'>Completed</span>";
             } 
             else { }

          

         }


        function getUser($id) { 
                $user = DB::table('users')->where('id','=',$id)->first(); 
                return $user->name;   
        }
        
        function getServiceName($id)
        {
            if($id)
            {
                $service123 = DB::table('task_list')->where('tasklist_id','=',$id)->value('task_name'); 
                 return $service123; 
            }
        }

         function get_Name($id)
        {
            // return $id;
              $admin = DB::table('admins')->where('id','=',$id)->get(); 
                return $admin[0]->name;   
        }
        
         function leave_Name($id)
        {
              $leave = DB::table('add_leave')->where('leave_id','=',$id)->get(); 
                return $leave[0]->leave_type;   
        }


       function task_todo($id) 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('task_management')->where('emp_id','=',$id)
                                            ->where('status','=', 2 )
                                            ->count(); 
        return $todo;
       }
          function dtask_todo($id) 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('dtask_management')->where('emp_id','=',$id)
                                            ->where('status','=', 2 )
                                            ->count(); 
        return $todo;
       }

        function task_working($id) 
       { 
         $date=date('Y-m-d');
        $working = DB::table('task_management')->where('emp_id','=',$id)
                                               ->where('status','=', 3 )
                                              ->count(); 
        return $working;
       }

       function dtask_working($id) 
       { 
         $date=date('Y-m-d');
        $working = DB::table('dtask_management')->where('emp_id','=',$id)
                                               ->where('status','=', 3 )
                                              ->count(); 
        return $working;
       }

         function task_pending($id) 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('task_management')->where('emp_id','=',$id)
                                               ->where('status','=', 4 )
                                               ->orwhere('status','=', 5 )
                                              ->count(); 
        return $pending;
       }
        function dtask_pending($id) 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('dtask_management')->where('emp_id','=',$id)
                                               ->where('status','=', 4 )
                                               ->orwhere('status','=', 5 )
                                              ->count(); 
        return $pending;
       }

         function task_complete($id) 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('task_management')->where('emp_id','=',$id)
                                            ->where('status','=', 6 )
                                            ->count(); 
        return $complete;
       }
     
     function dtask_complete($id) 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('dtask_management')->where('emp_id','=',$id)
                                            ->where('status','=', 6 )
                                            ->count(); 
        return $complete;
       }


        function service_todo($id) 
       { 
         $date=date('Y-m-d');
        $todo = DB::table('user_service_request')->where('emp_id','=',$id)
                                            ->where('status','=', 2 )
                                            ->count(); 
        return $todo;
       }
        function service_working($id) 
       { 
         $date=date('Y-m-d');
        $working = DB::table('user_service_request')->where('emp_id','=',$id)
                                            ->where('status','=', 3 )
                                            ->count(); 
        return $working;
       }
         function service_pending($id) 
       { 
         $date=date('Y-m-d');
        $pending = DB::table('user_service_request')->where('emp_id','=',$id)
                                            ->where('status','=', 4 )
                                            ->orwhere('status','=', 5 )
                                            ->count(); 
        return $pending;
       }
         function service_complete($id) 
       { 
         $date=date('Y-m-d');
        $complete = DB::table('user_service_request')->where('emp_id','=',$id)
                                            ->where('status','=', 6 )
                                            ->count(); 
        return $complete;
       }
        
		

?>