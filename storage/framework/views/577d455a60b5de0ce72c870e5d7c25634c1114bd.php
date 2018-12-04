<?php $__env->startSection('content'); ?>
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Allocate Store Item</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Allocate Store item</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="add_leave" class="btn btn-primary pull-right">Allocate Items</button>

         
      </div>
    </div>
  </div>
</div>
 

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
           <h4 class="card-title">Allocated Item List</h4>
          <div class="col-md-12" id="InfoTable">
           <?php if(session('success_msg')): ?>
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo e(session('success_msg')); ?>

            </div>
            <?php endif; ?>

             <?php if(Session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> <?php echo e(Session::get('success')); ?></strong> </div>
            <?php elseif(Session()->has('failure')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong><?php echo e(Session::get('failure')); ?></strong> </div>
            <?php endif; ?>
           
        </div>
        
         <div class="table-responsive"  id="LeaveInfoTable">
        <!-- Table diaplay with jquery append Data -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<!--Model ends here-->
<!--  <div class="modal fade" tabindex="-1" role="dialog" id="add_qun">
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
   
    </div>
  
  </div>

</div> -->

 <div class="modal fade" tabindex="-1" role="dialog" id="add_leave_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Assign To Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Select Item:</span> 
          
           <select name="allocate_item_name" id="allocate_item_name"  class="form-control">
          <option value="" disabled selected>Select Item</option>
          <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($items->id); ?>"><?php echo e($items->item_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </select>
           
             <b id="allocate_leave_error" style="color:#FF0000"></b>
          </div>
            <div class="well"> <span>Select Employee:</span> 
           
           
            <select name="allocate_id" id="allocate_id"  class="form-control">
          <option value="" disabled selected>Select Employee</option>
          <?php $__currentLoopData = $adminss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminsss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($adminsss->id); ?>"><?php echo e($adminsss->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </select>

            
          </div>
          <div class="well"> <span>Enter Quantity:</span> 
           
           
            <input type="text" name="allocate_quntity" id="allocate_quntity" class="form-control" autofocus required/>

            
          </div>
         
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-save" class="btn btn-primary">Assign Quantity</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="return_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Return Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
         
           
          <div class="well"> <span>Enter Quantity:</span> 
           
            <input type="hidden" name="return_item_name" id="return_item_name">

            <input type="hidden" name="return_id" id="return_id">

             <input type="hidden" name="return_item_id" id="return_item_id">
            
            <input type="hidden" name="return_quntityy" id="return_quntityy">
           
            <input type="text" name="return_quntity" id="return_quntity" class="form-control" autofocus required/>

            
          </div>
         
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btn-return" class="btn btn-primary">Assign Quantity</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>


<?php $__env->stopSection(); ?> 

<?php $__env->startSection('script'); ?>
 <script type="text/javascript"> 
   
   showLeaveDetails();

//==== Add Leave Type ===========
   $(document).on('click','#add_leave',function(e){
      e.preventDefault(); 
      $('#add_leave_model').modal('show');
   });
  
   $(document).on('click','#btn-save',function(e){
    e.preventDefault();

     var allocate_item=$('#allocate_item_name').val();
      var allocate_id=$('#allocate_id').val();
            var allocate_qun=$('#allocate_quntity').val();


       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("<?php echo e(route('allocate')); ?>",{allocate_item:allocate_item ,allocate_id:allocate_id , allocate_qun:allocate_qun },function(data){

         var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#return_leave_error").html(error); 
                     }
           
      });

   });


    function qreturn(id,item_id,emp_id,allocate_qun) 
          {  
              
               $('#return_item_name').val(item_id);
      $('#return_id').val(emp_id);
            $('#return_quntityy').val(allocate_qun);
               $('#return_item_id').val(id);
              
              
                
              $('#return_model').modal('show');
          }
  
  $(document).on('click','.return',function(){
   
     qreturn(id,item_id,emp_id,allocate_qun); 

   });

  
   $(document).on('click','#btn-return',function(e){
    e.preventDefault();

     var allocate_item=$('#return_item_name').val();
      var allocate_id=$('#return_id').val();
            var allocate_qun=$('#return_quntity').val();
            var return_item_id=$('#return_item_id').val();
            var return_quntityy=$('#return_quntityy').val();


       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      $.post("<?php echo e(route('return')); ?>",{allocate_item:allocate_item ,allocate_id:allocate_id , allocate_qun:allocate_qun ,return_item_id:return_item_id , return_quntityy:return_quntityy },function(data){

         var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == leave_type+" already exits") 
                      {
                       $("#return_leave_error").html(error); 
                     }
           
      });

   });
//==== Edn Add Leave Type ===========  

//==== Edit//Update Leave Type ===========  

/*function allocate(id,item_name) 
          {  
              
               $('#allocate_leave_id').val(id);
               $('#allocate_item_name').val(item_name);
              
                
              $('#allocate_item').modal('show');
          }

  $(document).on('click','.allocate',function(){
   
     allocate(id,item_name); 

   }); */


/*
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
      $.post("",{leave_id:leave_id,leave_type:leave_type,qun:qun},function(data){

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
*/

 


//==== Edit//Update Leave Type =========== 

//==== delete Leave Type ===========
   
//==== Delete Leave Type ===========


  $(document).on('click','.btn-refresh',function(e){
   e.preventDefault(); 
   window.location.href = "<?php echo e(url('/admin/service_Request')); ?>";
  });

  function showLeaveDetails(){
      var data = $('#frm-c').serialize();
        $.get("<?php echo e(route('showDetails')); ?>",data,function(data){
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
    <script src="<?php echo e(asset('public/admin/dist/js/sweetalert.min.js')); ?>"></script>
<!-- This is data table -->
<script src="<?php echo e(asset('public/admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.flash.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.print.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>