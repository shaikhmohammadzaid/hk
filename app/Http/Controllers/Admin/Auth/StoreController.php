<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Session;
use DB;
use Auth; 
use Cache;


class StoreController extends Controller
{
    	    public function __construct(){ $this->middleware('auth:admin'); }

    
    public function index()
    {  
        return view('admin.admin.StoreManagement.add_item'); 	
    }

     public function showStoreDetails(Request $request)
    {  

           $leaves = DB::table('store_managment')->paginate(10);
        return view('admin.admin.StoreManagement.ajax.itemlist',compact('leaves', $leaves));
  
    }
   

    public function additems(Request $request)
    {  
    	
    	 $leave_type=$request->leave_type;
        $qua=$request->qua;

	      $allexit =DB::table('store_managment')->where('item_name', '=', $leave_type)->exists();
           if ($allexit) 
           {
            $data['error'] = $request->leave_type." already exits";
           } 
            else {
          	 $leave =  DB::table('store_managment')->insert(['item_name'=>$leave_type, 'qua'=>$qua]);
	        if ($leave == 1) {
	          Session::flash('success', 'Item inserted  successfully ');
	          $data['error'] = "success";
	          return $data;
	        }
          }
	       
	      
	      return $data;
    }

     public function UpdateItem(Request $request)
    {  
    	 $leave_id=$request->leave_id;
    	  $leave_type=$request->leave_type;
        $qun=$request->qun;
    	
	      $allexit =DB::table('store_managment')->where('item_name','=', $leave_type)->where('id', '!=', $leave_id)->exists();

           if ($allexit) {

            $data['error'] = $leave_type." already exits";
          } 
          else {

          	 $leave = DB::table('store_managment')->where('id','=',$leave_id)->update(['leave_type' =>$leave_type,'qun' =>$qun]);

	        if ($leave == 1) {

	          Session::flash('success', 'Items Updated  successfully ');
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

     public function deleteItem(Request $request)
    {  
    	 $leave_id=$request->leave_id;
    	 $delete =  DB::table('store_managment')->where('id', '=', $leave_id)->delete(); 
         if($delete == 1) 
	     {
		   Session::flash('success','Deleted successfully ');
		 } else {
		   Session::flash('failure','No Deletion!');			  
		 }
	      
    }
    

// ================ End  Admin Store management ======================== 




}
