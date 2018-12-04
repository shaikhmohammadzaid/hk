<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use Session;
use DB;
use Auth; 
use Cache;

class ServiceController extends Controller
{
      public function __construct()  {  $this->middleware('auth'); }

      
      public function ourServices()
    {  
     	
		
		$oss = DB::table('task_list')->get();

        return view('ourservices',['oss' => $oss ]);
    }
    
     public function add_service_req(Request $request)
    {  

     if ($request->location_id != NULL || $request->block != NULL) {
         
     	 $id = DB::table('admins')->where('block','=',$request->block)
     	                          ->orWhere('location','=',$request->location_id)
     	                          ->first();

     	       $pm_id=$id->id;                
      
         // if ($pm_id != NULL) {
             	 $user_id = $request->user_id;     
	             $service_id = $request->service_id;	
	             $location_id = $request->location_id;	
	             $branch_id = $request->branch_id;	
	             $block = $request->block;	
	             $floor = $request->floor_no;	
	             $shop_no = $request->shop_no;	
	             $address = $request->address;
	             $service_date = $request->service_date;
	             $service_start_time = $request->service_start_time;
	             $service_end_time = $request->service_end_time;	
                 $status=1;
               
	         foreach($service_id as $key => $value)
                  {
                    
                  	  $price=$key;
                  	  $i=$value;
                  	 $user = DB::table('user_service_request')->insert(['user_id'=>$user_id ,'pm_id'=>$pm_id, 'service_id'=>$i,'service_price'=>$price,'service_date'=>$service_date,'service_start_time'=>$service_start_time ,'service_end_time'=>$service_end_time ,'location'=>$location_id,'branch'=>$branch_id,'block'=>$block ,'floor'=>$floor,'shop_no'=>$shop_no,'address'=>$address,'status'=>$status ]); 
                    
                  }

		 
				if($user == 1) {
				  Session::flash('success','Send Successfully ');
				  $data['error'] = "success";
				  return $data;
				} else {
				  Session::flash('failure','No inserted!');
				  
				}
			return $data;
      //        }
      //        else
      //        {
      //            Session::flash('fail','This Block Have NO Project-Manager');
				  // $data['error'] = "fail";
				  // return $data;
      //        }
          
        }
       else {
				  Session::flash('fail','our Full address-Block or Location  Not found check in your profile');
				  $data['error'] = "fail";
				  return $data;
			}

   }

}
