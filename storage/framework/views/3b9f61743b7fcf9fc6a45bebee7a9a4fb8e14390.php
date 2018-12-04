<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('public/admin/assets/images/light-logo.png')); ?>">
    <title><?php echo e(config('app.name')); ?></title>
    <!-- Custom CSS -->    
    <link href="<?php echo e(asset('public/admin/assets/libs/chartist/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/admin/assets/extra-libs/c3/c3.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/admin/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet">
     <link href="<?php echo e(asset('public/admin/assets/libs/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
   
    <!-- Custom CSS -->

    <link href="<?php echo e(asset('public/admin/dist/css/style.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/admin/dist/css/datatable-custom.css')); ?>" rel="stylesheet">
       

	<?php echo $__env->yieldContent('style'); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
</head>
<body>
     <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->        
   <?php echo $__env->make('admin.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->       
   <?php echo $__env->make('admin.layout.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
  <div class="page-wrapper"><?php echo $__env->yieldContent('content'); ?>
  <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
   <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== --> 
      </div>  
</div> <footer class="footer text-center">All Rights Reserved by <?php echo e(config('app.name')); ?>.
</footer>
 <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    
     
    <!-- ============================================================== -->
<!-- Javascripts-->
<?php echo $__env->make('admin.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>