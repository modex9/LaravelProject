@extends('layouts.app')

@section('content')
@if($options)
    <table class="table table-striped" id="options-table">
        <thead>
        <tr>
            <th scope="col">Tax rate</th>
            <th scope="col">Tax inclusion flag</th>
            <th scope="col">Global discount</th>
            <th scope="col">Type of global discount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$options->tax_rate . "%"}}</td>
            <td>
                @if($options->tax_inc_flag) True
                    @else False
                    @endif
            </td>
            <td>{{$options->global_discount}}
            @if($options->global_discount_is_fixed)  {{$options->currency}}
                @else %
                @endif
            </td>
            <td>
                @if($options->global_discount_is_fixed)  Fixed
                @else Percentage
                @endif
            </td>
            <td>
                <a href="{{route('options.edit', $options->id)}}">Edit configuration</a>
                @else
                {{ "Catalogue configurations are not set." }}
                {!! "<a href='$route_create'>Set configurations</a>" !!}
                @endif
            </td>
        </tr>
        </tbody>
    </table>
@endsection