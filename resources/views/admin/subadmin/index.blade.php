@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Sub Admin Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sub Admins</li>
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
          <h4 class="card-title">Sub Admins</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{ totalsubadmin()}}</h1>
                  <h6 class="text-white">Total SubAdmin</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{ totalsubadmin_active()}}</h1>
                  <h6 class="text-white">Active SubAdmin </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{ totalsubadmin_inactive()}}</h1>
                  <h6 class="text-white">Inactive SubAdmin</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
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
                  <th>User</th>
                  <th>Designation</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($admins); if ($cnt>0) {?>
              @foreach($admins as  $admin)
              <tr>
                <td>{{$admin->id}}</span></td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->job_title}}</td>
                <td>{{$admin->email}}</td>
                <td><div id="{{$admin->id}}/{{$admin->status}}" class="status" style="cursor:pointer;">
                    <?php if($admin->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                <td>{{$admin->created_at}}</td>
                <td><div id="{{$admin->id}}" class="edit"  style="cursor:pointer;" onclick="bk({{$admin->id}} , '{{$admin->name}}', '{{$admin->email}}','{{$admin->password}}','{{$admin->job_title}}')">Edit</div>
                <td><div id="{{$admin->id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
            <div align="center"> {{ $admins->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit_admin_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeleditevent">
          <div class="well"> <span>Name:</span>
            <input type="hidden"  name"admin_id" id="admin_id" />
            <input type="text" name="admin_name" id="admin_name" class="form-control" autofocus required/>
            <label class="error edit_error_name" style="color: red;">Name Is Required !!!</label>
            </br>
            <span>Email:</span>
            <input type="email" name="admin_email" id="admin_email" class="form-control"  required/>
            <label class="error edit_error_email" style="color: red;">Email Is Required !!!</label>
            <p id="edit_email_error" style="color:#FF0000"></p>
            </br>
            <span>Password:</span>
            <input type="password" name="admin_password" id="admin_password" class="form-control"  required/>
            <label class="error edit_error_password" style="color: red;">Password Is Required !!!</label>
            <p id="edit_error_password" style="color:#FF0000"></p>
            </br>
           
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="edit_admin_btn" class="btn btn-primary">Save</button>
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
<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>
<script> 
  $('.delete').click(function() {   
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this record!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  })
	.then((willDelete) => {
	 if (willDelete) {
	   var uid = $(this).attr("id");  
  	   var path="{{url ('/')}}/subadmin/subadmin_delete/"+uid;	    
       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  }); 
	   jQuery.ajax({
                      url:path,
                      method: 'GET',                  
                            success: function(response){
                            console.log(response);
                            location.reload(true); 
                       }   
              });
		 } else {
		swal("Your record is safe!");
	  	}	  
	});
	
  });  </script>
<script>
  jQuery('.edit').on('click',function(){	 bk(mid,name,email,password,job_title); })
	
 function bk(mid,name,email,password,job_title) 
{  
$("#admin_id").val(mid);	  
$("#admin_name").val(name); 
$("#admin_email").val(email); 
$("#admin_job_title").val(job_title);        
$('#edit_admin_model').modal();	 
}
  </script>

<script type="text/javascript" charset="utf-8"> 
    jQuery(document).ready(function(){
    $('.error').hide();
     
     $('.btn-close').click(function(){ $('.modeladdevent').trigger('reset'); })

    $('#name').keyup(function(e) {
      e.preventDefault();
      if ($('#name').val()=='')  { $('.error_name').show(); } else{ $('.error_name').hide(); }
    });

    $('#email').keyup(function(e)  {
      e.preventDefault();
      if ($('#email').val()=='') { $('.error_email').show(); } else{  $('.error_email').hide(); }
    });

    $('#password').keyup(function(e) {
      e.preventDefault();
      if ($('#password').val()=='') { $('.error_password').show(); } else{ $('.error_password').hide(); }
    });
	
	//error form validation
	$('#admin_name').keyup(function(e) {
      e.preventDefault();
      if ($('#admin_name').val()=='') { $('.edit_error_name').show(); } else{  $('.edit_error_name').hide(); }
    });

    $('#admin_email').keyup(function(e) {
      e.preventDefault();
      if ($('#admin_email').val()=='') { $('.edit_error_email').show(); } else{ $('.edit_error_email').hide(); }
    });

   

	jQuery('.status').click( function (e) {     
		var event_id = $(this).attr("id");  
		var status= event_id.split("/");
		var uid = status[0];
		var status = status[1]; 
		jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
		e.preventDefault();   
		var path="{{url ('/')}}/admin/subadmin_status_inactive/"+uid+"/"+status;	
		   $.ajax({
					  url:path,
					  method: 'GET',                  
							success: function(response1){        
							console.log(response1);
							location.reload(true); 
					   }   
	
			  });   
	}); 
	jQuery('#add_admin').on('click', function () {
	jQuery("#add_admin_model").modal();   
	});	
	jQuery('#add_admin_btn').on('click', function (e) {
	
	  jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
		  e.preventDefault();    
		
          if (jQuery('#name').val() != '' && jQuery('#email').val() != '' && jQuery('#password').val() != '') 
          {
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var password = jQuery('#password').val();
          }
          else
          {
            
             if(jQuery('#name').val() == '')
                  {
                    $(".error_name").show();
                  }
                  else
                  {
                     $("#name").keyup();
                  }
                   if(jQuery('#email').val() == '')
                  {
                    $(".error_email").show();
                  }
                  else
                  {
                     $("#email").keyup();
                  }
                   if(jQuery('#password').val() == '')
                  {
                    $(".error_password").show();
                  }
                  else
                  {
                     $("#password").keyup();
                  }
            
          }	   
		var name = jQuery('#name').val();
		var email = jQuery('#email').val();
		var password = jQuery('#password').val(); 
		var job_title = jQuery('#job_title').val();
			   jQuery.ajax({
				   url:"{{ url('/admin/subadmin_add') }}",
				   method: 'POST',  
				   data: {
							name:name,
							email:email,
							password:password,
							job_title:job_title,          
				  },
				  success: function(data){				   
				  console.log(data);
				   var error = data['error'];	
				   if(error == "success") {location.reload(true);
				  } else if  (error == email+" already exits") { $("#email_error").html(error);	}
				   
				   
				  }
		   
		  });   
	});	
	jQuery('.edit').click(function(){
	   
	     bk(id,name,email,job_title,status);
    	//jQuery('#edit_admin_model').modal();
     })	 
	jQuery('#edit_admin_btn').on('click', function (e) {
	
	jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
	e.preventDefault();    

  	if ($('#admin_name').val() != '' && $('#admin_email').val() != '' ) 
   {            
		var name = $('#admin_name').val();
		var email = $('#admin_email').val();
		var password = $('#admin_password').val();
   } else {            
		if(jQuery('#admin_name').val() == '') { $(".edit_error_name").show();
		}  else { $("#admin_name").keyup(); }
		
		if(jQuery('#admin_email').val() == '') { $(".edit_error_email").show();
		}  else { $("#admin_email").keyup(); }
		
		//if(jQuery('#admin_password').val() == '') { $(".edit_error_password").show();
		//}  else { $("#admin_password").keyup(); }
	
  }	 
	var id = jQuery('#admin_id').val();    
	var name = jQuery('#admin_name').val();
	var email = jQuery('#admin_email').val();
	var password = jQuery('#admin_password').val(); 

    jQuery.ajax({
	   url:"{{ url('/admin/subadmin_edit') }}",
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
	   if(error == "success") {location.reload(true);
	  } else if  (error == email+" already exits") { $("#edit_email_error").html(error);	}
	   
	   
	  }

});   
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