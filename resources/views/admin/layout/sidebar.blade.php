<aside class="left-sidebar">
  <!-- Sidebar scroll-->
   
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <!-- User Profile-->
        <li>
          <!-- User Profile-->
          <div class="user-profile d-flex no-block dropdown m-t-20">
            <div class="user-pic"><img src="{{ asset('public/admin/assets/images/users/1.jpg') }}" alt="users" class="rounded-circle" width="40" /></div>
            <div class="user-content hide-menu m-l-10"> 
            
              <h5 class="m-b-0 user-name font-medium">{{ ucfirst(Auth::user()->name) }}</h5>
              <span class="op-5 user-email">{{ Auth::user()->email }}</span>
            </div>
          </div>
          <!-- End User Profile-->
        </li>
        @if(Auth::user()->job_title=='admin')		
            <li class="sidebar-item"> 
                <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false">
                   <i class="mdi mdi-view-dashboard"></i>
                   <span class="hide-menu">Dashboard </span> 
                </a> 
            </li>
		
		        <li class="sidebar-item"> 
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span class="hide-menu">Admin </span>
                  </a>
              <ul aria-expanded="false" class="collapse  first-level">
                <li  class="sidebar-item">
                  <a href="{{url('admin/admin-listing')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Admin </span>
                  </a>
                </li>
                <li class="sidebar-item"> <a href="{{route('location')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu"> Location </span> </a> </li>
               <li class="sidebar-item"> <a href="{{route('branch')}}" class="sidebar-link"> <i class="mdi mdi-adjust"></i> <span class="hide-menu"> Branch </span> </a> </li>
                <li class="sidebar-item">
                  <a href="{{url('admin/task-listing')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Task-Type </span>
                  </a>
                </li>
                 <li class="sidebar-item">
                  <a href="{{route('taskmanagement')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Task Management</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a href="{{route('dtaskmanagement')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Daily Task Management</span>
                  </a>
                </li>
              
              	<li class="sidebar-item ">
                  <a href="{{url('admin/message-listing')}}" class="sidebar-link ">
                    <i class="mdi mdi-email-open-outline"></i> 
                    <span class="hide-menu">Admin Messages</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a href="{{url('admin/user_balances')}}" class="sidebar-link">
                    <i class="mdi mdi-email-open-outline"></i> 
                    <span class="hide-menu">User Balances</span>
                  </a>
                </li>


              </ul>
            </li>
             <li class="sidebar-item">
                  <a href="{{route('AdminServiceRequest')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Service Request</span>
                  </a>
            </li>
            <li class="sidebar-item"> 
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="mdi mdi-calendar-range"></i>
                    <span class="hide-menu">Leave Management</span>
                  </a>
              <ul aria-expanded="false" class="collapse  first-level">
               
                 <li class="sidebar-item">
                  <a href="{{route('leaveTypeList')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Manage Leave Type</span>
                  </a>
                </li>
                
                  <li class="sidebar-item">
                  <a href="{{route('AdminemployeeLeave')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Employees Leaves</span>
                  </a>
                </li>

                
                  <li class="sidebar-item">
                  <a href="{{route('AdminPmLeave')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Project Manager Leaves</span>
                  </a>
                 </li>
               
              </ul>
            </li>

       <li class="sidebar-item"> 
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="mdi mdi-calendar-range"></i>
                    <span class="hide-menu">Store Management</span>
                  </a>
              <ul aria-expanded="false" class="collapse  first-level">
               
                 <li class="sidebar-item">
                  <a href="{{route('storelist')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Manage Store Items</span>
                  </a>
                </li>

                 <li class="sidebar-item">
                  <a href="{{route('allocateditem')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Allocate Item</span>
                  </a>
                </li>
                
               

                
              </ul>
            </li>
			  <li class="sidebar-item"> 
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="mdi mdi-calendar-range"></i>
                    <span class="hide-menu">Attendence</span>
                  </a>
              <ul aria-expanded="false" class="collapse  first-level">
               
                 <li class="sidebar-item">
                  <a href="{{route('storelist')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Add Attendence</span>
                  </a>
                </li>

                 <li class="sidebar-item">
                  <a href="{{route('allocateditem')}}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu">Attendence List</span>
                  </a>
                </li>
                
               

                
              </ul>
            </li>

            
        <li class="sidebar-item"><a href="{{url('admin/subadmin-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Sub Admin</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/user-listing')}}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Users</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/cashoperator-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Cash Operator</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/projectmanager-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Project Manager</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/employee-listing')}}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Employee</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/contact-listing')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i> <span class="hide-menu"> Contact Form</span></a></li>
        @endif
        
        @if(Auth::user()->job_title=='subadmin')
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a> </li>         
        <li class="sidebar-item"><a href="{{url('admin/message-listing')}}" class="sidebar-link"><i class="mdi mdi-email-open-outline"></i> <span class="hide-menu">Admin Messages</span></a></li>
         <li class="sidebar-item">
                  <a href="{{route('AdminServiceRequest')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Service Request</span>
                  </a>
            </li>
        <li class="sidebar-item"><a href="{{url('admin/subadmin-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Sub Admin</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/user-listing')}}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Users</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/cashoperator-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Cash Operator</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/projectmanager-listing')}}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Project Manager</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/employee-listing')}}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Employee</span></a></li>
        <li class="sidebar-item"><a href="{{url('admin/contact-listing')}}" class="sidebar-link"><i class="mdi mdi-receipt"></i> <span class="hide-menu"> Contact Form</span></a></li>
        @endif
        
        @if(Auth::user()->job_title=='projectmanager')
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a> </li>
            <li class="sidebar-item">
                  <a href="{{route('assignTask')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Assign Task </span>
                  </a>
            </li>
            <li class="sidebar-item">
                  <a href="{{route('pmEmployee')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Employee</span>
                  </a>
            </li>
            <li class="sidebar-item">
                  <a href="{{route('ServiceRequest')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Service Request</span>
                  </a>
            </li>

             <li class="sidebar-item"> 
               <a class="sidebar-link waves-effect waves-dark" href="{{route('PmLeaveApply')}}" aria-expanded="false">
                 <i class="mdi mdi-account-network"></i>
                 <span class="hide-menu">Apply Leave</span>
               </a> 
             </li>
              <li class="sidebar-item">   
                 <a class="sidebar-link waves-effect waves-dark" href="{{route('pmLeavecheck')}}" aria-expanded="false">
                     <i class="mdi mdi-account-network"></i>
                     <span class="hide-menu">Check Leave</span>
                  </a> 
              </li>
            <li class="sidebar-item">
                  <a href="{{route('employeeLeave')}}" class="sidebar-link">
                    <i class="mdi mdi-receipt"></i>
                    <span class="hide-menu">Employee Leaves</span>
                  </a>
            </li>
		
        @endif
        
        @if(Auth::user()->job_title == 'cashoperator')
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a> </li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/cashoperator-listing')}}" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="menu"> Cash Operator</span></a> </li>
        <li class="sidebar-item"><a href="{{url('admin/cashoperator/userlisting')}}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Users</span></a></li>
        @endif
        
        @if(Auth::user()->job_title=='employee')
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a> </li>
	    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/employee-tasklist')}}" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Employee Task List</span></a> </li>
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{url('admin/employee-dtasklist')}}" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Your Daily Task List</span></a> </li>
       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{route('EmpServiceList')}}" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Assign Service List</span></a> </li>

        <li class="sidebar-item"> 
          <a class="sidebar-link waves-effect waves-dark" href="{{route('EmpLeaveApply')}}" aria-expanded="false">
            <i class="mdi mdi-account-network"></i>
            <span class="hide-menu">Apply Leave</span>
          </a> 
        </li>
         <li class="sidebar-item">   
          <a class="sidebar-link waves-effect waves-dark" href="{{route('EmpLeavecheck')}}" aria-expanded="false">
            <i class="mdi mdi-account-network"></i>
            <span class="hide-menu">Check Leave</span>
          </a> 
        </li>

         <li class="sidebar-item">   
          <a class="sidebar-link waves-effect waves-dark" href="{{route('myitem')}}" aria-expanded="false">
            <i class="mdi mdi-account-network"></i>
            <span class="hide-menu">My Item</span>
          </a> 
        </li>
        @endif

        
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/logout')}}" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
