<?php $__env->startSection('content'); ?>
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Daily Task Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daily Task List</li>
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
<!-- ===============  =============================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- basic table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table"> <?php if(Session()->has('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong> <?php echo e(Session::get('success')); ?></strong> </div>
          <?php elseif(Session()->has('failure')): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
            <strong><?php echo e(Session::get('failure')); ?></strong> </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #ff0000" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> To Do (<?php echo e(dtask_todo(Auth::user()->id)); ?>) </h6>
                </div>
              </div>
              <?php $cnt = count($allocates); if ($cnt>0) {?>
              <?php $__currentLoopData = $allocates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $allocate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="panel-body">
                <h4><b><?php echo e(ucfirst($allocate->title)); ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse"><?php echo e($allocate->assign_date); ?></label>
                   <button type="button" class="btn waves-effect waves-light btn-xs btn-info start" id="<?php echo e(Auth::user()->id); ?>/<?php echo e($allocate->task_id); ?>/<?php echo e($allocate->status); ?>">Start</button>
                  
                  <div>
                    <label class="label label-inverse">Start <?php echo e($allocate->start_time); ?> - End <?php echo e($allocate->end_time); ?></label>
                  </div>
				  
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #999F88" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Work in progress (<?php echo e(dtask_working(Auth::user()->id)); ?>)</h6>
                </div>
              </div>
              <?php $cnt = count($workings); if ($cnt>0) {?>
              <?php $__currentLoopData = $workings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $working): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="panel-body">
                <h4><b><?php echo e(ucfirst($working->title)); ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse"><?php echo e($working->assign_date); ?></label>
                 <a class="btn waves-effect waves-light btn-xs btn-success completed" data-task-id="<?php echo e($working->task_id); ?>" data-status="<?php echo e($working->status); ?>" data-emp-id="<?php echo e(Auth::user()->id); ?>" >Completed</a>
                  
                  <div>
                    <label class="label label-inverse">Start-Time <?php echo e($working->emp_start_time); ?> </label>
                  </div>
				  
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #0099CC" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Review / Pending (<?php echo e(task_pending(Auth::user()->id)); ?>)</h6>
                </div>
              </div>
              <?php $cnt = count($pendings); if ($cnt>0) {?>
              <?php $__currentLoopData = $pendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $pending): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="panel-body">
                <h4><b><?php echo e(ucfirst($pending->title)); ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse"><?php echo e($pending->assign_date); ?></label>
                  <?php echo e(task_status($pending->status)); ?>

                  <?php if($pending->status== 4): ?>
                    <button type="button" class="btn waves-effect waves-light btn-xs btn-warning start" id="<?php echo e(Auth::user()->id); ?>/<?php echo e($pending->task_id); ?>/<?php echo e($pending->status); ?>">Start</button>
                  <?php endif; ?>
                  <div>
                    <label class="label label-inverse">Start <?php echo e($pending->start_time); ?> - End <?php echo e($pending->end_time); ?></label>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              <?php } ?>
            </div>
            <div class="col-md-3">
              <div class="panel-heading p-t-5 p-b-5" style="background-color: #007E33" >
                <div class="panel-title">
                  <h6 class="text-white" style="text-align:center; padding-top:10px;"> Completed (<?php echo e(dtask_complete(Auth::user()->id)); ?>)</h6>
                </div>
              </div>
              <?php $cnt = count($completes); if ($cnt>0) {?>
              <?php $__currentLoopData = $completes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $complete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="panel-body">
                <h4><b><?php echo e(ucfirst($complete->title)); ?></b></h4>
                <div class="b-t p-t-10 p-b-10 m-t-5"><img src="https://worksuite.biz/demo/public/default-profile-2.png"alt="user" class="img-circle" width="30">
                  <label class="label label-inverse"><?php echo e($complete->assign_date); ?></label>
                  <?php echo e(task_status($complete->status)); ?>

                  <div>
                    <label class="label label-inverse"> End-Time <?php echo e($complete->emp_end_time); ?></label>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              <?php } ?>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
<div class="modal fade" tabindex="-1" role="dialog" id="completed_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form class="row" id="frm-task-upload" action="" method="POST" enctype="multipart/form-data" >
             <?php echo e(csrf_field()); ?>

          <div class="well"> <span>Photo Upload:</span>
            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo e(Auth::user()->id); ?>">
            <input type="hidden" name="task_id" id="task_id" >
            <input type="hidden" name="status" id="status" >
            <input type="file" name="photo" id="file" class="form-control" autofocus />
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="update_task_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
	jQuery('.start').click( function (e) { 
		     
		var event_id = $(this).attr("id");  
		var status= event_id.split("/");
		
		var emp_id = status[0];				
		var task_id = status[1];
		var status = status[2]; 
		 
		jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		e.preventDefault();   
		var path="<?php echo e(url ('/')); ?>/admin/emp_updt_dtaskstatus/"+emp_id+"/"+task_id+"/"+status;			
		 jQuery.ajax({
					  url:path,
					  method: 'GET', 
							success: function(response1){        
							console.log(response1);
							 location.reload(true); 
					   }   
	
			  });   
	}); 
	
	
	
</script>
<script>
 
  
 jQuery('.completed').on('click', function () { 
    
    var taskId = $(this).data('task-id');
    var status = $(this).data('status');
      $('#task_id').val(taskId);
      $('#status').val(status);
	   jQuery("#completed_model").modal('show');
   
});	

 $(document).on('click','#update_task_btn',function(e){
    e.preventDefault();
      
    // var data = $('#frm-user').serialize();
    var form=$('#frm-task-upload')[0];
    var data = new FormData(form);
        
           $.ajax({ 
                            url: "<?php echo e(route('emp_updt_dtaskstatus')); ?>",
                            type:"POST",
                            data:data,
                            enctype: 'multipart/form-data',
                            async: false,
                            cache : false,
                            processData: false,
                            contentType: false,
                            success:function(data){
                              console.log(data);
                               location.reload(true);
                               }

                            })
        });
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>