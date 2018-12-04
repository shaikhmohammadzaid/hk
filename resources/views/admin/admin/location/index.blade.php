@extends('admin.layout.layout')
@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Location Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Location</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>
        <button id="location" class="btn btn-primary pull-right">Add location</button>
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
          <h4 class="card-title">Location</h4>
          <div class="col-md-12">
           @if (session('success_msg'))
            <div style="background-color: #28a745!important; " class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ session('success_msg') }}
            </div>
            @endif
        </div>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">{{ totaladmin()}}</h1>
                  <h6 class="text-white">Total Admin</h6>

                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">{{ totaladmin_active()}}</h1>
                  <h6 class="text-white">Active Admin </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">{{ totaladmin_inactive()}}</h1>
                  <h6 class="text-white">Inactive Admin</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
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
                  <th>Location Name</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php $cnt = count($locations); if ($cnt>0) {?>
              @foreach($locations as  $location)
              <tr>
                <td>{{$location->location_id}}</td>
                <td>{{$location->location_name}}</td>               

                  <td> 
                    <a  class="edit" data-toggle="tooltip" data-original-title="edit" onclick="editLocation({{$location->location_id}},'{{$location->location_name}}')">          
                            edit
                    </a>
                  </td>
                  <td> <a data-location-id="{{ $location->location_id }}" id="btn-delete"  data-toggle="tooltip" data-original-title="delete" id="exampleWarningConfirm">
                  	Delete  
                  </a></td>

              </tr>
              @endforeach
              <?php } else { ?>
              <tr>
                 <p>Record not found.</p>
              </tr>   
              <?php } ?>
              
              </tbody> 
            </table>
             <div align="center"> {{ $locations->links() }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_location_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add location</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
                 
        <form action="" method="get" id="frm-location" class="modeladdevent">
          
          <div class="well">
           <span>Location Name:- </span>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon14">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
             <input type="text" class="form-control " name="location_name" id="location_name" placeholder="Enter Location " required>
            </div>
             <b id="location_error" style="color:#FF0000; "></b>
          </div>
       
        
        <div class="modal-footer">
          <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-rounded btn-block btn-outline-info btn-save">Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->

<!--Model start here-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_location_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit location</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
                 
        <form action="" method="" id="form_update_location" class="modeladdevent">
          <input type="hidden" name="location_id" id="edit_location_id" >
          <div class="well"> <span>Location:-</span>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon14">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
             <input type="text" class="form-control " name="location_name" id="edit_location_name" required>
            </div>
             <b id="edit_location_error" style="color:#FF0000; "></b>
          </div>
       
        
        <div class="modal-footer">
          <button type="button" class="btn btn-rounded btn-block btn-outline-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-rounded btn-block btn-outline-info btn-update">Update</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->

@endsection 

@section('script')

 @include('admin.admin.location.js.location-js')

@endsection