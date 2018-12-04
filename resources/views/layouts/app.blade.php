<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Super Clean - @yield('title')</title>
<meta name="description" content="@yield('seo-description')">
<meta name="keywords" content="@yield('seo-keywords')">
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
@include('layouts.partials.head')
<!-- END HEADER SECTION -->
@yield('stylesheet')
<script type="text/javascript" src="{{ asset('public/js/vendor/modernizr.min.js') }}"></script>
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
              @if (Auth::check())
              <li><i class="fa fa-money">&nbsp;Rs.{{ getbalance(Auth::user()->id) }}</i> </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- NAVBAR SECTION -->
  @include('layouts.partials.navbar')
  <!--END NAVBAR SECTION -->
  
</div>
<!-- Content part -->
@yield('content')
<!-- FOOTER SECTION -->
@include('layouts.partials.footer')
<!-- END FOOTER SECTION -->
<!-- FOOTER-JS SECTION -->
@include('layouts.partials.footer-js')
<!-- END FOOTER-JS SECTION -->
</body>
</html>