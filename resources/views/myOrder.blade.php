@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"> 
        
    </div>

    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Order ID</td>
                    <td>Date Time</td>
                    <td>Payment Status</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                @foreach($my_orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->paymentStatus}}</td>
                    <td>{{$order->amount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>

    <div class="col-sm-3">

    </div>
</div>
@endsection