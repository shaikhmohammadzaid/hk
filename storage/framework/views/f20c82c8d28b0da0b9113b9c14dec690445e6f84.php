<?php $__env->startSection('content'); ?>
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Employee Leave</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employee Leave</li>
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
          <h4 class="card-title">Employees Leave</h4>
          <div class="row m-t-40">
            
          </div>
          <div class="table-responsive">
           <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Date</th>
                 
                  
                </tr>
             <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                
                <td><?php echo e($leave->id); ?></span></td>
                <td><?php echo e($leave->item_id); ?></td>
                <td><?php echo e($leave->allocate_qun); ?></td>
                 <td><?php echo e($leave->date); ?></td>
             
                   
               
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
              <div class="float-right">
    <?php echo e($leaves->links()); ?>

    </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/admin/dist/js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript"> 
 
 
</script>
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
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      }); 
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>