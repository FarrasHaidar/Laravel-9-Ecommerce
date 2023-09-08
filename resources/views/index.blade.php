@extends('layouts.app')

    @section('content')

    <div class="container">

        <h1 class="text-center pd-4">List Order</h1>
        <hr>

        <form action="/filter" method="get">
            <div class="row pb-3">
            
            <div class="col-md-5 pt-4">
                <a href="{{route('index_product')}}" class="btn btn-success">Go To Product</a>
            </div>

            <div class="col-md-3">
                <label>Start Date:</label>
                <input type="date" name="start_date" class="form-control">

            </div>

            <div class="col-md-3">
                <label>End Date:</label>
                <input type="date" name="end_date" class="form-control">

            </div>

            <div class="col-md-1 pt-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>

            </div>

        </form>

        <table class="table table-bordered table-hover">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Payment Status</th>
                <th>Product Detail</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    @php
                        $total_price = 0; 
                    @endphp
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->email}}</td>
                        <td>
                            @if ($order->user->created_at)
                                {{ $order->user->created_at->format('Y-m-d') }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td> 
                            @if($order->is_paid == true)
                                <p class="card-text">Paid</p>
                            @else
                                <p class="card-text">Unpaid</p>
                            @endif  
                        </td>
                        <td>
                            @if ($order->transactions)
                                @foreach ($order->transactions as $transaction)
                                    <p>{{$transaction->product->name}} - {{$transaction->amount}} pcs</p>
                                    @php
                                        $total_price += $transaction->product->price * $transaction->amount;
                                    @endphp
                                @endforeach
                            @endif
                            <p>Total: {{$total_price}}</p>
                        </td>
                        <td>
                            <form action="{{route('delete_order', $order)}}" method="post">
                                @method('delete')
                                @csrf
                                <a href="" class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>
    @endsection
