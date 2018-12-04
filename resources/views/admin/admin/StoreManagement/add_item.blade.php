@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Store Management</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Store Managment</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="add_leave" class="btn btn-primary pull-right">Add Items</button>
      </div>
    </div>
  </div>
</div>
 

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <h4 class="card-title">Item List</h4>
          <div class="col-md-12" id="InfoTable">
           @if (session('success_msg'))
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ session('success_msg') }}
            </div>
            @endif

             @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif
           
        </div>
        
         <div class="table-responsive"  id="LeaveInfoTable">
        <!-- Table diaplay with jquery append Data -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="add_leave_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Items</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well">
            <span>Item Name:</span> 
            <input type="text" name="leave_type" id="leave_type" class="form-control" autofocus required/>
            <b id="leave_error" style="color:#FF0000"></b>
            
          </div>
          <div class="well">
            <span>Item quantity:</span> 
            <input type="text" name="qua" id="qua" class="form-control" autofocus required/>
            <b id="leave_error" style="color:#FF0000"></b>
            
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-save" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="edit_leave_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Item Details:</span> 
            <input type="hidden" name="leave_id" id="edit_leave_id">
            <input type="text" name="leave_type" id="edit_leave_type" class="form-control" autofocus required/>
            <input type="text" name="edit_qun" id="edit_qun" class="form-control" autofocus required/>
             <b id="eidt_leave_error" style="color:#FF0000"></b>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-update" class="btn btn-primary">Update</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>

<!--Model ends here-->
 <div class="modal fade" tabindex="-1" role="dialog" id="add_qun">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Quantity</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Item Details:</span> 
            <input type="hidden" name="leave_id" id="add_leave_id">
            <input type="text" name="leave_type" id="add_item_name" class="form-control" autofocus required readonly/>
           
             <b id="add_leave_error" style="color:#FF0000"></b>
          </div>

          <div class="well"> <span>Enter Quantity:</span> 
           
           
            <input type="text" name="add_quntity" id="add_quntity" class="form-control" autofocus required/>

            
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-adddqun" class="btn btn-primary">Add Quantity</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>

 <div class="modal fade" tabindex="-1" role="dialog" id="allocate_item">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Assign To Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Item Details:</span> 
            <input type="hidden" name="leave_id" id="allocate_leave_id">
            <input type="text" name="leave_type" id="allocate_item_name" class="form-control" autofocus required readonly/>
           
             <b id="allocate_leave_error" style="color:#FF0000"></b>
          </div>
            <div class="well"> <span>Select Employee:</span> 
           
           
            <select name="allocate_id" id="allocate_id"  class="form-control">
          <option value="" disabled selected>Select Employee</option>
          @foreach($adminss as  $adminsss)
                      <option value="{{$adminsss->id}}">{{$adminsss->name}}</option>
            @endforeach
                  
                </select>

            
          </div>
          <div class="well"> <span>Enter Quantity:</span> 
           
           
            <input type="text" name="allocate_quntity" id="allocate_quntity" class="form-control" autofocus required/>

            
          </div>
         
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-allocate" class="btn btn-primary">Assign Quantity</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>


@endsection 

@section('script')
 <script type="text/javascript"> 
   
   showLeaveDetails();

//==== Add Leave Type ===========
   $(document).on('click','#add_leave',function(e){
      e.preventDefault(); 
      $('#add_leave_model').modal('show');
   });
  
   $(document).on('click','#btn-save',function(e){
    e.preventDefault();
      var leave_type=$('#leave_type').val();
      var qua=$('#qua').val();
       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("{{ route('additems') }}",{leave_type:leave_type ,qua:qua },function(data){

         var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#leave_error").html(error); 
                     }
           
      });

   });
//==== Edn Add Leave Type ===========  

//==== Edit//Update Leave Type ===========  

function allocate(id,item_name) 
          {  
              
               $('#allocate_leave_id').val(id);
               $('#allocate_item_name').val(item_name);
              
                
              $('#allocate_item').modal('show');
          }

  $(document).on('click','.allocate',function(){
   
     allocate(id,item_name); 

   }); 

   $(document).on('click','#btn-allocate',function(){
      
      var leave_id=$('#allocate_leave_id').val();
      var allocate_id=$('#allocate_id').val();
            var allocate_qun=$('#allocate_quntity').val();
      

       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("{{ route('allocate') }}",{leave_id:leave_id,allocate_id:allocate_id,allocate_qun:allocate_qun},function(data){

                      var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#allocate_leave_error").html(error); 
                     }
           
      });

   });


function addqun(id,item_name) 
          {  
              
               $('#add_leave_id').val(id);
               $('#add_item_name').val(item_name);
              
                
              $('#add_qun').modal('show');
          }
  
  $(document).on('click','.qadd',function(){
   
     addqun(id,item_name); 

   });


   $(document).on('click','#btn-adddqun',function(){
      
      var leave_id=$('#add_leave_id').val();
      var leave_type=$('#add_item_name').val();
            var qun=$('#add_quntity').val();
      

       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("{{ route('adqun') }}",{leave_id:leave_id,leave_type:leave_type,qun:qun},function(data){

                      var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#add_leave_error").html(error); 
                     }
           
      });

   });


   function editLeave(id,item_name,qun) 
          {  
              
               $('#edit_leave_id').val(id);
               $('#edit_leave_type').val(item_name);
               $('#edit_qun').val(qun);
                
              $('#edit_leave_model').modal('show');
          }
  
  
  $(document).on('click','.edit',function(){
   
     editLeave(id,item_name,qun); 

   });


   $(document).on('click','#btn-update',function(){
      
      var leave_id=$('#edit_leave_id').val();
      var leave_type=$('#edit_leave_type').val();
            var qun=$('#edit_qun').val();
      

       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("{{ route('UpdateItem') }}",{leave_id:leave_id,leave_type:leave_type,qun:qun},function(data){

                      var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#eidt_leave_error").html(error); 
                     }
           
      });

   });


//==== Edit//Update Leave Type =========== 

//==== delete Leave Type ===========
      $(document).on('click','#btn-delete',function(e){
           e.preventDefault();
           swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this record!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
               if (willDelete) 
               {
                 //sweet alert
                  var leave_id = $(this).data('leave-id');
                  $.get("{{ route('deleteitem') }}",{leave_id:leave_id,},function(data){
                      location.reload(true);

                       });

                 //end sweet alert 
                }
                 else
                  {
                swal("Your record is safe!");
                  }   
              });

      });
//==== Delete Leave Type ===========


  $(document).on('click','.btn-refresh',function(e){
   e.preventDefault(); 
   window.location.href = "{{ url('/admin/service_Request') }}";
  });

  function showLeaveDetails(){
      var data = $('#frm-c').serialize();
        $.get("{{ route('showStoreDetails') }}",data,function(data){
          $('#LeaveInfoTable').empty().append(data);
      });
  }
  
    // Pagination on role details.
  $(document).on("click",".pagination li a",function(e){
    e.preventDefault(); 
    var data = $('#frm-c').serialize();
    var url = $(this).attr("href");
    $.get(url,data,function(data){
         
        $('#LeaveInfoTable').empty().append(data);
    });
  });


    </script>
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
      
      ////////////////////////////////
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      }); 
      ///////////////////////////

      });
      
   </script>
@endsection