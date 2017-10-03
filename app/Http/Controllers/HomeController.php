<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // successfull response from authenticating Vend will contain
        // a query string with `code` and `domain_prefix` parameters
        $code = $request->query('code');
        $domain_prefix = $request->query('domain_prefix');

        if($code && $domain_prefix){
            dd($code);

            // request access token 
            $vend_endpoint = 'https://'. $domain_prefix . '.vendhq.com/api/1.0/token';

            // required params:
            // code
            // client_id
            // client_secret
            // grant_type - this is always authorization_code
            // redirect_uri

            // Response:
            // {
            //     "access_token": "fMYgxHEYtcyT8cvtvgi1Za5DRs4vArSyvydlnd9f",
            //     "token_type": "Bearer",
            //     "expires": 1387145621,
            //     "expires_in": 86400,
            //     "refresh_token": "J3F62YPIQdfJjJia1xJuaHp7NoQYtm9y0WadNBTh"
            // }

            // Vend docs: https://docs.vendhq.com/v0.9/reference
        }


        $products = Product::all();
        return view('home', compact('products'));
    }
}
