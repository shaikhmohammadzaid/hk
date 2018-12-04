@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Employee Leaves management</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee Leaves management</li>
          </ol>
        </nav>
      </div>
    </div>
    
  </div>
</div>
<div class="container-fluid">
   <div class="row">
        <div class="col-12">
              <div class="card">
                    <div class="card-body">
                       <h4 class="card-title">Serch Employee Leave</h4>
                          <div class="repeater-default m-t-30">
                                    <div data-repeater-list="">
                                        <div data-repeater-item="">
                                         <form class="row" id="frm-search" action="" method="POST"  >
                                            {{ csrf_field() }}
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                        <label for="pwd">choose date </label>
                                                       <div class="input-daterange input-group" id="date-range">
                                                            <input type="" class="form-control" name="start" id="start" required />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text bg-info b-0 text-white">TO</span>
                                                            </div>
                                                            <input type="" class="form-control" name="end" id="end" required/>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group col-md-3">
                                                        <label for="pwd">Leave Reasone</label>
                                                        <select name="leave_id" id="leave_id" class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option>        
                                                             @foreach($ls as  $l)
                                                            <option value="{{$l->leave_id}}">{{$l->leave_type}}</option> @endforeach                 
                                                          </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="msg">Status</label>
                                                         <select name="status" id="status"  class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option> 
                                                            <option value="0">All</option>
                                                            <option value="1">Waiting</option>  
                                                            <option value="2">Accept</option>
                                                            <option value="3">Reject</option>
                                                           
                                                          </select>
                                                    </div>

                                                    <div class="form-group col-md-12" >
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" style="float: right;">Search
                                                        </button>
                                                        <button class="btn btn-info waves-effect waves-light btn-refresh" type="button" style="float: left;">Refresh
                                                        </button>
                                                       
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                        </div>
                                    </div>
                         
                          </div>
                    </div>
              </div>
        </div>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Employee Leaves </h4>
          
          <div class="table-responsive" id="InfoTable"> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection 

@section('script')
 @include('admin.projectmanager.employeeLeaves.js.employeeLeave-js')
@endsection