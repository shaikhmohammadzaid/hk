<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesmanController extends Controller
{
     public function index()
    { 
	    return view('admin.suppliers.view_suppliers');
    }

    public function showSupplierDetails(Request $request)
    {
        $data['suppliers']  = DB::table('suppliers')->where('status','=',1)->paginate(10);  
        return view('admin.suppliers.ajax.suppliers-info',$data);
    }
     
    
}
