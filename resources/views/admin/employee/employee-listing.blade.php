@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Employee Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee</li>
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
          <h4 class="card-title">Employees</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{totalemployee()}}</h1>
                  <h6 class="text-white">Total Employee</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{totalemployee_active()}}</h1>
                  <h6 class="text-white">Active Employee </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{totalemployee_inactive()}}</h1>
                  <h6 class="text-white">Inactive Employee</h6>
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
                  <th>Employee Name</th>
                  <th>Email</th>
                  <th>PM</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($list); if ($cnt>0) {?>
              @foreach($list as $key => $list)
              <tr>
                <td>{{$list->id }}</span></td>
                <td>{{$list->name}}</td>
                <td>{{$list->email}}</td>
                <td> @if($list->pm_id != NULL)
                  {{ getpm_name($list->pm_id)}}
                  @endif </td>
                <td><div id="{{$list->id}}/{{$list->status}}" class="status" style="cursor:pointer;">
                    <?php if($list->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                <td>{{$list->created_at}}</td>
                <td width="10%"><div id="{{$list->id}}" class="edit"  style="cursor:pointer;" onclick="emp_edit({{$list->id}}, '{{$list->name}}', '{{$list->email}}', '{{$list->pm_id}}')">Edit</div></td>
                <td width="10%"><div id="{{$list->id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="7"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody>
              
            </table>
            <div align="center"> {{-- $list->links() --}} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_employee_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" id="edit" method="post" class="modeladdevent">
          <div class="well"> <span>Name:</span>
            <input type="hidden" name="emp_id" id="emp_id" class="form-control"   />
            <input type="text" name="emp_name" id="emp_name" class="form-control" autofocus required/>
            <span>Email:</span>
            <input type="email" name="emp_email" id="emp_email" class="form-control"  required/>
            <p id="edit_email_error" style="color:#FF0000"></p>
            </br>
            <span>Password:</span>
            <input type="emp_password" name="emp_password" id="password" class="form-control"  required/>
            <span>Project Manager :</span>
            <select name="pm_id" id="pm_id"  class="form-control">
              <option value="" disabled selected>Select your option</option>
			  @foreach($pms as  $pm)                      
              <option value="{{$pm->id}}">{{$pm->name}}</option>
              @endforeach 
            </select>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="edit_emp_btn" class="btn btn-primary">Save</button>
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
<script type="text/javascript"> 
  function emp_edit(mid,name,email,pm_id) 
  {  
    $("#emp_id").val(mid);    
    $("#emp_name").val(name); 
    $("#emp_email").val(email);
     $("#pm_id").val(pm_id);          
    $('#edit_employee_model').modal();  
  }
 jQuery(document).ready(function(){

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
     var id = $(this).attr("id");  
       var path="{{url ('/')}}/admin/employee_delete/"+id;     
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
  });
 
 
   
  jQuery('.edit').on('click',function(){ 
        emp_edit(mid,name,email,pm_id);
  })

  jQuery('#edit_emp_btn').on('click', function (e) {
   
    e.preventDefault(); 
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
   
    var id = jQuery('#emp_id').val();    
    var name = jQuery('#emp_name').val();
    var email = jQuery('#emp_email').val();
    var password = jQuery('#emp_password').val(); 
     var pm_id = jQuery('#pm_id').val();
   
    jQuery.ajax({
                   url:"{{ url('/admin/emp_edit') }}",
                   method: 'POST',  
                   data: {
                      id:id,
                      name:name,
                      email:email,
                       pm_id:pm_id,
                      password:password,          
                    },
                    success: function(data){  
                      console.log(data);
                     
                      var error = data['error']; 
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == email+" already exits") 
                      {
                       $("#edit_email_error").html(error); 
                     }

                    }
    });   

  });
  
  

  jQuery('.status').click( function (e) { 
       
      var event_id = $(this).attr("id");  
      var status= event_id.split("/");
      var uid = status[0];
      var status = status[1]; 
      jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      e.preventDefault();   
      var path="{{url ('/')}}/admin/employee_status_inactive/"+uid+"/"+status;  
           $.ajax({
                      url:path,
                      method: 'GET',                  
                            success: function(response1){        
                            console.log(response1);
                            location.reload(true); 
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