<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
/*Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user(); });*/

// Route::post('flogin','API\PassportController@flogin');
// Route::post('alogin','API\PassportController@alogin');
// Route::post('register','API\PassportController@register');
 

// Route::group(['middleware'=>'auth:api'],function(){
//       Route::get('getdetails','API\PassportController@getDetails'); 
	  
// });

// Route::group(['middleware'=>'auth:admin_api'],function(){  
	    
// 	  Route::get('subadmin','API\PassportController@subadmin');
// });

    Route::post('service_Request','API\ApiController@service_Request');