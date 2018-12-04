@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Project Manager Leave</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Manager Leave</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- basic table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Project Manager Leave</h4>
          <div class="row m-t-40">
            
          </div>
          <div class="table-responsive">
           <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Reasone</th>
                  <th>Discription</th>
                  <th>leave Date</th>
                  <th>posting Date</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($leaves); if ($cnt>0) {?>
              @foreach($leaves as  $leave)
              <tr>
                <td>{{$leave->id}}</td>
                <td>{{leave_Name($leave->leave_id)}}</td>
                <td>{{$leave->discription}}</td>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection 
@section('script')
<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>
<script type="text/javascript"> 
 
 
</script>
<!-- This is data table -->
<script src="{{ asset('public/admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.print.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      }); 
    });
</script>
@endsection