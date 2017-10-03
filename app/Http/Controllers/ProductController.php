<?php

namespace App\Http\Controllers;

use App\Product;
use ShopifyFacade;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        // Gets products:
        // https://employbl.myshopify.com/admin/products.json

        $config = array(
            'ShopUrl' => 'employbl.myshopify.com',
            'ApiKey' => 'eb2c00eb6734af48d6ed86b5866ba2d3', // ***YOUR-PRIVATE-API-KEY***
            'Password' => 'dba4169229e2284f9082a6ce0e3ab441', // ***YOUR-PRIVATE-API-PASSWORD***
        );

        $shopify = ShopifyFacade::config($config);
        $products = $shopify->Product->get();

        // add products to database
        for ($i = 0; $i < count($products); $i++) {
            $details = $products[$i]['variants'][0];

            // check if item with same sku exists
            $product = Product::where('sku', '=', $details['sku'])->first();

            // if does not exist add it to db
            if($product == null){
                Product::create([
                    'name' => $products[$i]['title'],
                    'sku' => $details['sku'],
                    'quantity' => $details['inventory_quantity'],
                    'price' => $details['price'] * 100
                ]);
            }

        }

        return Product::all();

    }

    public function connect_vend()
    {

        $vendCreds = [
            'client_id' => 'hFimy0FfHMFRq9F8UWtItYAY8GWeSPj5',
            'client_secret' => 'QlrkDbqgpzaMYipUN07sflRgXSF4CNsb',
            'redirect_uri' => 'http://localhost:8000/vend_callback'
        ];

        return redirect('https://secure.vendhq.com/connect?response_type=code&client_id='. $vendCreds['client_id'] .'&redirect_uri=http://localhost:8000/vend_callback');
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
