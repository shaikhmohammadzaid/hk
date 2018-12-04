<div class="navbar navbar-main">
    <div class="container container-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"> <img src="<?php echo e(asset('public/images/logo1.png')); ?>" alt="" /> </a> </div>
      <nav class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
           
          <li class="<?php echo e((Request::is('/') ? 'active' : '')); ?>"><a href="<?php echo e(url('/')); ?>">Home</a></li>
          <li class="<?php echo e((Request::is('about') ? 'active' : '')); ?>"><a href="<?php echo e(url('/about')); ?>" >About</a> </li>
          
         <li class="<?php echo e((Request::is('services') ? 'active' : '')); ?>"><a href="<?php echo e(url('/services')); ?>">Services</a> </li>
         
         <li class="<?php echo e((Request::is('contact') ? 'active' : '')); ?>"><a href="<?php echo e(url('/contact')); ?>">Contact</a> </li>
          <?php if(Route::has('login')): ?>          
          <?php if(auth()->guard()->check()): ?>
          <li class="<?php echo e((Request::is('home') ? 'active' : '')); ?>"><a href="<?php echo e(url('/home')); ?>">Dashboard</a></li>
          <li> <a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();"> Logout </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo e(csrf_field()); ?>

            </form>
          </li>
          <?php else: ?>
          <li class="<?php echo e((Request::is('login') ? 'active' : '')); ?>"><a href="<?php echo e(route('login')); ?>">Login</a></li>
         <li class="<?php echo e((Request::is('register') ? 'active' : '')); ?>"> <a href="<?php echo e(route('register')); ?>">Register</a></li>
          <?php endif; ?>
          
          <?php endif; ?>
        </ul>
        
      </nav>
    </div>
  </div>