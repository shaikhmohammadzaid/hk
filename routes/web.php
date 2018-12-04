<?php
 
Route::get('/', function () {   return view('welcome'); });
Route::get('/about', function () {   return view('about'); });
Route::get('/services', function () {   return view('services'); }); 
Route::get('/contact', 'ContactController@index') ;
Route::post('/contact', 'ContactController@savecontact')->name('savecontact');
Route::get('/logout', 'Auth\LoginController@userlogout')->name('user.logout');
Route::get('/reg_branch',['as'=>'reg_branch','uses'=>'Auth\RegisterController@reg_branch']);

 Route::group(['middleware' => 'prevent-back-history'],function(){


 	Auth::routes();
//User Profile
Route::get('/myprofile', 'MyprofileController@myprofile')->name('myprofile');
Route::get('/branchDetails',['as'=>'branchDetails','uses'=>'MyprofileController@branchDetails']);
 
Route::post('/myprofile_update',['as'=>'myprofile_update','uses'=>'MyprofileController@myprofile_update']);

Route::get('/mytransactions', 'MyprofileController@mytransaction')->name('mytransaction');
Route::get('/our-Services',['as'=>'ourServices','uses'=>'ServiceController@ourServices']);
Route::get('/our-Services/add_service_req',['as'=>'add_service_req','uses'=>'ServiceController@add_service_req']);

Route::get('/history',['as'=>'history','uses'=>'HistoryController@history']);

 
	Route::get('/home', 'HomeController@index')->name('home');
});

//Route::get('admin/dashboard', function () { return view('admin.dashboard');   });

Route::prefix('admin')->group(function() {  


 Route::get('/profile',['as'=>'adminProfile','uses'=>'Admin\AdminController@adminProfile']); 
  Route::post('/update_profile',['as'=>'edit_profile','uses'=>'Admin\AdminController@edit_profile']); 
// Admin login - logout - dashboard
	Route::get('/','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  	Route::get('/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');
	Route::get('/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
   // New user create
   
  //Routes for Users
	Route::get('/user-listing','Admin\UserController@index')->name('admin.user');
	Route::post('/add_user','Admin\UserController@add_user');
	Route::get('/user_status_inactive/{userid}/{status}','Admin\UserController@user_status_inactive');
	Route::post('/add_balance_user','Admin\UserController@add_balance_user');
	Route::get('/user_delete/{id}','Admin\UserController@user_delete');
	Route::post('/update_user','Admin\UserController@update_user');
	
  //Routes for Admin
	Route::get('/admin-listing','Admin\AdminController@index')->name('admin.admin');
	Route::get('/task-listing','Admin\AdminController@task');
	Route::get('/delete_task/{id}','Admin\AdminController@delete_task');
	Route::post('/edit_task','Admin\AdminController@edit_task');
	Route::post('/add_admin','Admin\AdminController@add_admin')->name('admin.add_admin');

	Route::post('/add_role','Admin\AdminController@add_role')->name('admin.add_role');
	Route::get('/admin_status_inactive/{id}/{status}','Admin\AdminController@admin_status_inactive');
	Route::get('/delete_admin/{id}','Admin\AdminController@admin_delete');
	Route::post('/edit_admin','Admin\AdminController@edit_admin')->name('admin.edit_admin');
	Route::post('/add_task','Admin\AdminController@add_task')->name('admin.add_task');
	
    Route::get('/show_branch',['as'=>'show_branch','uses'=>'Admin\AdminController@show_branch']);
    Route::get('/show_emp',['as'=>'show_emp','uses'=>'Admin\AdminController@show_emp']);	
    Route::get('/service_Request',['as'=>'AdminServiceRequest','uses'=>'Admin\AdminController@AdminServiceRequest']);
    Route::get('/show_service_Request',['as'=>'showServiceRequest','uses'=>'Admin\AdminController@showServiceRequest']);
    
     Route::get('/search_service-Request',['as'=>'searchServiceRequest','uses'=>'Admin\AdminController@searchServiceRequest']);

    //Routes for Admin Leave Management
    Route::get('/manage_leave_type',['as'=>'leaveTypeList','uses'=>'Admin\LeaveController@index']);
    Route::get('/show_leave_type',['as'=>'showLeaveDetails','uses'=>'Admin\LeaveController@showLeaveDetails']);
    Route::post('/add_leave_type',['as'=>'AddLeaveType','uses'=>'Admin\LeaveController@AddLeaveType']);
    Route::post('/edit_leave_type',['as'=>'UpdateLeaveType','uses'=>'Admin\LeaveController@UpdateLeaveType']);
    Route::get('/delete_leave_type',['as'=>'deleteLeaveType','uses'=>'Admin\LeaveController@deleteLeaveType']);

    Route::get('/employee_leave_application',['as'=>'EmpLeaveApply','uses'=>'Admin\LeaveController@EmpLeaveApply']);
    Route::post('/add_employee_leave_application',['as'=>'AddEmpLeave','uses'=>'Admin\LeaveController@AddEmpLeave']);
    Route::get('/employee_leave_check',['as'=>'EmpLeavecheck','uses'=>'Admin\LeaveController@EmpLeavecheck']);
    Route::get('/project-manager/manage_leave',['as'=>'employeeLeave','uses'=>'Admin\LeaveController@employeeLeave']);
    Route::get('/project-manager/show_leave',['as'=>'showEmployeeLeave','uses'=>'Admin\LeaveController@showEmployeeLeave']);
    Route::get('/project-manager/change_status',['as'=>'EmpLeaveStatus','uses'=>'Admin\LeaveController@EmpLeaveStatus']);
    Route::get('/project-manager/show_Search_leave',['as'=>'searchEmployeeLeaves','uses'=>'Admin\LeaveController@searchEmployeeLeaves']);

     Route::get('/pm_leave_application',['as'=>'PmLeaveApply','uses'=>'Admin\LeaveController@PmLeaveApply']);
     Route::get('/pm_leave_check',['as'=>'pmLeavecheck','uses'=>'Admin\LeaveController@pmLeavecheck']);
     Route::post('/add_pm_application',['as'=>'AddPmLeave','uses'=>'Admin\LeaveController@AddPmLeave']);
      
// ============== route  leave for the Admin ===========
   Route::get('/employee_manage_leave',['as'=>'AdminemployeeLeave','uses'=>'Admin\LeaveController@AdminemployeeLeave']);
   Route::get('/emp_show_leave',['as'=>'showAdminEmployeeLeave','uses'=>'Admin\LeaveController@showAdminEmployeeLeave']);
   Route::get('/emp_show_Search_leave',['as'=>'searchAdminEmployeeLeaves','uses'=>'Admin\LeaveController@searchAdminEmployeeLeaves']);

      Route::get('/pm_manage_leave',['as'=>'AdminPmLeave','uses'=>'Admin\LeaveController@AdminPmLeave']);
     Route::get('/pm_show_leave',['as'=>'showAdminPmLeave','uses'=>'Admin\LeaveController@showAdminPmLeave']);
     Route::get('/pm_show_Search_leave',['as'=>'searchAdminPmLeaves','uses'=>'Admin\LeaveController@searchAdminPmLeaves']);
    Route::get('/change_leave_status',['as'=>'PmLeaveStatus','uses'=>'Admin\LeaveController@PmLeaveStatus']);
// ============== route  leave for the Admin ===========

// Route for store managment

Route::get('/storelist',['as'=>'storelist','uses'=>'Admin\StoreController@index']);

 Route::post('/additems',['as'=>'additems','uses'=>'Admin\StoreController@additems']);

  Route::get('/show_store_details',['as'=>'showStoreDetails','uses'=>'Admin\StoreController@showStoreDetails']);

   Route::post('/edit_store_details',['as'=>'UpdateItem','uses'=>'Admin\StoreController@UpdateItem']);

   Route::post('/adqun',['as'=>'adqun','uses'=>'Admin\StoreController@adqun']);
   
Route::post('/allocate',['as'=>'allocate','uses'=>'Admin\StoreController@allocate']);

Route::post('/return',['as'=>'return','uses'=>'Admin\StoreController@return']);

     Route::get('/deleteitem',['as'=>'deleteitem','uses'=>'Admin\StoreController@deleteitem']);

     Route::get('/allocateditem',['as'=>'allocateditem','uses'=>'Admin\StoreController@allocateditem']);


  Route::get('/showDetails',['as'=>'showDetails','uses'=>'Admin\StoreController@showDetails']);

  Route::get('/myitem',['as'=>'myitem','uses'=>'Admin\StoreController@myitem']);

//end of store managment
// ============== start   Attendance ===========

Route::get('/storelist',['as'=>'storelist','uses'=>'Admin\StoreController@index']);

// ============== End  Attendance ===========

//Routes for Admin TaskManager
	Route::get('/admin-taskmanager',['as'=>'taskmanagement','uses'=>'Admin\TaskManagerController@index']);

	Route::get('/admin-dtaskmanager',['as'=>'dtaskmanagement','uses'=>'Admin\TaskManagerController@dindex']);


	Route::get('/show_task_details',['as'=>'showTaskRequest','uses'=>'Admin\TaskManagerController@showTaskRequest']);

	Route::get('/show_dtask_details',['as'=>'showdTaskRequest','uses'=>'Admin\TaskManagerController@showdTaskRequest']);


	 Route::get('/search_task',['as'=>'searchTaskRequest','uses'=>'Admin\TaskManagerController@searchTaskRequest']);

	  Route::get('/search_dtask',['as'=>'searchdTaskRequest','uses'=>'Admin\TaskManagerController@searchdTaskRequest']);

	Route::get('/task-management/add_task_assign',['as'=>'add_task_assign','uses'=>'Admin\TaskManagerController@add_task_assign']);
       
	Route::get('/task-management/add_dtask_assign',['as'=>'add_dtask_assign','uses'=>'Admin\TaskManagerController@add_dtask_assign']);


	Route::get('/task-management/delete_task_assign',['as'=>'deleteAssignTask','uses'=>'Admin\TaskManagerController@deleteAssignTask']);

		Route::get('/task-management/delete_dtask_assign',['as'=>'deletedAssignTask','uses'=>'Admin\TaskManagerController@deletedAssignTask']);
	
	Route::get('/task-management/update_task_assign',['as'=>'updateAssignTask','uses'=>'Admin\TaskManagerController@updateAssignTask']);


	Route::get('/task-management/update_dtask_assign',['as'=>'updatedAssignTask','uses'=>'Admin\TaskManagerController@updatedAssignTask']);

		
	//Routes for Admin Location
	Route::get('/location',['as'=>'location','uses'=>'Admin\AdminController@location']);
	Route::get('/location/Add_location',['as'=>'add_location','uses'=>'Admin\AdminController@add_location']);
	Route::post('/location/edit_location',['as'=>'edit_location','uses'=>'Admin\AdminController@edit_location']);	
	Route::get('/location/delete_location',['as'=>'delete_location','uses'=>'Admin\AdminController@delete_location']);	
   
	//Routes for Admin Branch
	Route::get('/branch',['as'=>'branch','uses'=>'Admin\AdminController@branch']);
	Route::post('/branch/add_branch',['as'=>'add_branch','uses'=>'Admin\AdminController@add_branch']);
	Route::post('/branch/edit_branch',['as'=>'edit_branch','uses'=>'Admin\AdminController@edit_branch']);
		Route::get('/branch/delete_branch',['as'=>'delete_branch','uses'=>'Admin\AdminController@delete_branch']);


  //Routes for SubAdmin
	Route::get('/subadmin-listing','Admin\SubadminController@index')->name('admin.subadmin');
	Route::post('/subadmin_add','Admin\SubadminController@subadmin_add')->name('admin.subadmin_add');
	Route::get('/subadmin_status_inactive/{id}/{status}','Admin\SubadminController@subadmin_status_inactive');
	Route::post('/subadmin_edit','Admin\SubadminController@subadmin_edit')->name('admin.edit_admin');
	Route::get('/subadmin_delete/{id}','Admin\SubadminController@subadmin_delete');

 //Routes for ProjectManager
	Route::get('/projectmanager-listing','Admin\PmController@index')->name('admin.pm');	
	Route::get('/pm_status_inactive/{id}/{status}','Admin\PmController@pm_status_inactive');
	Route::get('/show_branch',['as'=>'show_branch','uses'=>'Admin\PmController@show_branch']);
	Route::post('/pm_edit','Admin\PmController@pm_edit')->name('admin.pm_edit');
	Route::get('/pm_delete/{id}','Admin\PmController@pm_delete');	
	Route::get('/project-manager/assign_task',['as'=>'assignTask','uses'=>'Admin\PmController@assignTask']);
	Route::get('/project-manager/assign_task_to_employee',['as'=>'taskAssignEmp','uses'=>'Admin\PmController@taskAssignEmp']);	

	Route::get('/project-manager/employee',['as'=>'pmEmployee','uses'=>'Admin\PmController@pmEmployee']);

	Route::get('/emp_review_taskstatus/{task_id}/{status}','Admin\PmController@emp_review_taskstatus')->name('admin.emp_review_taskstatus'); 
	
	Route::get('/project-manager/ServiceRequest',['as'=>'ServiceRequest','uses'=>'Admin\PmController@ServiceRequest']);
	Route::get('/project-manager/Service_to_employee',['as'=>'serviceAllocateEmp','uses'=>'Admin\PmController@serviceAllocateEmp']); 
	Route::get('/emp_review_servicestatus/{service_req}/{status}','Admin\PmController@emp_review_servicestatus')->name('admin.emp_review_servicestatus');

	
  //Contact form data
  	Route::get('/contact-listing','Admin\ContactController@index')->name('admin.contact'); 	
	Route::get('/contact_read/{id}','Admin\ContactController@contact_read');
	Route::get('/contact_delete/{id}','Admin\ContactController@contact_delete'); 
	Route::get('/view_contact', ['as'=>'view_contact','uses'=>'Admin\ContactController@view_contact']);	
  //Messages data
  	Route::get('/message-listing','Admin\MessageController@index')->name('admin.message'); 	
  	Route::get('/user_balances','Admin\AdminController@user_balances')->name('admin.user_balances'); 
	Route::post('/add_message','Admin\MessageController@add_message')->name('admin.add_message');
    Route::get('/delete_message/{mid}','Admin\MessageController@delete_message'); 
			
	//Inbox data
  	Route::get('/inbox-listing','Admin\InboxController@index')->name('admin.inbox'); 	
    Route::get('/delete_inboxmessage/{mid}','Admin\InboxController@delete_inbox');
	Route::get('/message_read/{id}','Admin\InboxController@message_read');

	//Employee data
  	Route::get('/employee-tasklist','Admin\EmployeeController@index')->name('admin.employee_tasklist');

  	//daily Task list

  	Route::get('/employee-dtasklist','Admin\EmployeeController@dindex')->name('admin.employee-dtasklist'); 



	Route::get('/emp_updt_taskstatus/{emp_id}/{task_id}/{status}','Admin\EmployeeController@emp_updt_taskstatus')->name('admin.emp_updt_taskstatus'); 

	//for daily Task
	Route::get('/emp_updt_dtaskstatus/{emp_id}/{task_id}/{status}','Admin\EmployeeController@emp_updt_dtaskstatus')->name('admin.emp_updt_dtaskstatus'); 
	//finish daily Task

	Route::get('/employee/Service_list',['as'=>'EmpServiceList','uses'=>'Admin\EmployeeController@EmpServiceList']);
	Route::post('/employee/emp_updt_taskStatus',['as'=>'emp_updt_taskstatus','uses'=>'Admin\EmployeeController@emp_updt_taskstatus']); 
   
     Route::post('/employee/emp_updt_dtaskStatus',['as'=>'emp_updt_dtaskstatus','uses'=>'Admin\EmployeeController@emp_updt_dtaskstatus']); 	
  

	Route::post('/employee/emp_updt_serviceStatus',['as'=>'emp_updt_serviceStatus','uses'=>'Admin\EmployeeController@emp_updt_serviceStatus']); 


	Route::get('/employee-listing','Admin\EmployeeController@employee_listing')->name('admin.employee_listing');

	Route::get('/employee_delete/{id}','Admin\EmployeeController@employee_delete');

	Route::get('/employee_status_inactive/{userid}/{status}','Admin\EmployeeController@employee_status_inactive');
	Route::post('/emp_edit','Admin\EmployeeController@emp_edit')->name('admin.emp_edit');


    

//Routes for cashopertor
	Route::get('/cashoperator-listing','Admin\CashoperatorController@index')->name('admin.cashoperator');	
	Route::get('/cashopt_status_inactive/{id}/{status}','Admin\CashoperatorController@cashopt_status_inactive');
    Route::post('/cashopt_edit','Admin\CashoperatorController@cashopt_edit')->name('admin.cashopt_edit');
	Route::get('/cashopt_delete/{mid}','Admin\CashoperatorController@cashopt_delete'); 
	Route::get('/cashoperator/userlisting','Admin\CashoperatorController@userlisting')->name('admin.cashopt.userlisting');
	Route::post('/cashoperator/add_balance_user','Admin\CashoperatorController@add_balance_user')->name('admin.cashopt.add_balance_user');
 });