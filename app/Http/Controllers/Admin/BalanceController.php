<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class BalanceController extends Controller
{
    public function __construct(){ $this->middleware('auth:admin'); }
	
    public function user_balances()
    {
    	$balance=DB::table('add_money')
		->join('admins','admins.id','=','add_money.cashopt_id') 
		->get();
		// dd($balance);	
		return view('admin.user.user_balances');
    	
    }
}
