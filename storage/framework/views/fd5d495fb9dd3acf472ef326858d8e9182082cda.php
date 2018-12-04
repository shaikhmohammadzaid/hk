<br>
 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Project Manager</th>
                  <th>Employee</th>
                  <th>Assign Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($tms); if ($cnt>0) {?>
              <?php $__currentLoopData = $tms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($tm->task_id); ?></td>
                <td><?php echo e($tm->title); ?></td>
                <?php if($tm->pm_id != NULL): ?>
                <td><?php echo e($tm->pm_id); ?>-<?php echo e(get_Name($tm->pm_id)); ?></span></td>
                <?php else: ?>
                <td></td>
                <?php endif; ?>

                 <?php if($tm->emp_id != NULL): ?>
                <td><?php echo e($tm->emp_id); ?>-<?php echo e(get_Name($tm->emp_id)); ?></span></td>
                <?php else: ?>
                <td></td>
                <?php endif; ?>

                <td><?php echo e($tm->assign_date); ?></td>
                <td><?php echo e($tm->start_time); ?></td>
                <td><?php echo e($tm->end_time); ?></td>
                <td><div class="status" style="cursor:pointer;"> <?php echo e(task_status($tm->status)); ?> </div></td>
                <td><a  class="edit" data-toggle="tooltip" data-original-title="edit"  onclick="editTaskManager(<?php echo e($tm->task_id); ?>,'<?php echo e($tm->pm_id); ?>','<?php echo e($tm->title); ?>','<?php echo e($tm->description); ?>','<?php echo e($tm->assign_date); ?>','<?php echo e($tm->start_time); ?>','<?php echo e($tm->end_time); ?>')"> edit </a> </td>
                <td><a data-task-id="<?php echo e($tm->task_id); ?>" href="javascript:void(0);" id="btn-delete"  data-toggle="tooltip" data-original-title="delete"> delete </a></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php } else { ?>
              <tr>
                <p>Record not found.</p>
              </tr>
              <?php } ?>
              </tbody>
              
            </table>
            <div align="center"> <?php echo e($tms->links()); ?> </div>