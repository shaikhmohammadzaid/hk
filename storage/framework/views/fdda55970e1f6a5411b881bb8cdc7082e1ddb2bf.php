<br>

 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Item Name</th>
                  <th>Employee Name</th>
                
                  <th>Allocated Quantity</th>

                    <th>Return</th>
               
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                
                <td><?php echo e($leave->id); ?></span></td>
                <td><?php echo e($leave->item_id); ?></td>
                <td><?php echo e($leave->emp_id); ?></td>
                <td><?php echo e($leave->allocate_qun); ?></td>
               <td>
                  <a  class="return" data-toggle="tooltip" data-original-title="edit"
                     onclick="qreturn(<?php echo e($leave->id); ?>,'<?php echo e($leave->item_id); ?>','<?php echo e($leave->emp_id); ?>','<?php echo e($leave->allocate_qun); ?>')">Return
                    </a></span></td>
                   
               
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
   <!--    <div class="float-right">
    <?php echo e($leaves->links()); ?>

    </div> -->