@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">User Transection</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users-Transection</li>
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
          <h4 class="card-title">Users</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{totaluser()}}</h1>
                  <h6 class="text-white">Total Users</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{totaluser_active()}}</h1>
                  <h6 class="text-white">Active Users </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{totaluser_inactive()}}</h1>
                  <h6 class="text-white">Inactive Users</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <div class="table-responsive">
           @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif
            <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Cash Operator Name</th> 
                  <th>Balance</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                 <?php $cnt = count($balances); if ($cnt>0) {?>
              @foreach($balances as $key=>  $balance)
              <tr>
                <td>{{$key+1}} </td>
                <td>{{$balance->user_name}} </td>
                <td>{{$balance->user_email}}</td>
                <td>{{$balance->name}}</td>
                <td>{{$balance->add_amount}}</td>                 
                <td>{{$balance->created_at}}</td>
              </tr> 
               @endforeach
              <?php } else { ?>
              <tr>
                <td colspan="6"><p>Record not found.</p></td>
              </tr>
              <?php } ?>
              </tbody> 
            </table>
            <div align="center"> {{ $balances->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
 
 
 
<!--Model ends here-->
@endsection 
@section('script')
 
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