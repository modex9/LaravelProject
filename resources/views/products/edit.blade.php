@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ "Product edit form" }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}" autofocus required></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU (unique product number)') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="sku" class="form-control" value="{{$product->sku}}" required></input>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Product status') }}</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name='status'>
                                        <option value="enabled">enabled</option>
                                        <option value="disabled">disabled</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="base_price" class="col-md-4 col-form-label text-md-right">{{ __('Base price') }}</label>
                                <div class="col-md-6">
                                    <input type="number"  step="0.001" name="base_price" class="form-control" value="{{$product->base_price}}" required></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="individual_discount" class="col-md-4 col-form-label text-md-right">{{ __('Individual discount') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="individual_discount" class="form-control" value="{{$product->individual_discount}}" value=0 required></input>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Image url') }}</label>
                                <div class="col-md-6">
                                    <input type="url" name="image" value="{{$product->image}}" class="form-control"></input>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="description" value="{{$product->description}}" class="form-control"></input>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" value="Submit">Submit changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
