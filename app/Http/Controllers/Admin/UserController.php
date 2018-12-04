<?php
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use App\Models\User;
use Session;
use DB;
use Auth; 
use Cache;
use Mail;
use Illuminate\Support\Facades\Hash; 
 
class UserController extends Controller{
	public function __construct(){ $this->middleware('auth:admin'); }
   
    public function index()
    { 
      
	 	$users = User::select()->paginate(10);
        $locations = DB::table('location')->get();
        $branches = DB::table('branch')->get();
        return view('admin.user.index',['users' => $users,'locations' => $locations,'branches' => $branches]);
    }
    
    public function add_user(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $password  = $request->password;
        $mobile = $request->mobile;
        $alternate_mobile = $request->alternate_mobile;
        $address = $request->address;
        $location_id = $request->location_id;
        $branch_id = $request->branch_id;
        $block = $request->block;
        $shop_no = $request->shop_no;
        $floor_no = $request->floor_no;

        echo "yes";
        
                echo 'hi';
                //$user =User::create($request->all());
                 $user = DB::table('users')->insert(['name'=>$name, 'email'=>$email,'password'=>$password,'mobile'=>$mobile, 'alternate_mobile'=>$alternate_mobile, 'address'=>$address , 'location_id'=>$location_id, 'branch_id'=>$branch_id, 'block'=>$block, 'shop_no'=>$shop_no,'floor_no'=>$floor_no ]);

			    if($user == 1) {
			         Session::flash('success','User Inserted  successfully ');
			          
    			} else {
    			         Session::flash('failure','No Inserted!');
    			}
		   
		     
   
		
    }

    public function update_user(Request $request)
    {
        $id = $request->user_id;
        $name = $request->user_name;     
        $email = $request->user_email;
        $password =  Hash::make($request->user_password); 
        $location = $request->user_location;
        $branch = $request->user_branch;
        $block = $request->user_block;
        $floor_no = $request->user_floor_no;
        $shop_no = $request->user_shop_no;

        if ($request->user_password != NULL) {
             $user = DB::table('users')->where(['id'=>$id])->update(['name'=>$name,'email'=>$email,'password'=>$password,'location_id'=>$location,'branch_id'=>$branch,'block'=>$block,'floor_no'=>$floor_no,'shop_no'=>$shop_no]);  
            if($user == 1) 
            {
                  Session::flash('success','User Updated  successfully ');       
            } else {
                  Session::flash('failure','No Updation!');
            }
        }
        else{

             $user = DB::table('users')->where(['id'=>$id])->update(['name'=>$name,'email'=>$email,'location_id'=>$location,'branch_id'=>$branch,'block'=>$block,'floor_no'=>$floor_no,'shop_no'=>$shop_no]); 
            if($user == 1) 
            {
                  Session::flash('success','User Updated  successfully ');       
            } else {
                  Session::flash('failure','No Updation!');
            }
        }
       

    }
    public function add_balance_user(Request $request)
    {
        $id = $request->user_id;
        $name = $request->user_name;
        $email = $request->user_email;
        $balance = $request->balance;      
        $aid= Auth::user()->id; 

        
       
        $last_balance=getbalance($id);

        $current_balance =  $balance + $last_balance; 

        $user_balance = DB::table('users')->where(['id'=>$id])->update(['name'=>$name ,'balance'=>$current_balance]); 

        $user_trans = DB::table('user_transaction')->insert(['user_id'=>$id,'name'=>$name,'email'=>$email,'credit_amount'=>$balance,'current_balance'=>$current_balance,'description'=>'Money Deposit by admin']);

        $add_money = DB::table('add_money')->insert(['user_id'=>$id,'name'=>$name,'email'=>$email,'add_amount'=>$balance,'transfer_by'=>'By Admin']);

       
         

        if($user_balance == 1) 
        {
              Session::flash('success','Updated Successfully');       
        } else {
              Session::flash('failure','No Updation!');
        }

    }

    public function user_status_inactive(Request $request)
    {
       
      $uid = $request->userid; 
      $status = $request->status;  

      if($status == '1' ){
      $user_status = DB::table('users')
            ->where('id','=', $uid )
            ->update([ 
        'status'=>'0'
            ]); 
        }
        else if($status == '0'){
        
         $user_status = DB::table('users')
            ->where('id','=', $uid )
            ->update([ 
        'status'=>'1' 
            ]); 
        }
		 
    }
 
    public function user_delete(Request $request)
    {
       
      $uid = $request->id;       
      $delete =  DB::table('users')->where('id', '=', $uid)->delete(); 
      if($delete == 1) 
	    {
		  Session::flash('success','Deleted successfully ');
		  } else {
		  Session::flash('failure','No Deletion!');			  
		  }
		 
    }
}