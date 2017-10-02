StitchLite
===

StitchLite communicates with Shopify and Vend’s respective APIs to download product information.

![](https://i.imgur.com/BbyOEKd.png)

### Create app 

Generate application using [this script](https://gist.github.com/connor11528/fcfbdb63bc9633a54f40f0a66e3d3f2e)

### Set up Shopify

Sign up for Shopify [free trial](https://www.shopify.com/) and create a store.

Initialize store with three new products.

Create three products in Shopify. Make sure to fill in SKU field for every product (such as 1, 2, 3).

![products added to shopify](https://i.imgur.com/undefined.png)

[Shopify API docs](https://help.shopify.com/api/getting-started/api-credentials#generate-private-app-credentials)

### Make StitchLite Authentication

```
$ php artisan make:auth
$ php artisan migrate
```

Make sure you have updated your **.env** file with the values to connect to your database. In order to update them make sure to clear the config:

```
$ php artisan config:clear
```

This will generate Laravel's default authentication scaffolding with a users table and bootstrap based login and register pages. By default the `/home` route will be protected so that only authenticated users can view it.

### Products table

Make a Products table, model and resource controller:

```
$ php artisan make:model Product -mcr  
```

Products need Product Name, SKU, Quantity and Price. Update the Products database migration to create the appropriate columns:

```
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('sku');
        $table->integer('quantity');
        $table->integer('price'); // price in cents
        $table->timestamps();
    });
}
```

Run the migration with `php artisan migrate`

### Connect to Shopify 

We're going to use a [shopify API wrapper package](https://github.com/joshrps/laravel-shopify-API-wrapper) and install it through composer.

```
$ composer require "rocket-code/shopify":"~2.0"
```

The ecosystem for PHP surrounding Shopify as not as developed as other languages. I found [this post](http://gavinballard.com/building-shopify-apps-with-php/) helpful in navigating the PHP shopify landscape. 

Make sure to add the package to the array of supported providers in **config/app.php**

```
...
RocketCode\Shopify\ShopifyServiceProvider::class
```

Once the package is installed we can connect StitchLite to get the shopify products we created.

PHP but non Laravel:
- http://oauth2-client.thephpleague.com/providers/thirdparty/
- https://github.com/multidimension-al/oauth2-shopify







