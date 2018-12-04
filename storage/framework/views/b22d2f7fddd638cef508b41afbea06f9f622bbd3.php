<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    

     <div class="navbar-header">
      <!-- This is for the sidebar toggle which is visible on mobile only -->
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <a class="navbar-brand" href="<?php echo e(url('/admin/dashboard')); ?>">
      <!-- Logo icon -->
      <b class=" logo-text">
      <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
      <!-- Dark Logo icon -->
      <img src="<?php echo e(asset('public/admin/assets/images/logo.png')); ?>" alt="homepage" style="width: 148px; height: 70px; margin-left: 40px; margin-right: 240px; margin-top: 15px; "  class="dark-logo" />
      <!-- Light Logo icon -->
      <img src="<?php echo e(asset('public/admin/assets/images/logo-light-icon.png')); ?>" alt="homepage" class="light-logo" /> </b>
      <!--End Logo icon -->
      <!-- Logo text -->
      <span class="logo-icon">
      <!-- dark Logo text -->
     </span> </a>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Toggle which is visible on mobile only -->
      <!-- ============================================================== -->
      </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
   <!-- parth -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-left mr-auto">
      
        <!-- ============================================================== -->
        <!-- mega menu -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End mega menu -->
      </ul>
      <!-- ============================================================== -->
      <!-- Right side toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-right">
        <!-- ============================================================== -->
        <!-- create new -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- notification -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
          <span class="badge"><?php echo e(message_count(Auth::user()->id)); ?></span> </a>
          <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"> <span class="with-arrow"><span class="bg-primary"></span></span>
            <ul class="list-style-none">
              <li>
                <?php $ms = message_title(Auth::user()->id); ?>

               <?php $__currentLoopData = $ms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                           
                <div class="drop-title">
                <h4 class="m-b-0 m-t-5"> 
                  <a href="<?php echo e(route('admin.inbox')); ?>"><?php echo e($m->title); ?></a>
                </h4>
                  <span class="font-light"></span> </div>
               </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </li>
              <li> <a class="nav-link text-center m-b-5 bg-primary text-white" href="<?php echo e(route('admin.inbox')); ?>"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a> </li>
            </ul>
          </div>
        </li>
        <!-- ============================================================== -->
        <!-- End notification -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(asset('public/admin/assets/images/users/1.jpg')); ?>" alt="user" class="rounded-circle" width="31"></a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY"> <span class="with-arrow"><span class="bg-primary"></span></span>
            <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
              <div class=""><img src="<?php echo e(asset('public/admin/assets/images/users/1.jpg')); ?>" alt="user" class="img-circle" width="60"></div>
              <div class="m-l-10">
                <h4 class="m-b-0"><?php echo e(ucfirst(Auth::user()->name)); ?> </h4>
                <p class=" m-b-0"><?php echo e(Auth::user()->email); ?></p>
              </div>
            </div>
            <a class="dropdown-item" href="<?php echo e(route('adminProfile')); ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a> <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> <a class="dropdown-item" href="<?php echo e(route('admin.inbox')); ?>"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo e(url('admin/logout')); ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
          </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
      </ul>
    </div>


  </nav>
</header>
