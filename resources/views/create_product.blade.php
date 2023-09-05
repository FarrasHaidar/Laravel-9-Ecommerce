@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control" ><br>
                            </div>  

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>  

                            <button type="submit" class="btn btn-primary mt-3">Submit Data</button>
                        </form>
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
    <title>Create Product</title>
    <link href="{{ asset('css/create_product.css') }}" rel="stylesheet">
</head>
<body>
    <div class="index-button">
        <a href="{{ route('index_product') }}" class="btn-index">Index Product</a>
    </div>

    <div class="container">
        <h1>Selamat Datang! Masukkan Barang Anda</h1>
        <div class="form-container">
            <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Name"> <br>
                <input type="text" name="description" placeholder="Description"> <br>
                <input type="number" name="price" placeholder="Price"> <br>
                <input type="number" name="stock" placeholder="Stock"> <br>
                <input type="file" name="image"><br>
                <button type="submit">Submit Data</button>
            </form>
        </div>
    </div>
</body>
</html> --}}