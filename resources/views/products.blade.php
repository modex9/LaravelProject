@extends('layouts.app')
@section('content')
        <a href="{{route('products.create')}}">Create a product</a>
        <table class="table table-striped" id="product-table">
            <thead>
            <tr>
                <th scope="col">Product name</th>
                <th scope="col">SKU</th>
                <th scope="col">Status</th>
                <th scope="col">Base price</th>
                <th scope="col">Individual discount</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Average rating</th>
                <th scope="col">Edit product</th>
                <th scope="col">Select</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr id="{{'product' .$product->id}}" class=@if($product->status)"enabled" @else "disabled" @endif>
                    @include('partials.product', ['product' => $product, 'options' => $options])
                <tr>
            @endforeach
            </tbody>
        </table>


        <form method="POST" action="{{route('products.destroySelected')}}">
        @csrf
            <div id="del-form">
                <div class="float-right">
                    <label for="select-all">Select all:</label>
                    <input type="checkbox" id="select-all">
                    <button id="delete-button" type="submit" class="btn btn-primary" value="Submit">Delete</button>
                </div>
            </div>
        </form>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
@endsection