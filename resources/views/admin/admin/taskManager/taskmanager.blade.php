@extends('admin.layout.layout')
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Task Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Task Listing</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="task_assign" class="btn btn-primary pull-right">TASK ASSIGN</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
   <div class="row">
        <div class="col-12">
              <div class="card">
                    <div class="card-body">
                       <h4 class="card-title">Serch Services</h4>
                          <div class="repeater-default m-t-30">
                                    <div data-repeater-list="">
                                        <div data-repeater-item="">
                                         <form class="row" id="frm-search" action="" method="POST"  >
                                            {{ csrf_field() }}
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                        <label for="pwd">Date Range picker</label>
                                                       <div class="input-daterange input-group" id="date-range">
                                                            <input type="" class="form-control" name="start" id="start" required />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text bg-info b-0 text-white">TO</span>
                                                            </div>
                                                            <input type="" class="form-control" name="end" id="end" required />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group col-md-3">
                                                        <label for="pwd">All Service</label>
                                                        <select name="title" id="title" class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option>        
                                                            @foreach($tasks as  $task)
                                                            <option value="{{$task->task_name}}">{{$task->task_name}}</option> @endforeach                 
                                                          </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="msg">Status</label>
                                                         <select name="status" id="status"  class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option> 
                                                            <option value="0">All</option>
                                                            <option value="1">Assign</option>  
                                                            <option value="2">Allocated</option>
                                                            <option value="3">Working</option>
                                                            <option value="4">Pending</option>
                                                            <option value="5">Review</option>
                                                            <option value="6">Completed</option>              
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
          <h4 class="card-title">Task Listing</h4>
          <div class="col-md-12"> @if (session('success_msg'))
            <div  class="alert alert-success alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success_msg') }} </div>
            @endif </div>
            @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif

          <div class="table-responsive" id="InfoTable"> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="add_task_assign_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Task Assign</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="get" id="frm-assign" class="modeladdevent">
          <input type="hidden" name="task_id" id="task_id">
          <div class="well">
            <div class="form-group">
              <label for="emp1" class="control-label col-form-label">Task</label>
              <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="fas fa-tasks"></i></span>
                <select name="title" id="title"  class="form-control" required >
                  <option value="" disabled selected>Select your option</option>                  
                  @foreach($tasks as  $task)
                  <option value="{{$task->task_name}}">{{$task->task_name}}</option>                  
                  @endforeach                 
                </select>
              </div>
            </div>
          </div>
          <div class="well"> <span>Description :- </span>
            <textarea name="description" id="description" class="form-control" ></textarea>
          </div>
          <div class="well"> <span>Task Date:-</span>
            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span>
              <input type="text" class="mdate form-control " name="assign_date" id="date">
            </div>
          </div>
          <div class="well">
            <div class="form-group">
              <label for="inputEmail3" class="control-label col-form-label">Start Time</label>
              <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span> </div>
                <input type="text" name="start_time" id="start_time" class="timepicker form-control"  placeholder="Start Time" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="control-label col-form-label">End Time</label>
              <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span> </div>
                <input type="text" name="end_time" id="end_time" class="timepicker form-control" placeholder="End Time" required/>
              </div>
            </div>
          </div>
          <div class="well">
            <div class="form-group">
              <label for="emp1" class="control-label col-form-label">Project Manager</label>
              <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                <select name="pm_id" id="pm_id"  class="form-control">
                  <option value="" disabled selected>Select your option</option>                  
                  @foreach($pms as  $pm)                  
                  <option value="{{$pm->id}}">{{$pm->name}}</option>                  
                 @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-rounded btn-block btn-outline-info">Save</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_task_assign_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Task Assign</h4>
        <button type="button" class="btn btn-circle btn-dark close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="get" id="frm-update-assign" class="modeladdevent">
          <input type="hidden" name="task_id" id="edit_task_id">
           <input type="hidden" name="status" id="edit_status" value="1">
          <div class="well">
            <div class="form-group">
              <label for="emp1" class="control-label col-form-label">Task</label>
              <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="fas fa-tasks"></i></span>
                <select name="title" id="edit_title"  class="form-control" required >
                  <option value="" disabled selected>Select your option</option>
                  @foreach($tasks as  $task)                  
                  <option value="{{$task->task_name}}">{{$task->task_name}}</option>                 
                  @endforeach  
                </select>
              </div>
            </div>
          </div>
          <div class="well"> <span>Description :- </span>
            <textarea name="description" id="edit_description" class="  form-control"  ></textarea>
          </div>
          <div class="well"> <span>Task Date:-</span>
            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span>
              <input type="text" name="assign_date" id="edit_date" class="mdate form-control"    required>
            </div>
          </div>
          <div class="well">
            <div class="form-group">
              <label for="inputEmail3" class="control-label col-form-label">Start Time</label>
              <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span> </div>
                <input type="text" name="start_time" id="edit_start_time" class="timepicker form-control"  required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="control-label col-form-label">End Time</label>
              <div class="input-group">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon14"> <i class=" far fa-clock "></i> </span> </div>
                <input type="text" name="end_time" id="edit_end_time" class="timepicker form-control"  required/>
              </div>
            </div>
          </div>
          <div class="well">
            <div class="form-group">
              <label for="emp1" class="control-label col-form-label">Project Manager</label>
              <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                <select name="pm_id" id="edit_pm_id"  class="form-control">
                  <option value="" disabled selected>Select your option</option>
                  @foreach($pms as  $pm)                  
                  <option value="{{$pm->id}}">{{$pm->name}}</option>
                  @endforeach                 
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-rounded btn-block btn-outline-info">Upadte</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->
@endsection 

@section('script')
 @include('admin.admin.taskManager.js.taskmanager-js')
@endsection
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>