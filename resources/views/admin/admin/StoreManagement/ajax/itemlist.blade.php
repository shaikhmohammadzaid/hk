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
              @foreach($leaves as  $leave)
              <tr>
                
                <td>{{$leave->id}}</span></td>
                <td>{{$leave->item_name}}</td>
                <td>{{$leave->qun}}</td>
               
                     <td>
                  <a  class="qadd" data-toggle="tooltip" data-original-title="edit"
                     onclick="addqun({{$leave->id}},'{{$leave->item_name}}')">  Add Quantity
                    </a></span></td>
                   <!--  <td>
                  <a  class="allocate" data-toggle="tooltip" data-original-title="edit"
                     onclick="allocate({{$leave->id}},'{{$leave->item_name}}')">Allocate
                    </a></span></td>-->
                <td> 
                  <a  class="edit" data-toggle="tooltip" data-original-title="edit"
                     onclick="editLeave({{$leave->id}},'{{$leave->item_name}}','{{$leave->qun}}')">   edit
                    </a></span></td>
                <td>
                    <a data-leave-id="{{ $leave->id }}" id="btn-delete"  data-toggle="tooltip" data-original-title="delete" id="exampleWarningConfirm">
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