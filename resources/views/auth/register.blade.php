@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                  
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile No </label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control" name="mobile" maxlength="10" required>
   
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('alternate_mobile') ? ' has-error' : '' }}">
                            <label for="alternate_mobile" class="col-md-4 control-label">Alternate Mobile No </label>

                            <div class="col-md-6">
                                <input id="alternate_mobile" type="mobile" class="form-control" name="alternate_mobile" maxlength="10" required>
   
                                @if ($errors->has('alternate_mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alternate_mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location </label>

                            <div class="col-md-6">
                                 <select required aria-required="true" name="location_id" id="location_id"  class="form-control location"  >
                                 <option value="" >Select your Location</option>
                                 <?php $locations=get_location(); ?>
                                  @foreach($locations as  $location)
                                    <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                                  @endforeach

                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="branch" class="col-md-4 control-label">Branch</label>

                            <div class="col-md-6">
                               <select name="branch_id" id="branch"  class="branch form-control" required="select our Branch">
                                <option value="">Select your Branch</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="block" class="col-md-4 control-label">Block</label>

                            <div class="col-md-6">
                                <select name="block" id="block"  class="form-control" required="select our Block">
                                      <option  value="">Select your block</option>
                                      <option value="A">A</option>
                                      <option value="B">B </option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                      <option value="E">E</option>
                                      <option value="F">F</option>
                                      <option value="G">G</option>
                                      <option value="H">H</option>
                                      <option value="I">I</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="shop_no" class="col-md-4 control-label">Shop No:</label>
                            <div class="col-md-6">
                                <input id="shop_no" type="text" class="form-control" name="shop_no" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="floor_no" class="col-md-4 control-label">Floor No:</label>
                            <div class="col-md-6">
                               <select name="floor_no" id="floor_no"  class="form-control" required="select our floor">
                                      <option  value="">Select your floor</option>
                                      <option value="1">1</option>
                                      <option value="2">2 </option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
<script type="text/javascript">
  //  submit location that show branch.
    $(document).on('change',' .location ',function(e){
                    var location_id = $(this).val();

                    var branch =$('.branch')
                    $(branch).empty();
                    $.get("{{ route('reg_branch') }}",{location_id:location_id},function(data){

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
