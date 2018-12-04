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
              @foreach($leaves as  $leave)
              <tr>
                
                <td>{{$leave->leave_id}}</span></td>
                <td>{{$leave->leave_type}}</td>
                <td>
                  <a  class="edit" data-toggle="tooltip" data-original-title="edit"
                     onclick="editLeave({{$leave->leave_id}},'{{$leave->leave_type}}')">   edit
                    </a></span></td>
                <td>
                    <a data-leave-id="{{ $leave->leave_id }}" id="btn-delete"  data-toggle="tooltip" data-original-title="delete" id="exampleWarningConfirm">
                    Delete  
                  </a></span></td>
               
              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
      <div class="float-right">
    {{ $leaves->links() }}
    </div>