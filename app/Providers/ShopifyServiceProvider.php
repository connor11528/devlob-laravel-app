<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PHPShopify\ShopifySDK as Shopify;

class ShopifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('shopify', function () {
            return new Shopify;
        });
    }
}
