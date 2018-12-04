@extends('layouts.app')
@section('title')About us @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<!-- BANNER -->
<div class="section banner-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="title-page">Our Company</div>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active">Our Company</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- ABOUT FEATURE -->
<div class="section pad">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6">
        <h3>Company Overview</h3>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="margin-bottom-50"></div>
        <a href="#" class="btn btn-primary" title="Learn More">Contact Us</a> </div>
      <div class="col-sm-5 col-md-5 col-md-offset-1">
        <div class="box"> <img src="{{ asset('public/images/about-img.png') }}" alt="" class="img-responsive"> </div>
      </div>
    </div>
  </div>
</div>
<!-- WHY -->
<div class="section pad bglight">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <h2 class="section-heading"> Why choosing us </h2>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-clock"></i> </div>
          <div class="infobox">
            <h5 class="title">Saves You Time</h5>
            <div class="text">Commodo enim aliquam suspendisse tortor cum diam commodo facilisis rutrum et duis nisl.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-shield"></i> </div>
          <div class="infobox">
            <h5 class="title">Safety First</h5>
            <div class="text">Rutrum et duis nisl porttitor vel eleifend odio ultricies ut orci in adipiscing</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-info"></i> </div>
          <div class="infobox">
            <h5 class="title">Easy To Get Help</h5>
            <div class="text">Commodo enim aliquam suspendisse tortor cum diam commodo facilisis rutrum et duis nisl.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-speech"></i> </div>
          <div class="infobox">
            <h5 class="title">Seamless Communication</h5>
            <div class="text">Commodo enim aliquam suspendisse tortor cum diam commodo facilisis rutrum et duis nisl.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-star"></i> </div>
          <div class="infobox">
            <h5 class="title">Only The Best Quality</h5>
            <div class="text">Commodo enim aliquam suspendisse tortor cum diam commodo facilisis rutrum et duis nisl.</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-icon-3">
          <div class="icon"> <i class="icons icon-credit-card"></i> </div>
          <div class="infobox">
            <h5 class="title">Cash Free Payment</h5>
            <div class="text">Facilisis rutrum et duis nisl porttitor vel eleifend odio ultricies ut orci in adipiscing</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- MISSION -->
<div class="section pad">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12"> </div>
      <div class="col-sm-6 col-md-6">
        <h3>Our Mission</h3>
        <p>Renim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <ul class="bull">
          <li>Offer a broad range of cost-effective industrial solutions</li>
          <li>Maintain a robust inventory of parts and products</li>
          <li>Provide repair services to a diverse customer base across multiple sectors</li>
          <li>Remain responsive to our customers’ needs</li>
          <li>Work fewer hours — and make more money</li>
          <li>Attract and retain quality, high-paying customers</li>
          <li>Manage your time so you’ll get more done in less time</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="vidimg">
          <div class="play-vid"> <a class="popup-youtube" href="https://www.youtube.com/watch?v=JGYuCRYFxew"><span class="fa fa-play fa-3x playvid"></span></a> </div>
          <img src="{{ asset('public/images/welcome-img.jpg') }}" alt="" class="img-responsive"> </div>
      </div>
    </div>
  </div>
</div>
<!-- TEAM -->
<div class="section pad">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <h2 class="section-heading"> Our team </h2>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-1.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Kieran Gib</div>
                <p>Cleaner</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-2.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Santi Carz</div>
                <p>Cleaner</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-3.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Demi Zalalem</div>
                <p>Cleaner</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-4.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Jon Toral</div>
                <p>Plumber</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-5.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Mertesac</div>
                <p>Plumber</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="box-team-2">
          <div class="media"> <img src="{{ asset('public/images/team-6.jpg') }}" alt="rud" class="img-responsive"> </div>
          <div class="body">
            <div class="info-box">
              <div class="text">
                <div class="title">Aary Ramsey</div>
                <p>Plumber</p>
                <div class="social-team"> <a href="#" title=""><span class="fa fa-facebook"></span></a> <a href="#" title=""><span class="fa fa-twitter"></span></a> <a href="#" title=""><span class="fa fa-linkedin"></span></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CTA -->
<div class="section pad cta-bgc">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="cta-content">
          <h3 class="cta-title-3">Ready to book your cleaning?</h3>
        </div>
        <div class="cta-action"><a href="#" class="btn btn-white" title="Learn More">Contact Us</a></div>
      </div>
    </div>
  </div>
</div>
@endsection 