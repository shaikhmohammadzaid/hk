@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Messages Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="add_message" class="btn btn-primary pull-right">Create New Messages</button>
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
          <h4 class="card-title">Messages</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
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
                  <th>Id</th>
                  <th>Title</th>
                  <th>Message</th>
                  <th>Category</th>
                  <th>Created</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($messages); if ($cnt>0) {?>
              @foreach($messages as $key =>  $message)
              <tr> 
                <td>{{$message->message_id}}</span></td>
                <td>{{substr($message->title,0,20)}}</td>
                <td><div id="{{$message->message_id}}" class="viewmessage" style="cursor:pointer;" onclick="bk({{$message->message_id}} , '{{$message->title}}', '{{$message->message}}','{{$message->category}}')">
				{{substr($message->message,0,20)}}...More</div></td>
                <td>{{$message->category}}</td>
                <td>{{$message->created_at}}</td>
                <td><div id="{{$message->message_id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="6"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody> 
            </table>
            <div align="center"> {{ $messages->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Model starts here-->
<div class="modal fade" tabindex="-1" role="dialog" id="view_model_messages">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Messages</h4>
        <button type="button" class="view-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form class="modelviewevent">
          <div class="well"> <span>Title:</span>            
            <input type="text" name="view_title" id="view_title" class="form-control" readonly="readonly"/>
            <span>Message:</span>                                     
            <textarea name="view_message" id="view_message" class="form-control" readonly="readonly"></textarea>
            <span>Category:</span>
            <input type="text" name="view_category" id="view_category" class="form-control" readonly="readonly"/>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="add_model_messages">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add New messages</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Title:</span>
            <label class="error error_title" style="color: red;">Title Is Required !!!</label>
            <input type="text" name="title" id="title" class="form-control" autofocus required/>
            <span>Message:</span>
            <label class="error error_message" style="color: red;">Message Is Required !!!</label>
            <textarea name="message" id="message" class="form-control"  required></textarea>            
            <p id="message_error" style="color:#FF0000"></p>            
            <span>Category:</span>
            <select name="category" id="category"  class="form-control">
			  <option value="all" selected="selected">All</option>            
              <option value="admin">Admin</option>
              <option value="subadmin">Sub Admin</option>
              <option value="projectmanager">Project Mmanager</option>
              <option value="cashcollector">CashCollector</option>
              <option value="employee">Employee</option>
            </select>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="add_message_btn" class="btn btn-primary">Save</button>
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
		 "pageLength": 15,	
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
		 
    	}); 
    });
</script>
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
	   var mid = $(this).attr("id");  
  	   var path="{{url ('/')}}/admin/delete_message/"+mid;	    
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
    $('.error').hide();     
    $('.btn-close').click(function(){ $('.modeladdevent').trigger('reset'); })
	$('.view-close').click(function(){ $('.modelviewevent').trigger('reset'); })
    $('#title').keyup(function(e) {
      e.preventDefault();
      if ($('#title').val()=='') { $('.error_title').show(); } else{ $('.error_title').hide(); }
    });

    $('#message').keyup(function(e)  {
      e.preventDefault();
      if ($('#message').val()=='') { $('.error_message').show(); } else{  $('.error_message').hide(); }
    });
	  
   //viewmessage' 
     jQuery('.viewmessage').on('click',function(){	 bk(id,title,message,job_title); })
	
   function bk(id,title,message,category) 
   {    	  
	$("#view_title").val(title); 
	$("#view_message").val(message); 
	$("#view_category").val(category);        
	$('#view_model_messages').modal();	 
   }
 
    //add is below 
    jQuery('#add_message').on('click', function () {
	jQuery("#add_model_messages").modal();   
	});	
	jQuery('#add_message_btn').on('click', function (e) {
	
	  jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
	  e.preventDefault();    
		
	  if (jQuery('#title').val() != '' && jQuery('#message').val()) 
	  {
		var title = jQuery('#title').val();
		var message = jQuery('#message').val();
	  }
	  else
	  {		
	  if(jQuery('#title').val() == ''){$(".error_title").show();}else { $("#title").keyup();}
	  if(jQuery('#message').val() == ''){$(".error_message").show();}else{$("#email").keyup(); }			  
		
	  }	   
		var title = jQuery('#title').val();
		var message = jQuery('#message').val();
		var category = jQuery('#category').val();
	   jQuery.ajax({
		   url:"{{ url('/admin/add_message') }}",
		   method: 'POST',  
		   data: {
				title:title,
				message:message,							 
				category:category,          
		  },
		   success: function(data){				   
		  console.log(data);
		   var error = data['error'];	
		   if(error == "success") {location.reload(true);
		  }  
		   
		  }
		   
		  });   
	});
   
</script>
@endsection