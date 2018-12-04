@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Employee Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Employees</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="task_assign" class="btn btn-primary pull-right">TASK ASSIEND</button>
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
          <h4 class="card-title">Employees</h4>
          <div class="col-md-12">
           @if (session('success_msg'))
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ session('success_msg') }}
            </div>
            @endif
        </div>
         
         <div class="table-responsive"> @if(Session()->has('success'))
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
                  <th>ID</th>
                  <th>User</th>
                  <th>Designation</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Created</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($emps); if ($cnt>0) {?>
              @foreach($emps as  $emp)
              <tr>
                <td>{{$emp->id}}</span></td>
                <td>{{ucFirst($emp->name)}}</td>
                <td>{{ucFirst($emp->job_title)}}</td>
                <td>{{$emp->email}}</td>
                <td><div id="{{$emp->id}}/{{$emp->status}}" class="status" style="cursor:pointer;">
                    <?php if($emp->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                <td>{{$emp->created_at}}</td>
              </tr>
              @endforeach
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody>
              
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection 

@section('script')
 
@endsection