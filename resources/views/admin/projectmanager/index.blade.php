@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Project Manager Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Manager</li>
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
          <h4 class="card-title">Project Manager</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{ totalprojectmanager()}}</h1>
                  <h6 class="text-white">Total Project Manager</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{ totalprojectmanager_active()}}</h1>
                  <h6 class="text-white">Active Project Manager </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{ totalprojectmanager_inactive()}}</h1>
                  <h6 class="text-white">Inactive Project Manager</h6>
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
                  <th>Email</th>
                  <th>Location</th>
                  <th>Branch</th>
                  <th>Block</th>
                  <th>Employee</th>
                  <th>Status</th>
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
                <td>{{$admin->email}}</td>
                <td>{{$admin->location}}</td>
                <td>{{$admin->branch}}</td>
                <td>{{$admin->block}}</td>
                <td><span class='label label-info' id="view_emp" data-id="{{$admin->id}}">View</span></td>
                <td><div id="{{$admin->id}}/{{$admin->status}}" class="status" style="cursor:pointer;">
                    <?php if($admin->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                
                <td><div id="{{$admin->id}}" class="edit"  style="cursor:pointer;" onclick="pm_edit({{$admin->id}} , '{{$admin->name}}', '{{$admin->email}}','{{$admin->location_id}}','{{$admin->branch_id}}','{{$admin->block}}')">Edit</div>
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

<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="viewEmpModel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Employee List</h4>
        <button type="button" class="btn btn-circle btn-dark close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
            <div class="row">

                <div class="col-4 emp "></div>
                

            </div>     
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
           <input type="hidden" name="task_id" id="task_id" value="{{Auth::user()->id}}">
          
          <div class="well"> 
               <div class="form-group">
                    <label for="emp1" class="control-label col-form-label">Task</label>
                     <div class="input-group">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                            <select name="emp_id" id="emp_id"  class="form-control"  required >
                                <option value="" disabled selected>Select your option</option>
                                 
                               <option value="6">Completed</option>
                               <option value="2">Re-Allocate</option>
                                
                                
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

<!--Model edit project manager here-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_pm_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" id="#form" method="post" class="modeleditevent">
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
            
              <span>Location:</span>
              <label class="error edit_error_location" style="color: red;">Location  Is Required !!!</label>
                <select name="admin_location" id="admin_location"  class="location form-control " required >
                   <option value="" disabled selected>Select your Location</option>
                     @foreach($locations as  $location)
                        <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                     @endforeach
                  
                 </select>
              <p id="location_error" style="color:#FF0000"></p>
              <span>Branch :</span>
                <select name="admin_branch" id="admin_branch"  class=" branch form-control">
                     <option value="" disabled selected>Select your Branch</option>
                       @foreach($branches as  $branch)
                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                     @endforeach
                </select>
                <span>Block:</span>
                    <select name="admin_block" id="admin_block"  class="form-control">
                          <option value="" disabled selected>Select your option</option>
                          <option value="A">A</option>
                          <option value="B">B </option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                          <option value="H">H</option>
                          <option value="I">I</option>
                    </select>
    
     
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="edit_pm_btn" class="btn btn-primary">Save</button>
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
jQuery('.edit').on('click',function(){ pm_edit(id,name,email,location_id,branch_id,block); })
  
 function pm_edit(id,name,email,location_id,branch_id,block) 
{  
$("#admin_id").val(id);    
$("#admin_name").val(name); 
$("#admin_email").val(email); 
$("#admin_location").val(location_id);
$("#admin_branch").val(branch_id); 
$("#admin_block").val(block); 
$('#edit_pm_model').modal();  
}
 //  submit location that show branch.
    $(document).on('change',' .location ',function(e){
                    var location_id = $(this).val();
                    
                    var branch =$('.branch')
                    $(branch).empty();
                    $.get("{{ route('show_branch') }}",{location_id:location_id},function(data){

                        $.each(data,function(i,b){
                                $('.branch').append($("<option/>",{
                                    value : b.branch_id,
                                    text : b.branch_name
                                }))
                                
                        })   
                    })
          });



//delete project manager
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

  	   var path="{{url ('/')}}/admin/pm_delete/"+uid;	    
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
  <script type="text/javascript">
     //review Script

     $(document).on('click','.review',function(e){
        e.preventDefault();
      
      
        $("#reviewmodel").modal('show');

     });
      $(document).on('click','#view_emp',function(e){
        e.preventDefault();

        var pm_id =$(this).data('id');
        
         var emp =$('.emp')
                    $(emp).empty();
        $.get("{{ route('show_emp') }}",{pm_id:pm_id},function(data){

                        $.each(data,function(i,b){
                             $('.emp').append($("<h4/>",{text: b.name}));    
                        })   
                         $("#viewEmpModel").modal('show');
                    })
       

     });
     

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
		var path="{{url ('/')}}/admin/pm_status_inactive/"+uid+"/"+status;	
		   $.ajax({
					  url:path,
					  method: 'GET',                  
							success: function(response1){        
							console.log(response1);
							location.reload(true); 
					   }   
	
			  });   
	}); 
	 	

  jQuery('#edit_pm_btn').on('click', function (e) {
  
        jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
        e.preventDefault();    

          if ($('#name').val() != '' && $('#email').val() != '' ) 
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
          var location = jQuery('#admin_location').val();
         var branch = jQuery('#admin_branch').val();
         var block = jQuery('#admin_block').val();
        
          jQuery.ajax({
           url:"{{ url('/admin/pm_edit') }}",
           method: 'POST',  
           data: {
              id:id,
              name:name,
              email:email,
              password:password,
               location:location,
               branch:branch, 
                block:block,
          },
          success: function(data){           
          console.log(data);
           var error = data['error']; 
           if(error == "success") 
            {
                window.location.href = "{{ url('/admin/projectmanager-listing') }}";
             // location.reload(true); 
          } else if  (error == email+" already exits") { $("#edit_email_error").html(error);  }
           
           
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