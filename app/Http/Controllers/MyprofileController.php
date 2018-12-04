<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Session;
class MyprofileController extends Controller
{

     public function __construct()  {  $this->middleware('auth'); }

     
    public function myprofile()
    {
    	$user=DB::table('users')->where('id','=',Auth::user()->id)
                ->join('location','location.location_id','=','users.location_id')
                ->join('branch','branch.branch_id','=','users.branch_id')
                ->get();  

        $locations= DB::table('location')->get(); 
                $branchs= DB::table('branch')->get(); 
    	return view('myprofile',['user'=>$user,'locations'=>$locations,'branchs'=>$branchs]);
    }
    public function branchDetails(Request $request)
    {
              if ($request->ajax()) 
              {
                  
                 return response(DB::table('branch')->where('location_id','=',$request->location_id)->get());
              }
    }
    public function mytransaction()
    {
    	$user_transactions=DB::table('user_transaction')->where('user_id','=',Auth::user()->id)->paginate(10);  
    	return view('transaction',['user_transactions'=>$user_transactions]);
    }
    public function myprofile_update(Request $request)
    { 	
        $id = $request->user_id;
        $name = $request->user_name;
        $address = $request->user_address;
        $email = $request->user_email;
        $mobile = $request->user_mobile;
        $alternate_mobile = $request->user_alt_mobile;
        $shop_no = $request->shop_no_update;
		$floor=$request->floor_no;
		$block=$request->block;
        $location =$request->location;
        $branch = $request->branch;
       
	   	$user_updt=DB::table('users')->where(['id'=>$id])
						->update(['name'=>$name,'address'=>$address,'email'=>$email,'mobile'=>$mobile,'alternate_mobile'=>$alternate_mobile,'shop_no'=>$shop_no,'floor_no'=>$floor,'block'=>$block,'location_id'=>$location,'branch_id'=>$branch]);
						 
		 if($user_updt == 1) {
				  Session::flash('success','Updated Successfully ');
				   
				} else {
				  Session::flash('failure','No inserted!');
				  
				}
				
				return back();
				
         
    }
}
