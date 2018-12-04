@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Inbox Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inbox</li>
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
          <h4 class="card-title">Inbox Messages</h4>
           
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
                  <th>#</th>
                  <th>User</th>
                  <th>Email</th>
                  <th>Message</th>                  
                  <th>Created</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($inbox_messages); if ($cnt>0) {?>
              @foreach($inbox_messages as  $key => $inbox_message)
              <tr>
                <td>{{$key+1}}</span></td>
                <td>{{$inbox_message->title}}</td>
                <td>{{$inbox_message->message}}</td>                 
                <td><div id="{{$inbox_message->message_id}}" class="viewmessage" style="cursor:pointer;" onclick="bk('{{$inbox_message->message_id}}','{{$inbox_message->title}}', '{{$inbox_message->message}}','{{$inbox_message->message_read}}')">{{substr($inbox_message->message,0,20)}}<b style="color: red;">...More</b></div></td>
                <td>{{$inbox_message->created_at}}</td>
                <td><div id="{{$inbox_message->message_id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="6"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
            <div align="center">  </div>
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
        <h4 class="modal-title" id="modal_title">Inbox</h4>
        <button type="button" class="view-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form class="modelviewevent">
          <div class="well"> <span>Title:</span> 
          <input type="text" name="view_title" id="view_title" class="form-control" readonly="readonly"/>
            <span>Message:</span>                                     
            <textarea name="view_message" id="view_message" class="form-control" readonly="readonly"></textarea> 
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

<!--Model ends here-->
@endsection 
@section('script')

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
<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>
<script> $('.delete').click(function() {   
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
  	  var path="{{url ('/')}}/admin/delete_inboxmessage/"+mid;		    
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
//viewmessage' 
     jQuery('.viewmessage').on('click',function(){	 bk(id,fullname,email,message,message_read); })
	
   function bk(id,title,message,message_read) 
   {   
	$("#view_title").val(title);        
	$("#view_message").val(message); 
	$('#view_model_messages').modal(); 
	 
	if(message_read==0) {	 
	   var cid = id;
	   var path="{{url ('/')}}/admin/message_read/"+cid;		    
       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  }); 
	   jQuery.ajax({
                      url:path,
                      method: 'GET',                  
                            success: function(response){
                            console.log(response);
                            //location.reload(true); 
                       }   
              });
	 }		
   }  
</script>
    
@endsection