<?php

namespace App\Http\Controllers;

use App\Product;
use ShopifyFacade;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $product;

    /**
     * Protect methods to make sure users are authenticated
     *
     * @return void
     */
     public function __construct(ProductRepository $product)
     {
         $this->product = $product;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getAll();
        return view('products.index', compact('products'));
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
        $attributes = $request->all(); // could specify ->only(['name', 'sku', 'quantity', 'price']);
        $this->product->create($attributes);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // might not follow the repository pattern...
        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $attributes = $request->all();
        $this->product->update($id, $attributes);
        return redirect()->route('products.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->delete($id);
        return redirect()->route('products.index');
    }
}
