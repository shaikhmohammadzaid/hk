<?php
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use App\User;
use Session;
use DB;
use Auth;  
use Mail;
use Illuminate\Support\Facades\Hash;

class CashoperatorController extends Controller{ 
  
    public function __construct(){ $this->middleware('auth:admin'); }
	
    public function index()
    {  
      if(Auth::user()->job_title=='cashoperator' || Auth::user()->job_title=='admin' || Auth::user()->job_title=='subadmin'){

	 $admins = DB::table('admins')->where('job_title','=','cashoperator')->paginate(10);		
     return view('admin.cashoperator.index',['admins' => $admins]);

     } else {return view('admin.error.unauthenticate');}
    }
    public function dashboard()
    {  
        return view('admin.dashboard');
    }

     public function userlisting()
    {  
      if(Auth::user()->job_title=='cashoperator'){

        $users = User::select('id', 'name', 'email','balance', 'created_at','status')->paginate(10);
        return view('admin.cashoperator.userlisting',['users' => $users]);
     
       } else {
       	return view('admin.error.unauthenticate');}
	 
    }
   
	public function cashopt_status_inactive(Request $request)
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
	
	public function cashopt_delete(Request $request)
    {       
      $uid = $request->mid;       
      $deletecashopt =  DB::table('admins')->where('id', '=', $uid)->delete(); 
      if($deletecashopt == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		} else {
		  Session::flash('failure','No Deletion!');			  
		}
		 
    }
	
	public function cashopt_edit(Request $request)
    {     
	    $id = $request->id;
        $name = $request->name;     
        $email = $request->email;	
        if ($request->password == NULL) {

		      $allexit = Admin::where(['email' => $email])->where('id', '!=', $id)->exists();
		      if ($allexit) {
		        $data['error'] = $request->email." already exits";
		      } else {
		        $user = DB::table('admins')->where('id', '=', $id)->update(['name' => $name, 'email' => $email]);
		        if ($user == 1) {
		          Session::flash('success', 'cash-Operator Updated  successfully ');
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
		        $user = DB::table('admins')->where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password ]);
		        if ($user == 1) {
		          Session::flash('success', 'cash-Operator Updated  successfully ');
		          $data['error'] = "success";
		          return $data;
		        } else {
		          Session::flash('failure', 'No Updation!');

		        }
		      }
		      return $data;
        }

		
    }

     public function add_balance_user(Request $request)
    {
        $id = $request->user_id;
        $name = $request->user_name;
        $email = $request->user_email;
        $balance = $request->balance;      
        $aid= Auth::user()->id; 
        $aemail= Auth::user()->email; 
        $aname= Auth::user()->name; 
 
        
        $last_balance=getbalance($id);

        $current_balance =  $balance + $last_balance; 

        $user_balance = DB::table('users')->where(['id'=>$id])->update(['name'=>$name ,'balance'=>$current_balance]); 

        $user_trans = DB::table('user_transaction')->insert(['user_id'=>$id,'name'=>$name,'email'=>$email,'credit_amount'=>$balance,'current_balance'=>$current_balance,'description'=>'Money Deposit by Cash Operator']);

        $add_money = DB::table('add_money')->insert(['user_id'=>$id,'user_name'=>$name,'user_email'=>$email,'add_amount'=>$balance,'transfer_by'=>'Money Deposit by Cash Operator','cashopt_id'=>$aid]);


         $data=['email'=>$email,
                'subject'=>'Credit Balance',
                'message'=>'Balance added successfully'];
        Mail::send($data,$data,function($message) use($data){
            $message->from('cashop1@gmail.com','Cash Operator');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        if($user_balance == 1) 
        {
              Session::flash('success','Updated Successfully');       
        } else {
              Session::flash('failure','No Updation!');
        }

    }

}