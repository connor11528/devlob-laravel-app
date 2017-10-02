<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shopify Api
    |--------------------------------------------------------------------------
    |
    | This file is for setting the credentials for shopify api key and secret.
    |
    */

    'key' => env("SHOPIFY_APIKEY", 'eb2c00eb6734af48d6ed86b5866ba2d3'),
    'secret' => env("SHOPIFY_SECRET", 'dba4169229e2284f9082a6ce0e3ab441')
];