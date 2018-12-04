<br>

 <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Service</th>
                  <th>Service Price</th>
                  <th>Date</th>
                  <th>Project Manager</th>
                  <th>Employee</th>
                  <th>Status</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($services); if ($cnt>0) {?>
              @foreach($services as  $service)
              <tr>
                
                <td>{{$service->service_req}}</span></td>
                <td>{{ucfirst(getUser($service->user_id))}}</td>
                <td>{{getServiceName($service->service_id)}}</td>
                <td>{{$service->service_price}}</span></td>
                <td>{{$service->service_date}}</span></td>
               
                @if($service->pm_id != NULL)
                <td>{{$service->pm_id}}-{{get_Name($service->pm_id)}}</span></td>
                @else
                <td></td>
                @endif

                 @if($service->emp_id != NULL)
                <td>{{$service->emp_id}}-{{get_Name($service->emp_id)}}</span></td>
                @else
                <td></td>
                @endif
                <td>{{service_status($service->status)}} </td>
               
             

              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody> 
            </table>
      <div class="float-right">
    {{ $services->links() }}
    </div>