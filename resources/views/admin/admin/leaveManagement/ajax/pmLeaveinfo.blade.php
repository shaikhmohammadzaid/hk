
 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Project Manager</th>
                  <th>Reasone</th>
                  <th>leave Date</th>
                  <th>posting Date</th>
                  <th>Status</th>
                  <th>Action</th>
                 
                 
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              @foreach($leaves as  $leave)
              <tr>
                <td>{{$leave->id}}</td>
                <td>{{get_Name($leave->pm_id)}}</td>
                <td>{{leave_Name($leave->leave_id)}}</td>
                <td>{{$leave->from_date}} - {{$leave->to_date}}</td>
                <td>{{$leave->posting_date}}</td>
               <td>
                  @if($leave->status == 1)
                     <span class="label label-info  m-r-5 "> Waiting </span>
                  @elseif($leave->status == 2)   
                     <span class="label label-success  m-r-5 "> Accepted</span>
                  @else
                     <span class="label  label-danger m-r-5 "> Rejected</span>
                  @endif
                </td>
                 <td> 
                @if($leave->status == 1)
               
                <a href="javascript:;" data-leave-id="{{$leave->id}}" data-status="2" data-leave-action="approved" class="btn btn-xs btn-success btn-rounded m-r-5 leave-action btn-leave"><i class="fa fa-check"></i> Accept</a>

                <a href="javascript:;" data-leave-id="{{$leave->id}}" data-status="3" data-leave-action="rejected" class="btn btn-xs btn-danger btn-rounded leave-action btn-leave"><i class="fa fa-times"></i> Reject</a>
               
               @elseif($leave->status == 2)
                 
                <a href="javascript:;" data-leave-id="{{$leave->id}}" data-status="3" data-leave-action="rejected" class="btn btn-xs btn-danger btn-rounded leave-action btn-leave"><i class="fa fa-times"></i> Reject</a>
               
               @else
               
                  <a href="javascript:;" data-leave-id="{{$leave->id}}" data-status="2" data-leave-action="approved" class="btn btn-xs btn-success btn-rounded m-r-5 leave-action btn-leave"><i class="fa fa-check"></i> Accept</a>
              
               @endif
                </td>
             
              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                <p>Record not found.</p>
              </tr>
              <?php } ?>
              </tbody>
              
            </table>
            <div align="center"> {{ $leaves->links() }} </div>