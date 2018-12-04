@extends('layouts.app')
@section('title')Dashboard @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    <ol class="breadcrumb" style="margin:25px;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>     
                    </ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<ul style="">
                    <li><a href="{{ url('/myprofile') }}">My Profile</a></li>                    
                    <li><a href="{{ route('ourServices') }}">Our Services</a></li>
                    <li><a href="{{ url('/mytransactions') }}">My Transactions</a></li>
                   <li><a href="{{ url('/history') }}">History</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
