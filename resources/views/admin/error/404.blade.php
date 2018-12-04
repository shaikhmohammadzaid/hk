@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Error</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   404 error <br>Page not found !.
                   <a href="{{url('/')}}">Click here </a>to go to  Home Page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
