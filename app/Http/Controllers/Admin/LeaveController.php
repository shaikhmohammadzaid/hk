<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Session;
use DB;
use Auth; 
use Cache;


class LeaveController extends Controller
{
    	    public function __construct(){ $this->middleware('auth:admin'); }

    
    public function index()
    {  
        return view('admin.admin.leaveManagement.add_leave'); 	
    }

     public function showLeaveDetails(Request $request)
    {  

           $leaves = DB::table('add_leave')->paginate(10);
        return view('admin.admin.leaveManagement.ajax.leaveType',compact('leaves', $leaves));
  
    }
   

    public function AddLeaveType(Request $request)
    {  
    	
    	 $leave_type=$request->leave_type;

	      $allexit =DB::table('add_leave')->where('leave_type', '=', $leave_type)->exists();
           if ($allexit) 
           {
            $data['error'] = $request->leave_type." already exits";
           } 
            else {
          	 $leave =  DB::table('add_leave')->insert(['leave_type'=>$leave_type, 'status'=>1]);
	        if ($leave == 1) {
	          Session::flash('success', 'Leave Type inserted  successfully ');
	          $data['error'] = "success";
	          return $data;
	        }
          }
	       
	      
	      return $data;
    }

     public function UpdateLeaveType(Request $request)
    {  
    	 $leave_id=$request->leave_id;
    	  $leave_type=$request->leave_type;
    	
	      $allexit =DB::table('add_leave')->where('leave_type','=', $leave_type)->where('leave_id', '!=', $leave_id)->exists();

           if ($allexit) {

            $data['error'] = $leave_type." already exits";
          } 
          else {

          	 $leave = DB::table('add_leave')->where('leave_id','=',$leave_id)->update(['leave_type' =>$leave_type]);

	        if ($leave == 1) {

	          Session::flash('success', 'Leave Updated  successfully ');
	          $data['error'] = "success";
	          return $data;
	        } 
	        else {

	          Session::flash('failure', 'No Updation!');
	            $data['error'] = "success";
	        }
          }
	       
	      
	      return $data;
    }

     public function deleteLeaveType(Request $request)
    {  
    	 $leave_id=$request->leave_id;
    	 $delete =  DB::table('add_leave')->where('leave_id', '=', $leave_id)->delete(); 
         if($delete == 1) 
	     {
		   Session::flash('success','Deleted successfully ');
		 } else {
		   Session::flash('failure','No Deletion!');			  
		 }
	      
    }
    
// ================ Start  Employee Apply for Leave ========================    
    public function EmpLeaveApply()
    {  
        $leaves = DB::table('add_leave')->get();
        return view('admin.employee.leaveApply',['leaves' => $leaves]); 	
    }
    

 public function EmpLeavecheck()
    {  
         $id=Auth::user()->id;
        $leaves = DB::table('leave_management')->where('emp_id','=',$id)->paginate(10);
        return view('admin.employee.leaveCheck',['leaves' => $leaves ]);  
    }
    public function AddEmpLeave(Request $request)
    {  
          $emp_id=$request->emp_id;
          $leave_id=$request->leave_id;
          $from_date=$request->from_date;
          $to_date=$request->to_date;
          $discription=$request->discription;

       $id = DB::table('admins')->where('id','=',$request->emp_id)->first();
        
             $pm_id=$id->pm_id;

              $date=date('Y-m-d');

        $leave = DB::table('leave_management')->insert(['emp_id'=>$emp_id, 'leave_id'=>$leave_id,'from_date'=>$from_date,'to_date'=>$to_date, 'discription'=>$discription, 'pm_id'=>$pm_id , 'posting_date'=>$date ]);
 
        if ($leave == 1) {

            Session::flash('success', 'Your Leave Application successfully send to Our Project Manager');
            $data['error'] = "success";
            return $data;
          } 
          else {

            Session::flash('failure', 'Not sending Your Leave Application!');
              $data['error'] = "success";
          }
    }
// ================ End  Employee Apply for Leave ========================


// ================ Start  Project manager Leave management ========================  
public function employeeLeave()
  {  
       $ls = DB::table('add_leave')->get();
    return view('admin.projectmanager.employeeLeaves.employeeLeave',['ls' => $ls ]);  
  }

     public function showEmployeeLeave(Request $request)
    {  

        $id=Auth::user()->id;
        $leaves = DB::table('leave_management')->where('pm_id','=',$id)->paginate(10);

         return view('admin.projectmanager.employeeLeaves.ajax.employeeLeaveinfo',compact('leaves', $leaves));
  
    }

    
    public function EmpLeaveStatus(Request $request)
    {
     
       $id=$request->id;
       $status=$request->status; 
       return response(DB::table('leave_management')->where('id', '=', $id)->update(['status' => $status ]));
        
    }

     public function searchEmployeeLeaves(Request $request)
    {  
         $leave_id=$request->leave_id;
         $status=$request->status;

         if ($status == 0) {

          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                                 ->where('leave_id', '=', $leave_id)
                                 ->paginate(10);

           return view('admin.projectmanager.employeeLeaves.ajax.employeeLeaveinfo',compact('leaves', $leaves));
         }
         else
         {
          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                         ->where('leave_id', '=', $leave_id)
                         ->where('status', '=', $status)
                         ->paginate(10);

       
           return view('admin.projectmanager.employeeLeaves.ajax.employeeLeaveinfo',compact('leaves', $leaves));
         

         }
  
    }

     public function PmLeaveApply()
    {  
        $leaves = DB::table('add_leave')->get();
        return view('admin.projectmanager.leaveApply',['leaves' => $leaves]);   
    }

     public function pmLeavecheck()
    {  
         $id=Auth::user()->id;
        $leaves = DB::table('leave_management')->where('pm_id','=',$id)->where('emp_id','=',NULL)->paginate(10);
        return view('admin.projectmanager.leaveCheck',['leaves' => $leaves ]);  
    }

     public function AddPmLeave(Request $request)
    {  
          $pm_id=$request->pm_id;
          $leave_id=$request->leave_id;
          $from_date=$request->from_date;
          $to_date=$request->to_date;
          $discription=$request->discription;

      

              $date=date('Y-m-d');

        $leave = DB::table('leave_management')->insert(['pm_id'=>$pm_id , 'leave_id'=>$leave_id,'from_date'=>$from_date,'to_date'=>$to_date, 'discription'=>$discription,  'posting_date'=>$date ]);
 
        if ($leave == 1) {

            Session::flash('success', 'Your Leave Application successfully send to Our Admin');
            $data['error'] = "success";
            return $data;
          } 
          else {

            Session::flash('failure', 'Not sending Your Leave Application!');
              $data['error'] = "success";
          }
    }
// ================ End  Project manager Leave management ========================

// ================ Start Admin Leave management ========================  
   public function AdminemployeeLeave()
    {  
       $ls = DB::table('add_leave')->get();
      return view('admin.admin.leaveManagement.employeeLeave',['ls' => $ls ]);  
    }

     public function showAdminEmployeeLeave(Request $request)
    {  

        $leaves = DB::table('leave_management')->where('emp_id','!=',NULL)->paginate(10);

         return view('admin.admin.leaveManagement.ajax.employeeLeaveinfo',compact('leaves', $leaves));
  
    }

   

     public function searchAdminEmployeeLeaves(Request $request)
    {  
         $leave_id=$request->leave_id;
         $status=$request->status;

         if ($status == 0) {

          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                                 ->where('leave_id', '=', $leave_id)
                                 ->paginate(10);

           return view('admin.admin.leaveManagement.ajax.employeeLeaveinfo',compact('leaves', $leaves));
         }
         else
         {
          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                         ->where('leave_id', '=', $leave_id)
                         ->where('status', '=', $status)
                         ->paginate(10);

       
           return view('admin.admin.leaveManagement.ajax.employeeLeaveinfo',compact('leaves', $leaves));
         

         }
  
    }

    public function AdminPmLeave()
  {  
       $pmls = DB::table('add_leave')->get();
    return view('admin.admin.leaveManagement.pmLeave',['pmls' => $pmls ]);  
  }

     public function showAdminPmLeave(Request $request)
    {  

        
        $leaves = DB::table('leave_management')->where('emp_id','=',NULL)->paginate(10);

         return view('admin.admin.leaveManagement.ajax.pmLeaveinfo',compact('leaves', $leaves));
  
    }

   

     public function searchAdminPmLeaves(Request $request)
    {  
         $leave_id=$request->leave_id;
         $status=$request->status;

         if ($status == 0) {

          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                                 ->where('leave_id', '=', $leave_id)
                                 ->paginate(10);

           return view('admin.admin.leaveManagement.ajax.pmLeaveinfo',compact('leaves', $leaves));
         }
         else
         {
          $from = $request->start;
            $to = $request->end;
            $leaves=DB::table('leave_management')->whereBetween('from_date', [$from, $to])
                         ->where('leave_id', '=', $leave_id)
                         ->where('status', '=', $status)
                         ->paginate(10);

       
           return view('admin.admin.leaveManagement.ajax.pmLeaveinfo',compact('leaves', $leaves));
         

         }
  
    }

    public function PmLeaveStatus(Request $request)
    {
     
       $id=$request->id;
       $status=$request->status; 
       return response(DB::table('leave_management')->where('id', '=', $id)->update(['status' => $status ]));
        
    }
// ================ End  Admin Leave management ======================== 




}
