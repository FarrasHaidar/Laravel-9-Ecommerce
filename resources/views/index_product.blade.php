@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Products') }} </div>
                <nav class="navbar">
                    <div class="container">
                      <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
                

                <div class="card-group d-flex justify-content-center">
                    @foreach ($products as $product)
                    <div class="card-m-3" style="width: 15rem; box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2); margin: 10px;">
                        <img class="card-img-top" src="{{url('storage/'. $product->image)}}" alt="Card image cap" 
                        style="height: 180px; justify-content:space-between;">
                    
                            <div class="card-body">
                                <p class="card-text">{{$product->name}}</p>
                                <form action="{{route('show_product', $product)}}" method="get">
                                    <button type="submit" class="btn btn-primary">Show Detail</button>
                            </form>
                    
                            @if(Auth::check()&&Auth::user()->is_admin)
                            <form action="{{route('delete_product', $product)}}" method="post">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger mt-2">Delete Product</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
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
    <title>Index Product</title>
    <link href="{{asset('css/index_product.css')}}" rel="stylesheet">
</head>
<body>
    <div class="create-button">
        <a href="{{ route('create_product') }}" class="btn-create">Create Product</a>
    </div>

    @foreach ($products as $product)
    <div class="card-container">
        <div class="card">
            <p>Name: {{$product->name}}</p>
            <img src="{{url('storage/'. $product->image)}}" alt="" height="150px">
        </div>
        <form action="{{route('show_product', $product)}}" method="get">
            <button class="show-button" type="submit">Show Detail</button>
    </form>
    <form action="{{route('delete_product', $product)}}" method="post">
        @method('delete')
        @csrf
            <button class="delete-button" type="submit">Delete Product</button>
    </form>
    </div>
    @endforeach
</body>
</html> --}}