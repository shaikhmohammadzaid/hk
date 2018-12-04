<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
<meta charset="utf-8">
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Super Clean - <?php echo $__env->yieldContent('title'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('seo-description'); ?>">
<meta name="keywords" content="<?php echo $__env->yieldContent('seo-keywords'); ?>">
<meta name="author" content="Amit Khatri">
<!-- ==============================================
	Favicons
	=============================================== -->
<link rel="shortcut icon" href="public/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
<!-- HEADER SECTION -->
<?php echo $__env->make('layouts.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END HEADER SECTION -->
<?php echo $__env->yieldContent('stylesheet'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/js/vendor/modernizr.min.js')); ?>"></script>
</head>
<body>
<!-- Load page -->
<div class="animationload">
  <div class="loader"></div>
</div>
<!-- HEADER -->
<div class="header">
  <!-- TOPBAR -->
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-5">
          <div class="topbar-left">
            <div class="welcome-text"> 24/7 Support Service </div>
          </div>
        </div>
        <div class="col-sm-9 col-md-7">
          <div class="topbar-right">
            <ul class="topbar-menu">
              <li><i class="icon-phone icons"></i> Call Us Today +91-83472828589</li>
              <li><i class="icon-location-pin icons"> </i> A-106, Gitamandir HubTown.</li>
              <?php if(Auth::check()): ?>
              <li><i class="fa fa-money">&nbsp;Rs.<?php echo e(getbalance(Auth::user()->id)); ?></i> </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- NAVBAR SECTION -->
  <?php echo $__env->make('layouts.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <!--END NAVBAR SECTION -->
  
</div>
<!-- Content part -->
<?php echo $__env->yieldContent('content'); ?>
<!-- FOOTER SECTION -->
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END FOOTER SECTION -->
<!-- FOOTER-JS SECTION -->
<?php echo $__env->make('layouts.partials.footer-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END FOOTER-JS SECTION -->
</body>
</html>