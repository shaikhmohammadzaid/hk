@extends('layouts.app')
@section('title')Contact us @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<!-- BANNER -->
<div class="section banner-page"  style="display:none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="title-page">Contact</div>
        <ol class="breadcrumb">
         <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active">Contact</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- ABOUT FEATURE -->
<div class="section pad">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="widget">
          <h4 class="lead">Feel free to leave us a message using the contact form and we will get back to you within 24 hours.</h4>
        </div>
        <div class="widget contact-info-sidebar">
          <div class="widget-title"> Contact Info </div>
          <ul class="list-info">
            <li>
              <div class="info-icon"> <span class="fa fa-map-marker"></span> </div>
              <div class="info-text">99 S.t Jomblo Park Pekanbaru 28292. Indonesia</div>
            </li>
            <li>
              <div class="info-icon"> <span class="fa fa-phone"></span> </div>
              <div class="info-text">(0761) 654-123987</div>
            </li>
            <li>
              <div class="info-icon"> <span class="fa fa-envelope"></span> </div>
              <div class="info-text">info@yoursite.com</div>
            </li>
            <li>
              <div class="info-icon"> <span class="fa fa-clock-o"></span> </div>
              <div class="info-text">Mon - Sat 09:00 - 17:00</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-8 col-md-8">
        <div class="free-quote">
          <h2 class="section-heading-2 color_white"> Get free quote </h2>
          @if(Session()->has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('success') }}</div>
          @elseif(Session()->has('failure'))
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('failure') }}</div>
          @endif
          
          <form  action="{{ route('savecontact')}}" method="post" class="form-contact"   data-toggle="validator" novalidate="true">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" name="p_name" value="" placeholder="Full Name" required="">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
          <input type="email" class="form-control" name='p_email' id="p_email" placeholder="Email Address" required="">
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="p_shop_no" placeholder="Shop No" >
          <div class="help-block with-errors"></div>
        </div>
             
            <div class="form-group">
              <textarea name="p_message" class="form-control" rows="6" placeholder="Write message"></textarea>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
               
              <button type="submit"   style="pointer-events: all; cursor: pointer;">ASK A QUOTE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CTA -->
  
@endsection 