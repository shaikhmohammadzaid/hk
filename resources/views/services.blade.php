@extends('layouts.app')
@section('title')Services @endsection
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
        <div class="title-page">Our Services</div>
        <ol class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active">Services</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- ABOUT FEATURE -->
 
<!-- WHY -->

	<!-- ABOUT FEATURE -->
	<div class="section pad">
		<div class="container">
			
			<div class="box-service">
				<div class="box-service-item">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="body">
				                <h3><a href="services-detail.html" class="title">Complete Janitorial Service</a></h3>
				                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed autem vel eum iriure dolor in hen rit in vulputate velitd.</p>
				                <a href="#" class="readmore">Read More <i class="fa fa-angle-right"></i></a>
			              	</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="media">
				                <img src="{{ asset('public/images/service-1-2.jpg') }}" alt="rud" class="img-responsive">
			              	</div>
						</div>
					</div>
				</div>
				<div class="box-service-item">
					<div class="row">
						<div class="col-sm-8 col-md-8">
							<div class="media">
				                <img src="{{ asset('public/images/service-2-2.jpg') }}" alt="rud" class="img-responsive">
			              	</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="body">
				                <h3><a href="#" class="title">Vacation Rental Turnover Cleaning</a></h3>
				                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed autem vel eum iriure dolor in hen rit in vulputate velitd.</p>
				                <a href="#" class="readmore">Read More <i class="fa fa-angle-right"></i></a>
			              	</div>
						</div>
					</div>
				</div>
				<div class="box-service-item">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="body">
				                <h3><a href="#" class="title">Apartment Move In/Out Cleaning</a></h3>
				                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed autem vel eum iriure dolor in hen rit in vulputate velitd.</p>
				                <a href="#" class="readmore">Read More <i class="fa fa-angle-right"></i></a>
			              	</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="media">
				                <img src="{{ asset('public/images/service-3-2.jpg') }}" alt="rud" class="img-responsive">
			              	</div>
						</div>
					</div>
				</div>
				<div class="box-service-item">
					<div class="row">
						<div class="col-sm-8 col-md-8">
							<div class="media">
				                <img src="{{ asset('public/images/service-4-2.jpg') }}" alt="rud" class="img-responsive">
			              	</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="body">
				                <h3><a href="#" class="title">Final Construction Cleaning</a></h3>
				                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed autem vel eum iriure dolor in hen rit in vulputate velitd.</p>
				                <a href="#" class="readmore">Read More <i class="fa fa-angle-right"></i></a>
			              	</div>
						</div>
					</div>
				</div>
				<div class="box-service-item">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="body">
				                <h3><a href="#" class="title">Office Common Area Cleaning</a></h3>
				                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed autem vel eum iriure dolor in hen rit in vulputate velitd.</p>
				                <a href="services-detail.html" class="readmore">Read More <i class="fa fa-angle-right"></i></a>
			              	</div>
						</div>
						<div class="col-sm-8 col-md-8">
							<div class="media">
				                <img src="{{ asset('public/images/service-5-2.jpg') }}" alt="rud" class="img-responsive">
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