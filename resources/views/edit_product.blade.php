@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" 
                                value="{{$product->name}}"><br>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control"
                                value="{{$product->description}}" ><br>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" 
                                value="{{$product->price}}"><br>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control" 
                                value="{{$product->stock}}"><br>
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
    <title>Edit {{$product->name}}</title>
    <link href="{{asset('css/edit_product.css')}}" rel="stylesheet" >
</head>
<body>
    <div class="container">
        <h1>Silahkan Perbarui Data</h1>
        <div class="form-container">
            <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                    <label class="label-edit" for="">Name</label>
                    <input type="text" name="name" value="{{$product->name}}" placeholder="Name"> <br>
                    <label class="label-edit" for="">Description</label>
                    <input type="text" name="description" value="{{$product->description}}" placeholder="Description"> <br>
                    <label class="label-edit" for="">Price</label>
                    <input type="number" name="price" value="{{$product->price}}" placeholder="Price"> <br>
                    <label class="label-edit" for="">Stock</label>
                    <input type="number" name="stock" value="{{$product->stock}}" placeholder="Stock"> <br>
                    <label class="label-edit" for="">Image</label>
                    <input type="file" name="image">
                    <button type="submit">Edit Data</button>
            </form>
        </div>
    </div>
</body>
</html> --}}