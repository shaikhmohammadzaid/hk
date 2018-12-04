@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Project Manager Leave Application</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Leave Application</li>
          </ol>
        </nav>
      </div>
    </div>
   
  </div>
</div>
 

<div class="container-fluid">
    @if(Session()->has('success'))
     <div class="alert alert-success alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
       <strong> {{Session::get('success') }}</strong> </div>
     @elseif(Session()->has('failure'))
     <div class="alert alert-danger alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
       <strong>{{Session::get('failure') }}</strong> </div>
     @endif
   <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Leave Application</h4>
                                
                            </div>
                            <hr>
                            <form class="form-horizontal" id="frm-lm" method="post" >
                               {{ csrf_field() }}
                              <input type="hidden" class="form-control " name="pm_id" value="{{Auth::user()->id}}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ename" class="col-sm-3 text-right control-label col-form-label">Apply For Leave*</label>
                                        <div class="col-sm-6">
                                            <select name="leave_id" id="leave_id"  class="form-control" required >
                                               <option value="" disabled selected>Select your Leave option</option>                  
                                              @foreach($leaves as  $leave)
                                              <option value="{{$leave->leave_id}}">{{$leave->leave_type}}</option>                  
                                              @endforeach                 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 text-right control-label col-form-label">From Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="mdate form-control " name="from_date" id="from_date" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 text-right control-label col-form-label">To Date</label>
                                        <div class="col-sm-6">
                                           <input type="text" class="mdate form-control " name="to_date" id="to_date" required="">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="note1" class="col-sm-3 text-right control-label col-form-label">Discription</label>
                                        <div class="col-sm-6">
                                           <textarea class="form-control" name="discription" id="exampleTextarea" rows="3"></textarea>
                                        </div>
                                    </div>
                                     <hr>
                                     <div class="form-group m-b-0 text-center">
                                        <button type="submit" class="col-sm-2 btn btn-info waves-effect waves-light">Save</button>
                                        <button type="button" class="col-sm-2 btn btn-dark waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                               
                                <div class="card-body">
                                   
                                </div>
                              
                            </form>
                        </div>
                    </div>
                </div>

</div>



@endsection 

@section('script')
 <script type="text/javascript"> 

 $(document).on('submit','#frm-lm',function(e){
   e.preventDefault();
     var data = $(this).serialize();

      jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("{{ route('AddPmLeave') }}",data,function(data){
                
               var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
             
      });

 });

 </script>
@endsection