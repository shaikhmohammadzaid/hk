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
              @foreach($leaves as  $leave)
              <tr>
                
                <td>{{$leave->id}}</span></td>
                <td>{{$leave->item_id}}</td>
                <td>{{$leave->emp_id}}</td>
                <td>{{$leave->allocate_qun}}</td>
               <td>
                  <a  class="return" data-toggle="tooltip" data-original-title="edit"
                     onclick="qreturn({{$leave->id}},'{{$leave->item_id}}','{{$leave->emp_id}}','{{$leave->allocate_qun}}')">Return
                    </a></span></td>
                   
               
              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
   <!--    <div class="float-right">
    {{ $leaves->links() }}
    </div> -->