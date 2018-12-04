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
              @foreach($tms as  $tm)
              <tr>
                <td>{{$tm->task_id}}</td>
                <td>{{$tm->title}}</td>
                @if($tm->pm_id != NULL)
                <td>{{$tm->pm_id}}-{{get_Name($tm->pm_id)}}</span></td>
                @else
                <td></td>
                @endif

                 @if($tm->emp_id != NULL)
                <td>{{$tm->emp_id}}-{{get_Name($tm->emp_id)}}</span></td>
                @else
                <td></td>
                @endif

                <td>{{$tm->assign_date}}</td>
                <td>{{$tm->start_time}}</td>
                <td>{{$tm->end_time}}</td>
                <td><div class="status" style="cursor:pointer;"> {{task_status($tm->status)}} </div></td>
                <td><a  class="edit" data-toggle="tooltip" data-original-title="edit"  onclick="editTaskManager({{$tm->task_id}},'{{$tm->pm_id}}','{{$tm->title}}','{{$tm->description}}','{{$tm->assign_date}}','{{$tm->start_time}}','{{$tm->end_time}}')"> edit </a> </td>
                <td><a data-task-id="{{ $tm->task_id }}" href="javascript:void(0);" id="btn-delete"  data-toggle="tooltip" data-original-title="delete"> delete </a></td>
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <p>Record not found.</p>
              </tr>
              <?php } ?>
              </tbody>
              
            </table>
            <div align="center"> {{ $tms->links() }} </div>