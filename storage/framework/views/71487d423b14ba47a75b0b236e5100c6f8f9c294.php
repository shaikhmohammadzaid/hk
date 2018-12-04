<br>

 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                
                  <th>Add Quantity</th>
                 <!--  <th>Allocate</th> -->
                  <th>edit</th>
                  <th>delete</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                
                <td><?php echo e($leave->id); ?></span></td>
                <td><?php echo e($leave->item_name); ?></td>
                <td><?php echo e($leave->qun); ?></td>
               
                     <td>
                  <a  class="qadd" data-toggle="tooltip" data-original-title="edit"
                     onclick="addqun(<?php echo e($leave->id); ?>,'<?php echo e($leave->item_name); ?>')">  Add Quantity
                    </a></span></td>
                   <!--  <td>
                  <a  class="allocate" data-toggle="tooltip" data-original-title="edit"
                     onclick="allocate(<?php echo e($leave->id); ?>,'<?php echo e($leave->item_name); ?>')">Allocate
                    </a></span></td>-->
                <td> 
                  <a  class="edit" data-toggle="tooltip" data-original-title="edit"
                     onclick="editLeave(<?php echo e($leave->id); ?>,'<?php echo e($leave->item_name); ?>','<?php echo e($leave->qun); ?>')">   edit
                    </a></span></td>
                <td>
                    <a data-leave-id="<?php echo e($leave->id); ?>" id="btn-delete"  data-toggle="tooltip" data-original-title="delete" id="exampleWarningConfirm">
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