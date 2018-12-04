<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
     public function service_Request(Request $request)
    {  
      
        
       
         $status=$request->status;
        $from = $request->start;
         $to = $request->end;
       
       $services = DB::table('user_service_request')->whereBetween('service_date', [$from, $to]) 
                                                    ->where('status', '=',$status)
                                                    ->get();
                                                    
          return response()->json($services);
         
         

        
         
 
    }

}
