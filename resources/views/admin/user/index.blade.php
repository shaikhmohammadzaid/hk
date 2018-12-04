@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">User Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="add_user" class="btn btn-primary pull-right">Add User</button>
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
          <h4 class="card-title">Users</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{totaluser()}}</h1>
                  <h6 class="text-white">Total Users</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{totaluser_active()}}</h1>
                  <h6 class="text-white">Active Users </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{totaluser_inactive()}}</h1>
                  <h6 class="text-white">Inactive Users</h6>
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
                  <th>Balance</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($users); if ($cnt>0) {?>
              @foreach($users as  $user)
              <tr>
                <td>{{$user->id}}</span></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->balance}}</td>
                <td><div id="{{$user->id}}/{{$user->status}}" class="status" style="cursor:pointer;">
                    <?php if($user->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                
                <td><div id="{{$user->id}}" class="edit"  style="cursor:pointer;" onclick="bk({{$user->id}},'{{$user->name}}','{{$user->email}}',{{$user->location_id}},{{$user->branch_id}},'{{$user->block}}',{{$user->floor_no}},{{$user->shop_no}})"> Edit</div>
                <td><div id="{{$user->id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="7"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody> 
            </table>
            <div align="center"> {{ $users->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_user_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action=""  id="frm-add_user" method="post" class="modeladdevent">
          <div class="well"> <span>Name* :</span>
            <label class="error error_name" style="color: red;">Name Is Required !!!</label>
            <input type="text" name="name" id="name" class="form-control" autofocus required/>
            <span>Email* :</span>
            <label class="error error_email" style="color: red;">Email Is Required !!!</label>
            <input type="email" name="email" id="email" class="form-control"  required/>
            <p id="email_error" style="color:#FF0000"></p>
            <span>Password* :</span>
            <label class="error error_password" style="color: red;">Password Is Required !!!</label>
            <input type="password" name="password" id="password" class="form-control"  required/>
             <span>mobile* :</span>
            <input type="text" name="mobile" id="mobile" class="form-control" autofocus required/>
             <span>Alternate Mobile:</span>
            <input type="text" name="alternate_mobile" id="alternate_mobile" class="form-control" autofocus />
             <span>Address* :</span>
            <input type="text" name="address" id="address" class="form-control" autofocus required/>
             <div class="pm">
              <span>Location* :</span>
              <label class="error error_location" style="color: red;">Location  Is Required !!!</label>
               <select name="location_id" id="location_id"  class="form-control location" required >
                   <option value="" >Select your Location</option>
                     @foreach($locations as  $location)
                        <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                     @endforeach

                 </select>
              <p id="location_error" style="color:#FF0000"></p>
              <span>Branch* :</span>
                <select name="branch_id" id="branch_id"  class="branch form-control">
                <option value="" disabled selected>Select your Branch</option>
                </select>

                 <span>Block* :</span>
                    <select name="block" id="block"  class="form-control">
                          <option value="" >Select your option</option>
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
               <span>Shop No:</span>
               <input type="text" name="shop_no" id="shop_no" class="form-control" autofocus required/>

                <span>Floor No:</span>
               <input type="text" name="floor_no" id="floor_no" class="form-control" autofocus required/>
            </div>

          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="add_user_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="edit_user_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post"  class="modeladdevent">
          <div class="well"> <span>Name:</span>
            <label class="error error_name" style="color: red;">Name Is Required !!!</label>
            <input type="hidden" name="user_id" id="user_id">
            <input type="text" name="user_name" id="user_name" class="form-control" autofocus required/>
            <span>Email:</span>
            <label class="error error_email" style="color: red;">Email Is Required !!!</label>
            <input type="email" name="user_email" id="user_email" class="form-control"  required/>
            <p id="email_error" style="color:#FF0000"></p>
            <span>Password:</span>
            <label class="error error_password" style="color: red;">Password Is Required !!!</label>
            <input type="password" name="user_password" id="user_password" class="form-control"  required/>
             <div class="pm">
              <span>Location:</span>
              <label class="error error_location" style="color: red;">Location  Is Required !!!</label>
               <select name="location" id="user_location"  class="form-control location" required >
                   <option value="" disabled selected>Select your Location</option>
                     @foreach($locations as  $location)
                        <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                     @endforeach

                 </select>
              <p id="location_error" style="color:#FF0000"></p>
              <span>Branch :</span>
                <select name="branch" id="user_branch"  class="branch form-control">
                <option value="" disabled selected>Select your Branch</option>
                     @foreach($branches as  $branch)
                        <option value="{{$branch->branch_id}}">{{$branch->branch_name}}</option>
                     @endforeach
                </select>

                 <span>Block:</span>
                    <select name="block" id="user_block"  class="form-control">
                          <option value="" disabled selected>Select your option</option>
                           <option value="A">A</option>
                                      <option value="B">B </option>
                                      <option value="c">C</option>
                                      <option value="D">D</option>
                                      <option value="E">E</option>
                                      <option value="F">F</option>
                                      <option value="G">G</option>
                                      <option value="H">H</option>
                                      <option value="I">I</option>
                    </select>
                     <span>Shop No:</span>
               <input type="text" name="shop_no" id="user_shop_no" class="form-control" autofocus required/>

                <span>Floor No:</span>
               <input type="text" name="floor_no" id="user_floor_no" class="form-control" autofocus required/>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="update_user_btn" class="btn btn-primary">Update</button>
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
  	   var path="{{url ('/')}}/admin/user_delete/"+uid;	    
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
</script>
<script type="text/javascript" charset="utf-8"> 
   function bk(id,name,email,location,branch,block,floor_no,shop_no) 
  {   
      $("#user_id").val(id);    
      $("#user_name").val(name);
      $("#user_email").val(email);
      $('#user_location').val(location);
      $('#user_branch').val(branch),
      $('#user_block').val(block);
      $('#user_floor_no').val(floor_no);
      $('#user_shop_no').val(shop_no);

      $('#edit_user_model').modal();  
  } 
   function bk1(id,name,email) 
  {   
      $("#balance_user_id").val(id);    
      $("#balance_user_name").val(name);
      $("#balance_user_email").val(email);  
      $('#balance_user_model').modal();  
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


 jQuery(document).ready(function(){
 $('.error').hide();
     
     $('.btn-close').click(function(){
        $('.modeladdevent').trigger('reset');
     })

    $('#name').keyup(function(e) 
     {
      e.preventDefault();
      if ($('#name').val()=='') 
      {
        $('.error_name').show();
      }
      else{
        $('.error_name').hide();
      }

    });

    $('#email').keyup(function(e) 
    {
      e.preventDefault();
      if ($('#email').val()=='') 
      {
        $('.error_email').show();
      }
      else{
        $('.error_email').hide();
      }

    });


    $('#password').keyup(function(e) 
    {
      e.preventDefault();
      if ($('#password').val()=='') 
      {
        $('.error_password').show();
      }
      else{
        $('.error_password').hide();
      }

    });

 jQuery('#add_user').on('click', function () {jQuery("#add_user_model").modal();});

 jQuery('.status').click( function (e) {     
       var event_id = $(this).attr("id");  
    	var status= event_id.split("/");
    	var uid = status[0];
    	var status = status[1]; 
    	jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
    	e.preventDefault();   
    	var path="{{url ('/')}}/admin/user_status_inactive/"+uid+"/"+status;	
           $.ajax({
                      url:path,
                      method: 'GET',                  
                            success: function(response1){        
                            console.log(response1);
                            location.reload(true); 
                       }   

              });   
    }); 

 jQuery('#add_user_btn').on('click', function (e) {
   
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
        
          var data = $('#frm-add_user').serialize();
          alert(data);
               jQuery.ajax({
                   url:"{{ url('/admin/add_user') }}",
                   method: 'POST',  
                   data: data,
                  success: function(data){				   
                  console.log(data);
				  var error = data['error'];	
				   if(error == "success") {location.reload(true);
				  } else if  (error == email+" already exits") { $("#email_error").html(error);	}
                   
                  }
           
          });   
   });

 jQuery('.edit').on('click',function(){ bk(id,name,email,location,branch,block,floor_no,shop_no); })
  
jQuery('#update_user_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
    e.preventDefault();    

    var user_id = jQuery('#user_id').val();    
    var user_name = jQuery('#user_name').val();
    var user_email = jQuery('#user_email').val();
    var user_password = jQuery('#user_password').val();
    var user_location = jQuery('#user_location').val();
    var user_branch = jQuery('#user_branch').val();
    var user_block = jQuery('#user_block').val();
    var user_floor_no = jQuery('#user_floor_no').val();
    var user_shop_no = jQuery('#user_shop_no').val();

    jQuery.ajax({
                  url:"{{ url('/admin/update_user') }}",
                  method: 'POST',  
                  data: {
                          user_id:user_id,
                          user_name:user_name,
                          user_email:user_email,
                          user_password:user_password,
                          user_location:user_location,
                          user_branch:user_branch,
                          user_block:user_block,
                          user_floor_no:user_floor_no,
                          user_shop_no:user_shop_no, 
                        },
                        success: function(data){           
                            console.log(data);
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