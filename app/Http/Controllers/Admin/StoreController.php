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

        $adminss =DB::table('admins')->where('job_title', '!=', 'admin')->get();
        return view('admin.admin.StoreManagement.add_item',['adminss' => $adminss]); 	
    }
  


     public function showStoreDetails(Request $request)
    {  

      $leaves=DB::table('store_managment')->leftjoin('admins as pm_id','pm_id.id','=','store_managment.emp_id')
                   ->select('store_managment.*','pm_id.name as emp_id')
                  
                   ->paginate(10);

 
          /* $leaves = DB::table('store_managment')->paginate(10);*/
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
          	 $leave =  DB::table('store_managment')->insert(['item_name'=>$leave_type, 'qun'=>$qua]);
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

          	 $leave = DB::table('store_managment')->where('id','=',$leave_id)->update(['item_name' =>$leave_type,'qun' =>$qun]);

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

     public function adqun(Request $request)
    {  
       $leave_id=$request->leave_id;
        $leave_type=$request->leave_type;
        $qun=$request->qun;
      
        $allexit =DB::table('store_managment')->where('id', '=', $leave_id)->first();
       
      $per_qun=  $allexit->qun;

      $final =$per_qun + $qun;

         

             $leave = DB::table('store_managment')->where('id','=',$leave_id)->update(['qun' =>$final]);

          if ($leave == 1) {

            Session::flash('success', 'Qauntity Added  successfully ');
            $data['error'] = "success";
            return $data;
          } 
          else {

            Session::flash('failure', 'No Updation!');
              $data['error'] = "success";
          }
          
         
        
        return $data;
    }


     public function showDetails(Request $request)
    {  

      $leaves=DB::table('allocate_items')->leftjoin('admins as pm_id','pm_id.id','=','allocate_items.emp_id')->leftjoin('store_managment as s_id','s_id.id','=','allocate_items.item_id')
                   ->select('allocate_items.*','pm_id.name as emp_id','s_id.item_name as item_id')
                  
                   ->paginate(10);

 
          /* $leaves = DB::table('store_managment')->paginate(10);*/
        return view('admin.admin.StoreManagement.ajax.allocate',compact('leaves', $leaves));
  
    }
    public function allocateditem()
    {  

        $adminss =DB::table('admins')->where('job_title', '!=', 'admin')->get();
        $item =DB::table('store_managment')->get();
        return view('admin.admin.StoreManagement.allocateditem',['adminss' => $adminss , 'item' => $item]);  
    }

      public function allocate(Request $request)
    {  
       $allocate_item=$request->allocate_item;
        $allocate_id=$request->allocate_id;
        $allocate_qun=$request->allocate_qun;
      $date=date('Y-m-d h:i:sa');

        $allexit =DB::table('store_managment')->where('id', '=', $allocate_item)->first();
       
      $per_qun=  $allexit->qun;

      $final =$per_qun - $allocate_qun;

      

          $leaves =  DB::table('allocate_items')->insert(['item_id'=>$allocate_item, 'emp_id'=>$allocate_id, 'allocate_qun'=>$allocate_qun , 'date'=>$date]);
           
          if ($leaves == 1) {
   
             $leave = DB::table('store_managment')->where('id','=',$allocate_item)->update(['qun' =>$final]);


            Session::flash('success', 'Qauntity Allocated successfully ');
            $data['error'] = "success";
            return $data;
          } 
          else {

            Session::flash('failure', 'No Updation!');
              $data['error'] = "success";
          }
          
         
        
        return $data;
    }

public function return(Request $request)
    {  
      $allocate_item=$request->allocate_item;
        $allocate_id=$request->allocate_id;
        $allocate_qun=$request->allocate_qun;

           //primarykey is return itemid 
        $return_item_id=$request->return_item_id;
        $return_quntityy=$request->return_quntityy;
      
 $date=date('Y-m-d h:i:sa');
      
 $allexit =DB::table('store_managment')->where('item_name', '=', $allocate_item)->first();
       
      $per_qun=  $allexit->qun;

      $final =$per_qun + $allocate_qun;
      
         
           
          

      $final_qun =$return_quntityy - $allocate_qun;

       $leaves = DB::table('allocate_items')->where('id','=',$return_item_id)->update(['allocate_qun' =>$final_qun , 'return_date' =>$date]);
           
            

          if ($leaves == 1) {
   
             $leave = DB::table('store_managment')->where('item_name','=',$allocate_item)->update(['qun' =>$final]);


            Session::flash('success', 'Return Item successfully ');
            $data['error'] = "success";
            return $data;
          } 

          else {

            Session::flash('failure', 'No Data Found!');
              $data['error'] = "success";
          }
          
         
        
        return $data;
    }



     public function deleteitem(Request $request)
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

    public function myitem()
    {  
         $id=Auth::user()->id;
       
       $leaves =  DB::table('allocate_items')->leftjoin('store_managment as pm_id','pm_id.id','=','allocate_items.item_id')
                   ->select('allocate_items.*','pm_id.item_name as item_id')->where('allocate_items.emp_id','=',$id)
                   ->paginate(10);
                  
              
        return view('admin.employee.myitem',['leaves' => $leaves ]);  
    } 
    

// ================ End  Admin Store management ======================== 




}
