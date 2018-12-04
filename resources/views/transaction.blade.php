@extends('layouts.app')
@section('title')My Transaction @endsection
@section('seo-description')Super Clean - Cleaning Services HTML Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.
@endsection
@section('seo-keywords')cleaning, laundry, blind cleaning, window cleaning, washing, floor cleaning, trash treatment, extra shiny, cloch ironing
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">My Transaction</div>
					<ol class="breadcrumb" style="margin:25px;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Transaction</li>     
                    </ol>
                <div class="panel-body"> 
                   <table class="table table-striped table-hover ">                 
                     <thead>
                       <tr>
                         <th width="12%">Transaction ID</th>   
                         <th>Service Name</th>
                         <th>Credit Amount</th>
                         <th>Dedit Amount</th>
                         <th>Current Balance</th>
                       </tr>
                     </thead>
                     <tbody>
                        @foreach($user_transactions as $key => $user_transaction)
                       <tr>
                         <td >{{$user_transaction->trans_id}}</td>
                         
                         <td>{{$user_transaction->service_name}}</td>
                         <td>{{isset($user_transaction->credit_amount)?$user_transaction->credit_amount:0}}</td>
                         <td>{{isset($user_transaction->debit_amount)?$user_transaction->debit_amount:0}}</td>
                         <td>{{$user_transaction->current_balance}}</td>
                       </tr>
                       @endforeach
                     </tbody> 
                     
                   </table>
                   <div align="center"> {{ $user_transactions->links() }} </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection