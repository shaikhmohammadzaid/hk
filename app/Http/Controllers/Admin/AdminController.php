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

class AdminController extends Controller{ 
   
    public function __construct(){ $this->middleware('auth:admin'); }
	
    public function index()
    {  
     	$ads =Admin::where('job_title','=','admin')
     	                          ->orderBy('id', 'desc')
                                  ->paginate(10);
	 
		$pms = DB::table('admins')
		->where('job_title','=','projectmanager') 
		->orderBy('id', 'desc')
		->where('status','=',1)
		->get();
		
		$locations = DB::table('location')->get();
		$branches = DB::table('branch')->get();
		$role = DB::table('role')->get();
   
        return view('admin.admin.index',['ads' => $ads , 'pms' => $pms ,'locations' => $locations , 'branches' => $branches , 'role' => $role]);
    }


    
     public function adminProfile()
    {  
    	  $id=Auth::user()->id;
     	$profile = DB::table('admins')->where('id','=',$id)->get();

        return view('admin.profile.profile',['profile' => $profile]);
    }


	 public function task()
    {  
     	$tasks = DB::table('task_list')->paginate(10); 
        return view('admin.admin.task',['tasks' => $tasks]);
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

	 public function show_emp(Request $request)
    {
              if ($request->ajax()) 
              {
                  
                 return response(DB::table('admins')->where('pm_id','=',$request->pm_id)->get());
              }
    }
    
    public function add_admin(Request $request)
    {  
    		 $name = $request->name;     
	        $email = $request->email;				 
	        $password =  Hash::make($request->password);
			$job_title = $request->job_title;  
			$location = $request->location;
			$branch = $request->branch;
			$pm_id = $request->pm_id;
			$block = $request->block;
	  
	        $allexit = Admin::where([ 'email'=>$email ])->exists();
			if($allexit)
			{
			  $data['error']= $request->email ." already exits";
			}
			else
			{
			 $user = DB::table('admins')->insert(['name'=>$name, 'email'=>$email,'password'=>$password,'job_title'=>$job_title ,'location_id'=>$location,'branch_id'=>$branch,'block'=>$block ,'pm_id'=>$pm_id ]);  
				if($user == 1) {
				  Session::flash('success','Added  successfully ');
				  $data['error'] = "success";
				  return $data;
				} else {
				  Session::flash('failure','No inserted!');
				  
				}
			} 
			return $data;
    	
    }

     public function add_role(Request $request)
    {  
    		 $name = $request->name;     
	      
			 $user = DB::table('role')->insert(['role'=>$name ]);  
				if($user == 1) {
				  Session::flash('success','Added  successfully ');
				  $data['error'] = "success";
				  return $data;
				} else {
				  Session::flash('failure','No inserted!');
				  
				}
			
			
    	
    }
	
	public function admin_status_inactive(Request $request)
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
	
	public function admin_delete(Request $request)
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

    public function delete_task(Request $request)
    {
       
      $uid = $request->id;       
      $deletes =  DB::table('task_list')->where('tasklist_id', '=', $uid)->delete(); 
      dd($uid);
      if($deletes == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }
    //Dharit
    public function edit_task(Request $request)
    {
     
    	 $task_id=$request->task_id;
    	 $task_name=$request->task_name; 
    	 $task_price=$request->task_price;
         $task = DB::table('task_list')->where('tasklist_id', '=', $task_id)->update(['task_name' => $task_name,'task_price' => $task_price]);

	    if ($task == 1) {
	        Session::flash('success', 'Task Updated  successfully ');
 
	    } else {
	        Session::flash('failure', 'No Updation!');
	        
	    }
        
    }
	
	public function edit_admin(Request $request)
    {  
	    $id = $request->id;
        $name = $request->name;     
        $email = $request->email;	
		//===============================
		if ($request->password != NULL) 
        {
				   $password =  Hash::make($request->password);
			        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
					if($allexit)
					{
					  $data['error']= $request->email ." already exits";
					}
					else
					{
					 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email
					 ,'password'=>$password] );  
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
		else
		{
		   $job_title = $request->job_title;    
		          
		        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
				if($allexit)
				{
				  $data['error']= $request->email ." already exits";
				}
				else
				{
				 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email] );  
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
		
		
    }
	
	public function add_task(Request $request)
    {    
		$task_name = $request->task_name; 
		$task_price = $request->task_price;
		$task = DB::table('task_list')->insert(['task_name'=>$task_name,'task_price'=>$task_price ] );  
		if($task == 1)
		{
			Session::flash('success','Task inserted  successfully ');
		} else {
			Session::flash('failure','No inserted!');	  
		}
		 
       
    }
// ==================  START LOCATION  =================================
    public function location()
    {  
     	$locations = DB::table('location')->paginate(10); 
        return view('admin.admin.location.index',['locations' => $locations]);
    }
    
       public function add_location(Request $request)
    {  
    	
    	 $location_name=$request->location_name;

	      $allexit =DB::table('location')->where('location_name', '=', $location_name)->exists();
           if ($allexit) {
          $data['error'] = $request->location_name." already exits";
          } else {
          	 $location =  DB::table('location')->insert(['location_name'=>$location_name]);
	        if ($location == 1) {
	          Session::flash('success', 'Location inserted  successfully ');
	          $data['error'] = "success";
	          return $data;
	        }
          }
	       
	      
	      return $data;
    }

     public function edit_location(Request $request)
    {  
    	 $location_id=$request->location_id;
    	 $location_name=$request->location_name;

	      $allexit =DB::table('location')->where('location_name', '=', $location_name)->where('location_id', '!=', $location_id)->exists();
           if ($allexit) {
         $data['error'] = $request->location_name." already exits";
          } else {
          	 $location = DB::table('location')->where('location_id', '=', $location_id)->update(['location_name' => $location_name]);
	        if ($location == 1) {
	          Session::flash('success', 'Updated  successfully ');
	          $data['error'] = "success";
	          return $data;
	        } else {
	          Session::flash('failure', 'No Updation!');
	            $data['error'] = "success";
	        }
          }
	       
	      
	      return $data;
    }
    
     public function delete_location(Request $request)
    {  
    	 $location_id=$request->location_id;
    	 $delete =  DB::table('location')->where('location_id', '=', $location_id)->delete(); 
         if($delete == 1) 
	     {
		   Session::flash('success','Deleted successfully ');
		 } else {
		   Session::flash('failure','No Deletion!');			  
		 }
	      
    }
// ==================  END LOCATION  =================================

// ==================  START LOCATION  =================================
	public function branch()
    {  
    	$locations = DB::table('location')->get();
     	$branches = DB::table('branch')->orderBy('branch.branch_id','desc')->paginate(10); 
        return view('admin.admin.branch.branch',['branches' => $branches,'locations' => $locations]);
    }

      public function add_branch(Request $request)
    {  
    	
    	 $location_id=$request->location_id;
    	 $branch_name=$request->branch_name;

	      $allexit =DB::table('branch')->where('branch_name', '=', $branch_name)->where('location_id', '=', $location_id)->exists();
           if ($allexit) {
          $data['error'] = $request->branch_name." already exits";
          } else {
          	 $location =  DB::table('branch')->insert(['branch_name'=>$branch_name,'location_id'=>$location_id]);
	        if ($location == 1) {
	          Session::flash('success', 'Branch inserted  successfully ');
	          $data['error'] = "success";
	          return $data;
	        }
          }
	       
	      
	      return $data;
    }

     public function edit_branch(Request $request)
    {  
    	 $branch_id=$request->branch_id;
    	  $branch_name=$request->branch_name;
    	 $location_id=$request->location_name;
       
	      $allexit =DB::table('branch')->where('branch_name', '=', $branch_name)->where('location_id', '=', $location_id)->where('branch_id', '!=', $branch_id)->exists();
           if ($allexit) {
          $data['error'] = $request->branch_name." already exits";
          } else {
          	 $location = DB::table('branch')->where('branch_id', '=', $branch_id)->update(['branch_name' => $branch_name,'location_id' => $location_id]);
	        if ($location == 1) {
	          Session::flash('success', 'Updated  successfully ');
	          $data['error'] = "success";
	          return $data;
	        } else {
	          Session::flash('failure', 'No Updation!');
	            $data['error'] = "success";
	        }
          }
	       
	      
	      return $data;
    }

     public function delete_branch(Request $request)
    {  
    	 $branch_id=$request->branch_id;
    	 $delete =  DB::table('branch')->where('branch_id', '=', $branch_id)->delete(); 
         if($delete == 1) 
	     {
		   Session::flash('success','Deleted successfully ');
		 } else {
		   Session::flash('failure','No Deletion!');			  
		 }
	      
    }
// ==================  END BRANCH  =================================

    
// ================Start Service Management ==========================
     public function AdminServiceRequest()
    {  
       if(Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){
        
          
          $tasks = DB::table('task_list')->get();
          
        return view('admin.admin.serviceRequest.serviceRequest',[ 'tasks' => $tasks ]);

         } else {return view('admin.error.unauthenticate');}
    }

    public function showServiceRequest(Request $request)
    {  

           $services = DB::table('user_service_request')->paginate(10);
        return view('admin.admin.serviceRequest.ajax.serviceinfo',compact('services', $services));
  
    }

      public function searchServiceRequest(Request $request)
    {  

    	   $service_id=$request->service_id;
       $status=$request->status;
       
         if ($status == 0) {
         	
         echo   $from = $request->start;
          $to = $request->end;
         exit;
       $services = DB::table('user_service_request')->whereBetween('service_date', [$from, $to])
                                                   ->where('service_id', '=', $request->service_id)
                                                    ->paginate(10);
    
        return view('admin.admin.serviceRequest.ajax.serviceinfo',compact('services', $services));
          
         }
         else
         {
         	 $from = $request->start;
          $to = $request->end;
        
       $services = DB::table('user_service_request')->whereBetween('service_date', [$from, $to])
                                                    ->where('service_id', '=', $request->service_id)
                                                    ->where('status', '=', $request->status)
                                                    ->paginate(10);
       
        return view('admin.admin.serviceRequest.ajax.serviceinfo',compact('services', $services));
         

         }
         
 
    }

// ================Start Service Management ==========================


     public function user_balances()
    {
    	$balances=DB::table('add_money') 
		->join('admins','admins.id','=','add_money.cashopt_id') 
		->orderBy('add_money.id','desc')
		->paginate(10); 
		return view('admin.user.user_balances',['balances'=>$balances]);
    	
    }


    public function edit_profile(Request $request)
    {  
	    $id = $request->id;
        $name = $request->name;     
        $email = $request->email;	
		//===============================
		if ($request->password != NULL) 
        {
				   $password =  Hash::make($request->password);
			        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
					if($allexit)
					{
					  $data['error']= $request->email ." already exits";
					}
					else
					{
					 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email
					 ,'password'=>$password] );  
						if($user == 1) {
						  Session::flash('success','Update successfully ');
						  $data['error'] = "success";
						  return $data;
						} else {
						  Session::flash('failure','No inserted!');
						  
						}
					} 
					 return $data;
					
		}
		else
		{
		       
		        $allexit = Admin::where([ 'email'=>$email ])->where('id','!=',$id)->exists();
				if($allexit)
				{
				  $data['error']= $request->email ." already exits";
				}
				else
				{
				 $user = DB::table('admins')->where('id', $id)->update(['name'=>$name, 'email'=>$email] );  
					if($user == 1) {
					  Session::flash('success','Updated successfully ');
					  $data['error'] = "success";
					  return $data;
					} else {
					  Session::flash('failure','No inserted!');
					  
					}
				} 
				 return $data;
				
		}
		
		
    }
    
	
}