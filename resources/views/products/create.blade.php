@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('products.store')}}">
        @csrf
    <input type="text" name="name"></input>
    <input type="text" name="sku"></input>
    <input type="checkbox" name="status"></input>
    <input type="number" name="base_price"></input>
    <input type="number" name="individual_discount"></input>
    <input type="url" name="image" value="http://example.com"></input>
    <input type="text" name="description"></input>
    <input type="submit" name="submit"></input>
    </form>

@endsection