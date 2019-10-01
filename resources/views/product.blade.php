
@extends('layouts.app')
@section('content')
        <a href="{{route('products.create')}}">Create a product</a>
        <table class="table table-striped">
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
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->sku }}
                    </td>
                    <td>
                        @if($product->status) Enabled
                        @else Disabled
                        @endif

                    </td>
                    <td>
                        {{ $product->base_price }}
                    </td>
                    <td>
                        {{ $product->individual_discount }}
                    </td>
                    <td>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" height="112" width="76"></img>
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        @if($product->rating)
                            {{ $product->rating }}
                        @else
                            Product has not been rated yet.
                        @endif
                    </td>
                    <td>
                        <a href="{{route('products.edit', $product->id)}}">Edit</a>
                    </td>
                    <td>
                        <input class="product-checkbox" id="{{ $product->id}}" type="checkbox">
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>

            <script>
                $(document).ready(function () {
                    $('#sel-all').click(function() {
                        $(".product-checkbox").each(function () {
                            if($('#sel-all').prop('checked')) {
                                $(this).prop('checked', true);
                            }
                            else $(this).prop('checked', false)
                        });
                    });
                    $('.product-checkbox').click(function () {
                        $('.product-checkbox').each(function () {
                            if(!$(this).prop('checked')) $("#sel-all").prop('checked', false);
                        });
                    });
                    // $('#btn').click(function () {
                    //     $('#del_form').append(document.createTextNode("test"));
                    // });
                    $("#btn").click(function() {
                        var cbIds = [];
                        $(".product-checkbox").each(function() {
                            // $('#x').append(document.createTextNode($(this).attr('id')));
                            if($(this).prop('checked'))
                                cbIds.push(parseInt($(this).attr(('id'))));
                        });
                        // console.log(cbIds);
                        // $('#cb-ids').val(cbIds);
                        cbIds.forEach(function(item, index) {
                            console.log(item);
                        });
                        $('#cb-ids').val(cbIds);
                        $('#cb-ids').submit();
                        // $('#del-form').append("<h1>" + cbIds + "</h1>");
                        // $('#del-form').append('<h1>teest</h2> <p>test</p>');
                    });
                });
            </script>

        <form id="cb-ids" method="POST">
            @csrf
            <input id="cb-ids" type="hidden" name="cbIds">
        </form>
        {{--{{ var_dump($_POST) }}--}}
        {{--<input type="hidden" id="cb-ids">--}}
        <form method="POST" action="{{route('products.destroy', 1)}}">
        @csrf
            <input type="hidden" name="_method" value="DELETE">
            <div id="del-form">
                <div class="float-right">
                    <label for="sel-all">Select all:</label>
                    <input type="checkbox" id="sel-all">
                    <button id="btn" type="submit" class="btn btn-primary" value="Submit">Delete</button>
                </div>
            </div>
        </form>
@endsection