@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Task Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Task List</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
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
        <div class="table"> @if(Session()->has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong> {{Session::get('success') }}</strong> </div>
          @elseif(Session()->has('failure'))
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong>{{Session::get('failure') }}</strong> </div>
          @endif
          <div class="row">
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #CC0000" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> To Do ({{service_todo(Auth::user()->id)}})</h6>
                </div>
              </div>
              <?php $cnt = count($allocates); if ($cnt>0) {?>
              @foreach($allocates as $key=> $allocate)
              <div class="panel-body">
                <h4><b>{{getServiceName($allocate->service_id)}}</b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse">{{$allocate->service_date}}</label>
                    <button type="button" class="btn waves-effect waves-light btn-xs btn-info start" id="{{ Auth::user()->id }}/{{$allocate->service_req}}/{{$allocate->status}}">Start</button>
               
                  <div>
                    <label class="label label-inverse">Start {{$allocate->service_start_time}} - End {{$allocate->service_end_time}}</label>
                  </div>
                </div>
              </div>
              @endforeach
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #FF8800" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Work in progress ({{service_working(Auth::user()->id)}}) </h6>
                </div>
              </div>
              <?php $cnt = count($workings); if ($cnt>0) {?>
              @foreach($workings as $key=> $working)
              <div class="panel-body">
                <h4><b>{{getServiceName($working->service_id)}}</b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse">{{$working->service_date}}</label>
                  {{task_status($working->status)}}
                  <div> <a class="btn waves-effect waves-light btn-xs btn-success completed" data-service_req-id="{{$working->service_req}}" data-status="{{$working->status}}" data-emp-id="{{Auth::user()->id}}" >Completed</a></div>
                  <div>
                    <label class="label label-inverse">Start-Time {{$working->emp_start_time}} </label>
                  </div>
                </div>
              </div>
              @endforeach
             
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #0099CC" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;">  Review / Pending ({{service_pending(Auth::user()->id)}})</h6>
                </div>
              </div>
              <?php $cnt = count($pendings); if ($cnt>0) {?>
              @foreach($pendings as $key=> $pending)
              <div class="panel-body">
                <h4><b>{{getServiceName($pending->service_id)}}</b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse">{{$pending->service_date}}</label>
                  {{task_status($pending->status)}}
                   @if($pending->status== 4)
                    <button type="button" class="btn waves-effect waves-light btn-xs btn-warning start" id="{{ Auth::user()->id }}/{{$pending->task_id}}/{{$pending->status}}">Start</button>
                  @endif
                  <div>
                    Service Time :
                    <label class="label label-inverse">Start {{$pending->service_start_time}} - End {{$pending->service_end_time}}</label>
                    Employee Time :
                    <label class="label label-inverse">Start {{$pending->emp_start_time}} - End {{$pending->emp_end_time}}</label>
                  </div>
                </div>
              </div>
              @endforeach
             
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #007E33" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Completed ({{service_complete(Auth::user()->id)}})</h6>
                </div>
              </div>
              <?php $cnt = count($completes); if ($cnt>0) {?>
              @foreach($completes as $key=> $complete)
              <div class="panel-body">
                <h4><b>{{getServiceName($complete->service_id)}}</b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse">{{$complete->service_date}}</label>
                  {{task_status($complete->status)}}
                  <div>
                     Service Time :
                    <label class="label label-inverse">Start {{$complete->service_start_time}} - End {{$complete->service_end_time}}</label>
                    Employee Time :
                    <label class="label label-inverse">Start {{$complete->emp_start_time}} - End {{$complete->emp_end_time}}</label>
                  </div>
                </div>
              </div>
              @endforeach
              
              <?php } ?>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
<div class="modal fade" tabindex="-1" role="dialog" id="completed_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Assign Service Complete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
       <form class="row" id="frm-upload" action="" method="POST" enctype="multipart/form-data" >
             {{ csrf_field() }}
          <div class="well"> <span>Photo Upload:</span>
            <input type="hidden" name="emp_id" id="emp_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="service_req" id="service_req" >
            <input type="hidden" name="status" id="status" >
            <input type="file" name="photo" id="photo" class="form-control" autofocus required/>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="update_task_btn" class="btn btn-primary">Save</button>
        </div>
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
<script>
	jQuery('.start').click( function (e) { 
   
		var event_id = $(this).attr("id");  
		var status= event_id.split("/");
		
		var emp_id = status[0];				
		var service_req = status[1];
		var status = status[2]; 
		 
		jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		e.preventDefault();   
		var path="{{url ('/')}}/admin/emp_updt_serviceStatus/"+emp_id+"/"+service_req+"/"+status;			
		             $.ajax({ 
                            url: "{{ route('emp_updt_serviceStatus')}}",
                            type:"POST",
                            data:{ 
                                emp_id:emp_id,
                                service_req:service_req,
                                status:status,
                                },
                            success:function(data){
                              console.log(data);
                               location.reload(true);
                               }

                            }) 
	}); 
	
	
	
</script>
<script>
 
  
 jQuery('.completed').on('click', function () { 
    
    var service_req = $(this).data('service_req-id');
    var status = $(this).data('status');
      $('#service_req').val(service_req);
      $('#status').val(status);
	   jQuery("#completed_model").modal('show');
   
});	

 $(document).on('click','#update_task_btn',function(e){
    e.preventDefault();
      
    // var data = $('#frm-user').serialize();
    var form=$('#frm-upload')[0];
    var data = new FormData(form);
          
           $.ajax({ 
                            url: "{{ route('emp_updt_serviceStatus')}}",
                            type:"POST",
                            data:data,
                            enctype: 'multipart/form-data',
                            async: false,
                            cache : false,
                            processData: false,
                            contentType: false,
                            success:function(data){
                              
                               location.reload(true);
                               }

                            })
        });

  
</script>
@endsection