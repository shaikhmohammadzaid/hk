<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="left_content">
        <div class="single_page">           
          <h1 align="center"> 404, Page not found</h1>
          <h3 align="center"><a href="<?php echo e(url('/')); ?>">Click here</a> to go to home page</h3>
          
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>