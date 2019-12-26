<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Options;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Options::all()->first();
        $products = Product::all();
        return view('products', compact(['products', 'options']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();
        if($product['status'] == 'enabled')
            $product['status'] = true;
        else
            $product['status'] = false;

        Product::create($product);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $updated_product = $request->all();
        if($updated_product['status'] == 'enabled')
            $updated_product['status'] = true;
        else $updated_product['status'] = false;
        $product->update($updated_product);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    
    public function changeProductStatus(Request $request) {
        $result = $request->all();
        $product = Product::find($result['id']);
        $product->status = !$product->status;
        $product->save();
        return response()->json(array('result'=> $product), 200);
        
    }
    
    public function deleteSelectedProducts(Request $request) {
        $result = $request->all();
        foreach($result['selectedProductsIds'] as $productId)
            Product::find($productId)->delete();
    }
}
