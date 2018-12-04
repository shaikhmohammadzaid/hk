@extends('layouts.app')
@section('title')My Profile @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-heading">My Profile</div>
        <ol class="breadcrumb" style="margin:25px;">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
        <div class="panel-body">
          <div class="col-md-6 ">
           @if(Session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> {{Session::get('success') }}</strong> </div>
            @elseif(Session()->has('failure'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong>{{Session::get('failure') }}</strong> </div>
            @endif
          <form name="updt_profile" method="post" action="{{route('myprofile_update')}}">
          {{csrf_field()}}
            <table class="table-striped table-hover ">
              <tr>
                <td width="20%">Name</td>
                <td><input type="hidden" name="user_id" class="user_id"  value="{{$user[0]->id}}">
                  <input type="text" name="user_name" class="user_name"  value="{{$user[0]->name}}"></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input type="text" name="user_address" class="user_address"  value="{{$user[0]->address}}"></td>
              </tr>
              <tr>
                <td>Shop No</td>
                <td><input type="text" name="shop_no_update" class="shop_no_update"  value="{{$user[0]->shop_no}}"></td>
                </td>
              </tr>
              <tr>
                <td>Floor No</td>
                <td> <select name="floor_no" id="floor_no"  class="form-control" required="select our floor">
                                      <option  value="">Select your floor</option>
                                      <option value="1"<?php if($user[0]->floor_no=="1"){echo "selected";} ?>>1</option>
                                      <option value="2"<?php if($user[0]->floor_no=="2"){echo "selected";} ?>>2 </option>
                                      <option value="3"<?php if($user[0]->floor_no=="3"){echo "selected";} ?>>3</option>
                                      <option value="4"<?php if($user[0]->floor_no=="4"){echo "selected";} ?>>4</option>
                                      <option value="5"<?php if($user[0]->floor_no=="5"){echo "selected";} ?>>5</option>
                                      <option value="6"<?php if($user[0]->floor_no=="6"){echo "selected";} ?>>6</option>
                                      <option value="7"<?php if($user[0]->floor_no=="7"){echo "selected";} ?>>7</option>
                                      <option value="8"<?php if($user[0]->floor_no=="8"){echo "selected";} ?>>8</option>
                                      <option value="9"<?php if($user[0]->floor_no=="9"){echo "selected";} ?>>9</option>
                                      <option value="10"<?php if($user[0]->floor_no=="10"){echo "selected";} ?>>10</option>
                                </select></td>
              </tr>
              <tr>
                <td>Block</td>
                <td> <select name="block" id="block"  class="form-control" required="select our Block">
                                      <option >Select your block</option>
                                      <option value="A"<?php if($user[0]->block=="A"){echo "selected";} ?>>A</option>
                                      <option value="B"<?php if($user[0]->block=="B"){echo "selected";} ?>>B </option>
                                      <option value="c"<?php if($user[0]->block=="C"){echo "selected";} ?>>C</option>
                                      <option value="D"<?php if($user[0]->block=="D"){echo "selected";} ?>>D</option>
                                      <option value="E"<?php if($user[0]->block=="E"){echo "selected";} ?>>E</option>
                                      <option value="F"<?php if($user[0]->block=="F"){echo "selected";} ?>>F</option>
                                      <option value="G"<?php if($user[0]->block=="G"){echo "selected";} ?>>G</option>
                                      <option value="H"<?php if($user[0]->block=="H"){echo "selected";} ?>>H</option>
                                      <option value="I"<?php if($user[0]->block=="I"){echo "selected";} ?>>I</option>
                                </select></td>
              </tr>
              <tr>
                <td>Location</td>
                <td> 
                  <select name="location" id="location"  class=" location form-control" required="select our Location">
                  @foreach($locations as  $location)
                                    <option value="{{$location->location_id}}" <?php if($location->location_id==$user[0]->location_id){echo "selected";} ?>>{{$location->location_name}}</option>
                  @endforeach
                </select> 

                </td>
              </tr>
              <tr>
                <td>Branch</td>
                <td>  <select name="branch" id="branch"  class="branch form-control" required="select our Branch">
                  @foreach($branchs as  $branch)
                           <option value="{{$branch->branch_id}}" <?php if($branch->branch_id==$user[0]->branch_id){echo "selected";} ?>>{{$branch->branch_name}}</option>
                  @endforeach
                </select> </td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td><input type="text" name="user_email" class="user_email"  value="{{$user[0]->email}}"></td>
              </tr>
              <tr>
                <td>Mobile No</td>
                <td><input type="text" name="user_mobile" class="user_mobile"  value="{{$user[0]->mobile}}">
                  <b id="balance_error" style="color:#FF0000"></b></td>

              </tr>
              <tr>
                <td>Alternate Mobile No</td>
                <td><input type="text" name="user_alt_mobile" class="user_alt_mobile"  value="{{$user[0]->alternate_mobile}}">
                  <b id="balance_error1" style="color:#FF0000"></b></td>
              </tr>
            </table>
            <div class="pull-right">
              <input type="submit" class="update_profile" value="Update Profile">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- start js -->
@section('scripts')
 <script type="text/javascript">

  $(document).ready(function () {
  
  //called when key is pressed in textbox
  $(".user_mobile").keypress(function (e) {
  
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#balance_error").html("Enter a number only").show();
               return false;
    }
   });
  $(".user_alt_mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#balance_error1").html("Enter a number only").show();
               return false;
    }
   });
});
   $(document).on('change',' .location ',function(e){
                    var location_id = $(this).val();

                    var branch =$('.branch')
                    $(branch).empty();
                    $.get("{{ route('branchDetails') }}",{location_id:location_id},function(data){
                              console.log(data);
                        $.each(data,function(i,b){
                                $('.branch').append($("<option/>",{
                                    value : b.branch_id,
                                    text : b.branch_name
                                }))

                        })
                    })
          });
 </script>
@endsection