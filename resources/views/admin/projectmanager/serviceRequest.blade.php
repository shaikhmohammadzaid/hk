@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Service Request </h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project-Manager</li>
             <li class="breadcrumb-item active" aria-current="page">Service-Request</li>
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
            <table id="export" class="table table-responsive table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Service</th>
                  <th>Service Price</th>
                  <th>Start Time<br>End Time </th>
                  <th>Location<br>Branch</th> 
                  <th>Block - Floor</th> 
                  <th>Shop No</th>
                  <th>Employee</th>
                  <th>Status</th> 
                  <th>Action</th> 
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($services); if ($cnt>0) {?>
              @foreach($services as  $service)
              <tr>
              
                <td>{{$service->service_req}} </td>
                <td>{{UcFirst(getUser($service->user_id))}}</td>
                <td>{{getServiceName($service->service_id)}}</td>
                <td>{{$service->service_price}} </td>
                <td>{{$service->service_date}}<br>{{$service->service_start_time}}<br>{{$service->service_end_time}} </td> 
                <td>{{set_location($service->location)}}<br>{{set_branch($service->branch)}} </td> 
                <td>{{$service->block}} - {{$service->floor}} </td> 
                <td>{{$service->shop_no}} </td>
                @if($service->emp_id != NULL)
                <td>{{$service->emp_id}}-{{get_Name($service->emp_id)}} </td>
                @else
                <td></td>
                @endif
                <td>{{task_status($service->status)}} </td>
               
                @if($service->status == 1)
                 <td> <a data-id="{{$service->service_req}}" id="serviceassign" data-toggle="tooltip" data-original-title="service assign to employee" id="exampleWarningConfirm" >          
                       <i class="mdi mdi-account-switch" style="height: 10px;"></i>
                    </a></td>
                @elseif($service->status == 5)
                   <td> {{pm_service_status($service->status,$service->service_req)}}</td>
                @else
                  <td></td>
                @endif 
              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody>
              
              <tfoot>
               
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="serviceassignmodel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Service Allocate to Employee</h4>
        <button type="button" class="btn btn-circle btn-dark close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
                 
        <form action="" method="get" id="frm-taskAssignEmp" class="modeladdevent">
           <input type="hidden" name="service_req" id="service_req" >
            <input type="hidden" name="pm_id" id="pm_id" value="{{Auth::user()->id}}">
          
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
           <input type="hidden" name="service_req" id="modal_service_req" >
          
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
 <script type="text/javascript">
    $(document).ready(function() {

      $(document).ready(function() {
       $('.mdb-select').material_select();
      });

      $(document).on('click','#serviceassign',function(){
      var service_req=$(this).data('id');
        $('#service_req').val(service_req);
          $('#serviceassignmodel').modal('show');

      });

     //task assiend  to employee
      $(document).on('click','.btn-save',function(e){
           e.preventDefault();
          var service_req = $('#service_req').val(); 
          var emp_id = $('#emp_id').val(); 
          var pm_id = $('#pm_id').val(); 

          
           $.get("{{ route('serviceAllocateEmp') }}",{emp_id:emp_id,pm_id:pm_id,service_req:service_req},function(data){
                           
                                window.location.href = "{{ url('admin/project-manager/ServiceRequest') }}";
                          
            });
            $("#frm-taskAssignEmp").trigger('reset');
      });
      
    
    });

      //review Script
     $(document).on('click','#review',function(){
        var id=$(this).data('id');
        $('#modal_service_req').val(id);
        $("#reviewmodel").modal('show');

     });

     jQuery('.review-save').click( function (e) { 
         
    var service_req = $('#modal_service_req').val();  
    var status=  $('#status').val();
    
    
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    e.preventDefault();   
    var path="{{url ('/')}}/admin/emp_review_servicestatus/"+service_req+"/"+status;      
     jQuery.ajax({
            url:path,
            method: 'GET', 
              success: function(response1){        
              console.log(response1); 
                location.reload(true); 
             }   
  
        });   
  }); 

     $(document).ready(function() {
      
      ////////////////////////////////
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      }); 
      ///////////////////////////

      });

 </script>
@endsection