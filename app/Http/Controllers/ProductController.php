<?php

namespace App\Http\Controllers;

use App\Product;
use Shopify;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Protect methods to make sure users are authenticated
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function connect_shopify()
    {

        $shopUrl = "employbl.myshopify.com";
        $scope = ["write_products","read_orders"];
        $redirectUrl = "http://localhost:8000/process_shopify_data";

        // Gets products:
        // https://employbl.myshopify.com/admin/products.json

        $shopify = Shopify::setShopUrl($shopUrl);

        return response()->json($shopify);
    }

    /**
     * Syncs all sales channels to pull in product updates to Stitch Lite
     *
     */
    public function sync()
    {
        return 'Let the syncing begin';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
