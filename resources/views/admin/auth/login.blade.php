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
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/admin/assets/images/logo.png') }}">
<title>{{ config('app.name') }}</title>
<!-- Custom CSS -->
<link href="{{ asset('public/admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('public/admin/dist/css/style.min.css') }}" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
@yield('style')
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
  <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('public/admin/assets/images/big/zxc.jpg') }}) no-repeat center center;">
    <div class="auth-box">
      <div id="loginform">
      
        <div class="logo"> <span class="db"> <img src="{{ asset('public/admin/assets/images/logo.png') }}" alt="homepage" class="dark-logo"/></span>

          <h5 class="font-medium m-b-20" style="margin-top: 10px;"><b>Sign In to Admin</b></h5>
        </div>
        <div class="flash-message">  @if(Session()->has('success'))
        <div class="alert alert-danger alert-dismissible" role="alert"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong>{{Session::get('success') }}</strong>
        </div>
         @endif
        </div>
          
        <!-- Form -->
        <div class="row">
          <div class="col-12">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('admin.login.submit') }}">
              {{ csrf_field() }}
              
              @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 
                <div class="input-group mb-3"> 
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span> </div>
                
                 <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}"  placeholder="Email address" aria-label="Email addres" aria-describedby="basic-addon1" required autofocus>
               </div>
              
              @if ($errors->has('password')) <span class="help-block"> 
                <strong>{{ $errors->first('password') }}</strong> </span> @endif 
                <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span> </div>
                <input id="password" type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                </div>
              <div class="form-group text-center">
                <div class="col-xs-12 p-b-20">
                  <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer text-center" style="">All Rights Reserved by {{ config('app.name') }}. </footer>
  <!-- ============================================================== -->
  <!-- End footer -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Javascripts-->
@include('admin.layout.footer')
</body>
</html>
