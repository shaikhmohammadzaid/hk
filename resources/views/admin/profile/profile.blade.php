@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">profile</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> profile </li>
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

                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{ asset('public/admin/assets/images/users/5.jpg') }}" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{$profile[0]->name}}</h4>
                                    <h6 class="card-subtitle">{{$profile[0]->job_title}}</h6>
                                  
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                
                                <li class="nav-item">
                                    <a class="nav-link"  role="tab" aria-controls="pills-setting" aria-selected="false">Profile</a>
                                </li>
                            </ul>
                            <!-- Tabs -->
                            
                                
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                   <input type="hidden" name="id" id="id" value="{{$profile[0]->id}}">
                                                    <input type="text" name="name" id="name" placeholder="{{$profile[0]->name}}" class="form-control form-control-line" value="{{$profile[0]->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="{{$profile[0]->email}}" class="form-control form-control-line" name="email" id="email" value="{{$profile[0]->email}}">
                                                     <p id="email_error" style="color:#FF0000"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="password" id="password"  class="form-control form-control-line" placeholder="Change Password">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" id="update_btn">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                               
                            
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
</div>


@endsection 
@section('script')
<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>


<script type="text/javascript" charset="utf-8"> 
   

	 
	jQuery('#update_btn').on('click', function (e) {
	
	jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
	e.preventDefault();    

  	
	var id = jQuery('#id').val();    
	var name = jQuery('#name').val();
	var email = jQuery('#email').val();
	var password = jQuery('#password').val(); 
    jQuery.ajax({
	   url:"{{ route('edit_profile') }}",
	   method: 'POST',  
	   data: {
				id:id,
				name:name,
				email:email,
				password:password,
				         
	  },
	  success: function(data){				   
	  console.log(data);
	   var error = data['error'];	
	      if(error == "success") 
          {
              location.reload(true); 
	       } else if  (error == email+" already exits") { $("#email_error").html(error);	}
	   
	   
	  }

});   
	});
	 
 
</script>
<!-- This is data table -->
<script src="{{ asset('public/admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.print.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	}); 
    });
   
    </script>
@endsection