<td>
    <a href="{{route('products.show', $product->id)}}">
    {{ $product->name }}
    </a>
</td>
<td>
    {{ $product->sku }}
</td>
<td>
    <a href='#' id="{{'product-enablement'.$product->id}}">
    @if($product->status)
        <img class="product-enablement" src="{{ 'img/checked.svg' }}" alt="{{ $product->name }}" height="112" width="76"></img>
    @else 
        <img class="product-enablement" src="{{ 'img/cancel.svg' }}" alt="{{ $product->name }}" height="112" width="76"></img>
    @endif
    </a>

</td>
<td>
    @if ($options)
        {{ $product->base_price.' '.$options->currency }}
    @else
        {{ $product->base_price }}
    @endif
</td>
<td>
    @if ($options)
        {{ $product->individual_discount.' '.$options->currency }}
    @else
        {{ $product->individual_discount }}
    @endif
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
    <input class="product-checkbox" id="{{ 'product_select' . $product->id}}" type="checkbox">
</td>