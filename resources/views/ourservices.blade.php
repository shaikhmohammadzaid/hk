@extends('layouts.app')
@section('title')Our Services @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12  ">
      <div class="panel panel-default">
        <div class="panel-heading">Our Services</div>
        <ol class="breadcrumb" style="margin:25px;">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Our Services</li>
        </ol>
        @if(Session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert" style="text-align: center;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
          <strong > {{Session::get('success') }}</strong> </div>
        @elseif(Session()->has('fail'))
        <div class="alert alert-danger alert-dismissible" role="alert"  style="text-align: center;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
          <strong>{{Session::get('fail') }}</strong> </div>
        @endif
        <div class="panel-body">
          
            <form class="row" id="frm-service" action="" method="POST" >
             <div class="col-md-6  ">
              <table>
                <thead>
                  <tr>
                    <th></th>
                    <th>No</th>
                    <th>Service Name</th>
                    <th>Credit Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cnt = count($oss);if ($cnt > 0) {?>
                @foreach($oss as $key => $os)
                <tr>
                  <td ><input type="checkbox" class="form-check-input" id="service_id" name="service_id[{{$os->task_price}}]" value="{{$os->tasklist_id}}"  >
                  </td>
                  <td>{{$key+1}}</td>
                  <td>{{$os->task_name}}</td>
                  <td>{{$os->task_price}}</td>
                </tr>
                @endforeach
                <?php } else {?>
                <p>Record not found.</p>
                <?php } ?>
                </tbody>
                
              </table>
             </div> 
             <div class="col-md-6  ">
              @if(Auth::user()->location_id != '' || Auth::user()->branch_id != '' || Auth::user()->block != '' || Auth::user()->floor_no != '' || Auth::user()->shop_no != '' )
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="location_id" value="{{Auth::user()->location_id}}">
              <input type="hidden" name="branch_id" value="{{Auth::user()->branch_id}}">
              <input type="hidden" name="block" value="{{Auth::user()->block}}">
              <input type="hidden" name="floor_no" value="{{Auth::user()->floor_no}}">
              <input type="hidden" name="shop_no" value="{{Auth::user()->shop_no}}">
              <input type="hidden" name="address" value="{{Auth::user()->address}}">
              @endif
              <div class="col-6 form-group row p-b-15 float-left">
                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Task Date</label>
                <div class="col-sm-9">
                  <input type="text" class="mdate form-control " name="service_date" id="service_date" required="required"/>
                </div>
              </div>
              <div class="col-6 form-group row p-b-15 float-left">
                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Start Time</label>
                <div class="col-sm-9">
                  <input type="text" name="service_start_time" id="service_start_time" class="timepicker form-control"  placeholder="Start Time" required="required"/>
                </div>
              </div>
              <div class="col-6 form-group row p-b-15 ">
                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">End Time</label>
                <div class="col-sm-9">
                  <input type="text" name="service_end_time" id="service_end_time" class="timepicker form-control" placeholder="End Time" required="required"/>
                </div>
              </div>
               
               
               
                <div class="col-6 form-group row p-b-15 ">
                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label"></label>
                <div class="col-sm-9">
                   <button type="submit" class="btn btn-success waves-effect waves-classic btn-add"> Submit </button>
                </div>
              </div> 
                   
                 
               
               
              </div>
              
            </form>
           
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
    // MAterial Date picker    
    $('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false , minDate: new Date()});
    $('.timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
   
    $('.date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

    $('.min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
    $('.date-fr').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', lang: 'fr', weekStart: 1, cancelText: 'ANNULER' });
    $('.date-end').bootstrapMaterialDatePicker({ weekStart: 0 });
    $('.date-start').bootstrapMaterialDatePicker({ weekStart: 0 }).on('change', function(e, date) {
    $('.date-end').bootstrapMaterialDatePicker('setMinDate', date);
    });
    </script>
<script type="text/javascript">
  //  submit location that show branch.
    $(document).on('submit','#frm-service ',function(e){
      e.preventDefault();
       
        var data=$('#frm-service').serialize();
            console.log(data);
            $.get("{{ route('add_service_req') }}",data,function(data){
                        console.log(data);
                         var error = data['error']; 
               if(error == 'success' || error == 'fail'){
                  window.location.href = "{{ url('/our-Services') }}";
                                   
                }
            });
          });

</script>
@endsection