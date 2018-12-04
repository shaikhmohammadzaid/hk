@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Task Listing</h4>
      
    </div>
      <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="add_task" class="btn btn-primary pull-right">Add Task</button>
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
          <h4 class="card-title">Task</h4>
           
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
                  <th>NO</th>
                  <th>Task</th> 
                  <th>Service Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($tasks); if ($cnt>0) {?>
              @foreach($tasks as $key => $task)
              <tr>
                <td width="5%">{{$key+1}}</span></td>
                <td>{{$task->task_name}}</td>
                <td width="15%">{{$task->task_price}}</td>
                <td width="10%"><div id="{{$task->tasklist_id}}" class="edit"  style="cursor:pointer;" onclick="bk({{$task->tasklist_id}},'{{$task->task_name}}','{{$task->task_price}}')">Edit</div>
                <td width="10%"><div id="{{$task->tasklist_id}}" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <td colspan="5"><p>Record not found.</p><td>
              </tr> 
              <?php } ?>
              </tbody>  
            </table>
            <div align="center"> {{ $tasks->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->


<div class="modal fade" tabindex="-1" role="dialog" id="add_task_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well">
            <span>Add Task:</span> 
            <input type="text" name="add_task" id="add_task_name" class="form-control" autofocus required/>
            <span>Task Price:</span> 
            <input type="text" name="task_price" id="task_price" class="form-control" required/>
              <b id="balance_error" style="color:#FF0000"></b>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="add_task_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="edit_task_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Task Name:</span> 
            <input type="hidden" name="task_id" id="task_id">
            <input type="text" name="add_task" id="task_name" class="form-control" autofocus required/>
            <span>Task Price:</span> 
            <input type="text" name="edit_task_price" id="edit_task_price" class="form-control" required/>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="edit_task_btn" class="btn btn-primary">Update</button>
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
     
       var path="{{url ('/')}}/admin/delete_task/"+mid;      
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
   function bk(id,task,price) 
  {   
      $("#task_id").val(id);    
      $("#task_name").val(task);
      $("#edit_task_price").val(price);    
      $('#edit_task_model').modal();  
  } 
jQuery(document).ready(function(){



  $("#task_price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#balance_error").html("Enter a number only").show();
               return false;
    }
   });

jQuery('#add_task').on('click', function () {
  jQuery("#add_task_model").modal();   
  }); 
  
  jQuery('#add_task_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      e.preventDefault();    
    if (jQuery('#name').val() != '' && jQuery('#email').val() != '' && jQuery('#password').val() != '') 
          {
            var task_name = jQuery('#add_task_name').val(); 
          }
          else
          {
            
             if(jQuery('#add_task_name').val() == '')
                  {
                    $(".task_name").show();
                  }
                  else
                  {
                     $("#add_task_name").keyup();
                  }    
            
          } 
          
           var task_name = jQuery('#add_task_name').val();
           var task_price = jQuery('#task_price').val();
         jQuery.ajax({
           url:"{{ url('/admin/add_task') }}",
           method: 'POST',  
           data: {
              task_name:task_name,
              task_price:task_price,          
          },
          success: function(data){           
          console.log(data);
          location.reload(true); 
            
       }
      });   
  }); 
  jQuery('.edit').on('click',function(){ bk(id,task,price); })
  
  jQuery('#edit_task_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
    e.preventDefault();    

    var task_id = jQuery('#task_id').val();    
    var task_name = jQuery('#task_name').val();
    var task_price = jQuery('#edit_task_price').val();
    
    jQuery.ajax({
                  url:"{{ url('/admin/edit_task') }}",
                  method: 'POST',  
                  data: {
                          task_id:task_id,
                          task_name:task_name, 
                          task_price:task_price, 
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