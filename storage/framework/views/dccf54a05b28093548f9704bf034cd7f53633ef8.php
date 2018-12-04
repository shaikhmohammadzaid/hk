<br>

 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>type</th>
                  <th>edit</th>
                  <th>delete</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                
                <td><?php echo e($leave->leave_id); ?></span></td>
                <td><?php echo e($leave->leave_type); ?></td>
                <td>
                  <a  class="edit" data-toggle="tooltip" data-original-title="edit"
                     onclick="editLeave(<?php echo e($leave->leave_id); ?>,'<?php echo e($leave->leave_type); ?>')">   edit
                    </a></span></td>
                <td>
                    <a data-leave-id="<?php echo e($leave->leave_id); ?>" id="btn-delete"  data-toggle="tooltip" data-original-title="delete" id="exampleWarningConfirm">
                    Delete  
                  </a></span></td>
               
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