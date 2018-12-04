@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Service Request</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Service Request</li>
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
                                                            <input type="text" class="form-control" name="start" id="start" required />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text bg-info b-0 text-white">TO</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="end" id="end" required />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group col-md-3">
                                                        <label for="pwd">All Service</label>
                                                        <select name="service_id" id="service_id" class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option>               
                                                            @foreach($tasks as  $task)
                                                            <option value="{{$task->tasklist_id}}">{{$task->task_name}}</option> @endforeach                 
                                                          </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="msg">Status</label>
                                                         <select name="status" id="status"  class="form-control" required >
                                                            <option value="" disabled selected>Select your option</option> 
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

  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- basic table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <h4 class="card-title">All Services</h4>
          <div class="col-md-12" id="InfoTable">
           @if (session('success_msg'))
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ session('success_msg') }}
            </div>
            @endif

             @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif
           
        </div>
        
         <div class="table-responsive"  id="InfoTable">
        <!-- Table diaplay with jquery append Data -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection 

@section('script')
 <script type="text/javascript"> 
   showDetails();

 
$(document).on('click','.btn-refresh',function(e){
 e.preventDefault(); 
 window.location.href = "{{ url('/admin/service_Request') }}";
});

  function showDetails(){
      var data = $('#frm-c').serialize();
        $.get("{{ route('showServiceRequest') }}",data,function(data){
          $('#InfoTable').empty().append(data);
      });
  }

   $(document).on('submit','#frm-search',function(e){
    e.preventDefault();
    
      var service_id =$('#service_id').val();
      var status =$('#status').val();
    var start =$('#start').val();
      var end =$('#end').val();
     $.get("{{ route('searchServiceRequest') }}",{service_id:service_id,status:status,start:start,end:end},function(data){
      
        console.log(data);
          $('#InfoTable').empty().append(data);
    })
      
  });

    // Pagination on role details.
  $(document).on("click",".pagination li a",function(e){
    e.preventDefault(); 
    var data = $('#frm-c').serialize();
    var url = $(this).attr("href");
    $.get(url,data,function(data){
         
        $('#InfoTable').empty().append(data);
    });
  });


    </script>
@endsection