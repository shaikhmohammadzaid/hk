<?php $__env->startSection('content'); ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Dashboard</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
          </ol>
        </nav>
      </div>
    </div>
    
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
<div class="col-12">
  <div class="card">
    <!-- ============================================================== -->
    <!-- Info Box -->
    <!-- ============================================================== -->
    <?php if(Auth::user()->job_title=='admin'): ?>
    <div class="card-body border-top">
      <div class="row m-b-0">
        <!-- col -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
            <div><span>Wallet Balance</span>
              <h3 class="font-medium m-b-0"><?php echo e(total_amount()); ?></h3>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-cyan display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>All Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(totaluser()); ?></h3>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>Today Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_users()); ?></h3>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-currency-usd"></i></span></div>
            <div><span>Today Earnings</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_amount()); ?></h3>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <div class="card-body border-top">
       
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-orange text-center">
              <h1 class="font-light text-white"><?php echo e(totalsubadmin()); ?></h1>
              <h6 class="text-white">Total Sub-Admin</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-info text-center">
              <h1 class="font-light text-white"><?php echo e(totalprojectmanager()); ?> </h1>
              <h6 class="text-white">Total Project Manager </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-cyan text-center">
              <h1 class="font-light text-white"><?php echo e(totalemployee()); ?></h1>
              <h6 class="text-white">Total Employee</h6>
            </div>
          </div>
        </div>
         <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-primary text-center">
              <h1 class="font-light text-white"><?php echo e(totalcashoperator()); ?></h1>
              <h6 class="text-white">Total Cash Opreater</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row m-b-0">
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-warning text-center">
              <h1 class="font-light text-white"><?php echo e(total_task()); ?></h1>
              <h4 class="text-white">Total Task Request's</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-secondary text-center">
              <h1 class="font-light text-white"><?php echo e(total_service()); ?></h1>
              <h4 class="text-white">Total Service Request's</h4>
            </div>
          </div>
        </div>
      </div>
       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Task Request's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_task_todo()); ?></h1>
              <h6 class="text-white">To-Do </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box  text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_task_working()); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC">
              <h1 class="font-light text-white"><?php echo e(total_task_pending()); ?></h1>
              <h6 class="text-white">Review / Pending</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_task_complete()); ?></h1>
              <h6 class="text-white">Completed </h6>
            </div>
          </div>
        </div>
      </div>

       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Service Request's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_service_todo()); ?></h1>
              <h6 class="text-white">To-Do</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_service_working()); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC" >
              <h1 class="font-light text-white"><?php echo e(total_service_pending()); ?></h1>
              <h6 class="text-white">Review / Pending </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_service_complete()); ?></h1>
              <h6 class="text-white">Completed</h6>
            </div>
          </div>
        </div>
      </div>
         
    </div>
    <?php endif; ?>

    <?php if(Auth::user()->job_title=='subadmin'): ?>
    <div class="card-body border-top">
      <div class="row m-b-0">
        <!-- col -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
            <div><span>Wallet Balance</span>
              <h3 class="font-medium m-b-0"><?php echo e(total_amount()); ?></h3>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-cyan display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>All Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(totaluser()); ?></h3>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>Today Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_users()); ?></h3>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-currency-usd"></i></span></div>
            <div><span>Today Earnings</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_amount()); ?></h3>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <div class="card-body border-top">
       
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-orange text-center">
              <h1 class="font-light text-white"><?php echo e(totalsubadmin()); ?></h1>
              <h6 class="text-white">Total Sub-Admin</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-info text-center">
              <h1 class="font-light text-white"><?php echo e(totalprojectmanager()); ?> </h1>
              <h6 class="text-white">Total Project Manager </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-cyan text-center">
              <h1 class="font-light text-white"><?php echo e(totalemployee()); ?></h1>
              <h6 class="text-white">Total Employee</h6>
            </div>
          </div>
        </div>
         <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box bg-primary text-center">
              <h1 class="font-light text-white"><?php echo e(totalcashoperator()); ?></h1>
              <h6 class="text-white">Total Cash Opreater</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row m-b-0">
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-warning text-center">
              <h1 class="font-light text-white"><?php echo e(total_task()); ?></h1>
              <h4 class="text-white">Total Task Request's</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-secondary text-center">
              <h1 class="font-light text-white"><?php echo e(total_service()); ?></h1>
              <h4 class="text-white">Total Service Request's</h4>
            </div>
          </div>
        </div>
      </div>
       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Task Request's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_task_todo()); ?></h1>
              <h6 class="text-white">To-Do </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box  text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_task_working()); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC">
              <h1 class="font-light text-white"><?php echo e(total_task_pending()); ?></h1>
              <h6 class="text-white">Review / Pending</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_task_complete()); ?></h1>
              <h6 class="text-white">Completed </h6>
            </div>
          </div>
        </div>
      </div>

       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Service Request's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_service_todo()); ?></h1>
              <h6 class="text-white">To-Do</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_service_working()); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC" >
              <h1 class="font-light text-white"><?php echo e(total_service_pending()); ?></h1>
              <h6 class="text-white">Review / Pending </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_service_complete()); ?></h1>
              <h6 class="text-white">Completed</h6>
            </div>
          </div>
        </div>
      </div>
         
    </div>
    <?php endif; ?>
    <?php if(Auth::user()->job_title=='projectmanager'): ?>
    <div class="row m-b-0">
        <div class="col-md-6 col-lg-4 col-xlg-4">
          <div class="card card-hover">
            <div class="box bg-info text-center">
              <h1 class="font-light text-white"><?php echo e(total_pm_emp(Auth::user()->id)); ?></h1>
              <h4 class="text-white">Total Employee</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-4">
          <div class="card card-hover">
            <div class="box bg-secondary text-center">
              <h1 class="font-light text-white"><?php echo e(total_pm_emp_active(Auth::user()->id)); ?></h1>
              <h4 class="text-white"> Active Employee</h4>
            </div>
          </div>
        </div>
         <div class="col-md-6 col-lg-4 col-xlg-4">
          <div class="card card-hover">
            <div class="box bg-cyan text-center">
              <h1 class="font-light text-white"><?php echo e(total_pm_emp_leave(Auth::user()->id)); ?></h1>
              <h4 class="text-white"> Employee on Leave</h4>
            </div>
          </div>
        </div>
      </div>
     <div class="row m-b-0">
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-warning text-center">
              <h1 class="font-light text-white"><?php echo e(total_pm_task(Auth::user()->id)); ?></h1>
              <h4 class="text-white">Total Task Request's</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xlg-6">
          <div class="card card-hover">
            <div class="box bg-secondary text-center">
              <h1 class="font-light text-white"><?php echo e(total_pm_service(Auth::user()->id)); ?></h1>
              <h4 class="text-white">Total Service Request's</h4>
            </div>
          </div>
        </div>
      </div>
       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Task Request's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_pm_task_todo(Auth::user()->id)); ?></h1>
              <h6 class="text-white">To-Do </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box  text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_pm_task_working(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC">
              <h1 class="font-light text-white"><?php echo e(total_pm_task_pending(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Review / Pending</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_pm_task_complete(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Completed </h6>
            </div>
          </div>
        </div>
      </div>

       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Service Request's</h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(total_pm_service_todo(Auth::user()->id)); ?></h1>
              <h6 class="text-white">To-Do</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(total_pm_service_working(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC" >
              <h1 class="font-light text-white"><?php echo e(total_pm_service_pending(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Review / Pending </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(total_pm_service_complete(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Completed</h6>
            </div>
          </div>
        </div>
      </div>
   
    <?php endif; ?>
    <?php if(Auth::user()->job_title=='employee'): ?>
   
    <div class="card-body border-top">
       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Task's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(task_todo(Auth::user()->id)); ?></h1>
              <h6 class="text-white">To-Do </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box  text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(task_working(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC">
              <h1 class="font-light text-white"><?php echo e(task_pending(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Review / Pending</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(task_complete(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Completed </h6>
            </div>
          </div>
        </div>
      </div>

       <div class="row m-b-0">
         <div class="col-md-12 col-lg-12 col-xlg-12">
                <h4 class="font-light text-center"> All Service's </h4>
         </div>
       </div>   
      <div class="row m-b-0">
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #ff0000">
              <h1 class="font-light text-white"><?php echo e(service_todo(Auth::user()->id)); ?></h1>
              <h6 class="text-white">To-Do</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #999F88">
              <h1 class="font-light text-white"><?php echo e(service_working(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Work in progress</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #0099CC" >
              <h1 class="font-light text-white"><?php echo e(service_pending(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Review / Pending </h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
          <div class="card card-hover">
            <div class="box text-center" style="background-color: #007E33">
              <h1 class="font-light text-white"><?php echo e(service_complete(Auth::user()->id)); ?></h1>
              <h6 class="text-white">Completed</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
     <?php if(Auth::user()->job_title=='cashoperator'): ?>
     <div class="card-body border-top">
      <div class="row m-b-0">
        <div class="col-md-12 col-lg-12 col-xlg-12">
          <div class="card card-hover">
            <div class="box bg-orange text-center">
              <h1 class="font-light text-white">Welcome To Dashboard</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body border-top">
      <div class="row m-b-0">
        <!-- col -->
        <div class="col-lg-4 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-currency-usd"></i></span></div>
            <div><span>Today Add Balance</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_cashopt_amount(Auth::user()->id)); ?></h3>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-cyan display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>All Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(totaluser()); ?></h3>
            </div>
          </div>
        </div>
       
        <div class="col-lg-4 col-md-6">
          <div class="d-flex align-items-center">
            <div class="m-r-10"><span class="text-info display-5"><i class="mdi mdi-account-box"></i></span></div>
            <div><span>Today Customers</span>
              <h3 class="font-medium m-b-0"><?php echo e(today_users()); ?></h3>
            </div>
          </div>
        </div>
       
       
       
      </div>
    </div>
    
    <?php endif; ?>

      </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>