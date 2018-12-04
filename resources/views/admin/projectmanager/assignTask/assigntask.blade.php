@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Admin Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admins</li>
          </ol>
        </nav>
      </div>
    </div>
    
  </div>
</div>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- basic table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Admins</h4>
          <div class="col-md-12">
           @if (session('success_msg'))
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ session('success_msg') }}
            </div>
            @endif
        </div>
          
          <div class="table-responsive"> @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif
            <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Employee</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $cnt = count($tms); if ($cnt>0) {?>
              @foreach($tms as  $tm)
              <tr>
                <td>{{$tm->task_id}}</td>
                <td>{{$tm->title}}</td>
                <td>{{$tm->description}}</td>

                @if($tm->emp_id != NULL)
                <td>{{$tm->emp_id}}-{{get_Name($tm->emp_id)}}</span></td>
                @else
                <td></td>
                @endif
                
                <td>{{$tm->assign_date}}</td>
                <td>{{$tm->start_time}}</td>
                <td>{{$tm->end_time}}</td>
                <td>{{task_status($tm->status)}} </td>
                @if($tm->status == 1)
                 <td> <a data-id="{{$tm->task_id}}" id="taskassign" data-toggle="tooltip" data-original-title="task assign to employee" id="exampleWarningConfirm">          
                       <i class="mdi mdi-account-switch" style="height: 10px;"></i>
                    </a></td>
                @elseif($tm->status == 5) 
                  <td>{{pm_task_status($tm->status,$tm->task_id)}} </td>
                @else
                 <td></td>   
                 @endif   
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                 <p>Record not found.</p>
              </tr>   
              <?php } ?>
              
              </tbody>
              
            
            </table>
             <div align="center"> {{ $tms->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="taskassignmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Task Assign to Employee</h4>
        <button type="button" class="btn btn-circle btn-dark close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
                 
        <form action="" method="get" id="frm-taskAssignEmp" class="modeladdevent">
           <input type="hidden" name="task_id" id="task_id" >
          
          <div class="well"> 
               <div class="form-group">
                    <label for="emp1" class="control-label col-form-label">Task</label>
                     <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                            <select name="emp_id" id="emp_id"  class="form-control"  required >
                                <option value="" disabled selected>Select your option</option>
                                  @foreach($emps as  $emp)
                                      <option value="{{$emp->id}}">{{$emp->name}}</option>
                                  @endforeach
                                
                              </select>
                              
                      </div>
               </div> 
            </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-rounded btn-block btn-outline-info btn-save">Save</button>
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
<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="reviewmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Task Review</h4>
        <button type="button" class="btn btn-circle btn-dark close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
                 
        <form action="" method="get" id="frm-review" class="modeladdevent">
           <input type="hidden" name="task_id" id="modal_task_id" >
          
          <div class="well"> 
               <div class="form-group">
                    <label for="emp1" class="control-label col-form-label">Task</label>
                     <div class="input-group">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                            <select name="status" id="status"  class="form-control"  required >
                                <option value="" disabled selected>Select your option</option>
                                 
                               <option value="6">Completed</option>
                               <option value="2">Re-Allocate</option>
                                
                                
                              </select>
                              
                      </div>
               </div> 
            </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-rounded btn-block btn-outline-info review-save">Save</button>
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
 @include('admin.projectmanager.assignTask.js.assigntask-js')
@endsection