@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cart') }}</div>

                <div class="class-body">
                    @if($errors->any())
                        @foreach ($errors->all as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif

                    @php
                        $total_price = 0;
                    @endphp
        
                    <div class="card-group m-auto">
                        @foreach ($carts as $cart)
                        <div class="card m-3" style="width: 14rem; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);">
                            <img class="card-img-top" src="{{url('storage/'. $cart->product->image)}}" style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{$cart->product->name}}</h5>
                                <form action="{{route('update_cart', $cart)}}" method="post">
                                    @method('patch')
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="number" aria-describedby="basic-addon2"
                                                name="amount" value="{{$cart->amount}}">
                                        <div class="input-group-append">   
                                            <button class="btn btn-outline-secondary" type="submit">
                                                Update Amount</button>
                                    </div>
                                </div>        
                            </form>
                            
                                    <form action="{{route('delete_cart', $cart)}}" method="post">
                                        @method('delete')
                                        @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>
                        
                        <div class="d-flex flex-column justify-content-end align-items-center">
                            <h5>Total: Rp{{$total_price}}</h5>
                            <form action="{{route('checkout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    @if($carts->isEmpty()) disabled @endif>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
                        

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Cart</title>
    <link href="{{asset('css/show_cart.css')}}" rel="stylesheet">
</head>
<body>
    @if($errors->any())
        @foreach ($errors->all as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    @foreach ($carts as $cart)
    <div class="card-container">
        <div class="card">
            <img src="{{url('storage/'. $cart->product->image)}}" alt="" height="100px">
            <p>Name: {{$cart->product->name}}</p>
                <form action="{{route('update_cart', $cart)}}" method="post">
                @method('patch')
                @csrf
                    <input class="amount-input" type="number" name="amount" value="{{$cart->amount}}">
                    <button class="update-amount-button" type="submit">Update Amount</button>
            </form>
                <form action="{{route('delete_cart', $cart)}}" method="post">
                @method('delete')
                @csrf
                    <button class="delete-button" type="submit">Delete</button>
            </form>
        </div>
        <form action="{{route('checkout')}}" method="post">
    </div>
    @endforeach
    <div class="checkout-button-container">
        <form action="{{route('checkout')}}" method="post">
            @csrf
            <button class="checkout-button" type="submit">Checkout</button>
        </form>
    </div>
    <div class="index-button-container">
        <form action="{{route('index_product')}}" method="get">
            @csrf
            <button class="index-button" type="submit">Index Product</button>
        </form>
    </div>
</body>
</html> --}}
