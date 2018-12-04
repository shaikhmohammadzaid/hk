@extends('layouts.app')
@section('title')History @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">History</div>
 			<ol class="breadcrumb" style="margin:25px;">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
                <div class="panel-body"> 
                   <table class="table-striped table-hover ">
                     <thead>
                       <tr>
                         <th width="5%">No</th>
                         <th>Servie Name</th>
                         <th  width="10%">Price </th>
                         <th  width="10%">Date </th>
                         <th  width="10%">Start Time</th>
                         <th  width="10%">End Time</th>
                         <th width="10%">Status</th>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach($historys as $key => $history)
                       <tr>
                         <td >{{$key+1}}</td>
                         <td>{{$history->task_name}}</td>
                         <td>{{$history->service_price}}</td>
                         <td>{{$history->service_date}}</td>
                         <td>{{$history->service_start_time}}</td>
                         <td>{{$history->service_end_time}}</td>
                         <td>{{service_status($history->status)}}</td>
                       </tr>
                       @endforeach
                     </tbody> 
                   </table>
                   <div align="center"> {{ $historys->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection