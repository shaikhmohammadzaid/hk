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
                  <th>Add Balance</th>
                   
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
                <td>
                  <div id="{{$user->id}}" class="balance"  style="cursor:pointer;" onclick="bk1({{$user->id}},'{{$user->name}}', '{{$user->email}}')">Add Balance</div></td>
                 
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="6"><p>Record not found.</p></td>
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
 
 
<div class="modal fade" tabindex="-1" role="dialog" id="balance_user_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Balance user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Name:</span> 
            <input type="hidden" name="balance_user_id" id="balance_user_id">
            <input type="text" name="balance_user_name" id="balance_user_name" class="form-control" autofocus required/> 
            <input type="hidden" name="balance_user_email" id="balance_user_email" class="form-control" /> 
            <span>Balance:</span> 
            <input type="text" name="user_balance" id="user_balance" class="form-control" required maxlength="5"/>
             <b id="balance_error" style="color:#FF0000"></b>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="add_balance_user_btn" class="btn btn-primary">Add</button>
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
 
<script type="text/javascript" charset="utf-8"> 
   
   function bk1(id,name,email) 
  {   
      $("#balance_user_id").val(id);    
      $("#balance_user_name").val(name);
      $("#balance_user_email").val(email);  
      $('#balance_user_model').modal();  
  } 
 jQuery(document).ready(function(){

  
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#user_balance").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#balance_error").html("Enter a number only").show();
               return false;
    }
   });
});

 
jQuery('#add_balance_user_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
    e.preventDefault();    

    var user_id = jQuery('#balance_user_id').val();    
    var user_name = jQuery('#balance_user_name').val();
    var user_email = jQuery('#balance_user_email').val();
    var balance =  jQuery('#user_balance').val();
       jQuery.ajax({
                  url:"{{ url('/admin/cashoperator/add_balance_user') }}",
                  method: 'POST',  
                  data: {
                          user_id:user_id,
                          user_name:user_name,
                          user_email:user_email,
                          balance:balance,
                           
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