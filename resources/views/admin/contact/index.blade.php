@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Contact Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
          <h4 class="card-title">Contacts</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{totalcontact()}}</h1>
                  <h6 class="text-white">Total Contacts</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{totalcontact_read()}}</h1>
                  <h6 class="text-white">Total Read Message</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{totalcontact_unread()}}</h1>
                  <h6 class="text-white">Total Unread Message</h6>
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
                  <th>#</th>
                  <th>User</th>
                  <th>Email</th>
                  <th>Shop No</th>
                  <th>Message</th>                  
                  <th>Created</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($contacts);  if ($cnt>0) {?>
              @foreach($contacts as  $key => $contact)
              <tr>
                
                <td>{{$key+1}}</span></td>
                <td>{{$contact->user_fullname}}</td>
                <td>{{$contact->user_email}}</td> 
                <td>{{$contact->shop_no}}</td>
                              
                <td>
                	<div id="{{$contact->contact_id}}"  style="cursor:pointer;" >

                 <p id="viewmessage" data-id="{{$contact->contact_id}}" >

                  {{substr($contact->user_message,0,20)}}...
                  <b  style="color: red;">More</b>

                </p>
                  </div></td>
                <td>{{$contact->created_at}}</td>
                <td><div id="{{$contact->contact_id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="6"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody>
             
               
            </table>
            <div align="center"> {{ $contacts->links() }} </div>
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
        <h4 class="modal-title" id="modal_title">Contacts</h4>
        <button type="button" class="view-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form class="modelviewevent">
          <div class="well"> <span>Title:</span> 
          	 <input type="hidden" name="view_id" id="view_id" class="form-control" readonly="readonly"/>
          <input type="text" name="view_fullname" id="view_fullname" class="form-control" readonly="readonly"/>
            <span>Message:</span>                                     
            <textarea name="view_message" id="view_message" class="form-control" readonly="readonly" rows="10" cols="10" ></textarea>
            <span>Email:</span>
            <input type="email" name="view_email" id="view_email" class="form-control" readonly="readonly"/>
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
	  var cid = $(this).attr("id"); 
  	  var path="{{url ('/')}}/admin/contact_delete/"+cid;		    
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

 $(document).on('click','#viewmessage',function(e){
    e.preventDefault();
     var id=$(this).data('id');
     $.get("{{ route('view_contact') }}",{id:id},function(data){


           console.log(data[0].msg_read);


        

        $(' #view_id').val(data[0].contact_id);
        $(' #view_fullname').val(data[0].user_fullname);
        $(' #view_email').val(data[0].user_email);
        $(' #view_message').val(data[0].user_message);
       $('#view_model_messages').modal();
        

         var msg= data[0].msg_read;
        
         if(msg==0) {  
           var cid = data[0].contact_id;
           var path="{{url ('/')}}/admin/contact_read/"+cid;        
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

    });
     
 });

//viewmessage' 
   
    
</script>
@endsection