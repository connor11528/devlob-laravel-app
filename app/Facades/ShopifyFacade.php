<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ShopifyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shopify';
    }
}