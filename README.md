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
        $table->integer('sku')->unique();
        $table->integer('quantity');
        $table->integer('price'); // price in cents
        $table->timestamps();
    });
}
```

Run the migration with `php artisan migrate`

### Connect to Shopify 

Using [phpclassic/php-shopify](https://github.com/phpclassic/php-shopify) to grab shopify products. 

Create custom facade and register in app service provider and register in **config/app.php**. Call method to grab products in controller and add those products to the products database table.

When the user clicks connect with Connect with Shopify it'll store their products from shopify in the stitchlite database and trigger a hard refresh, displaying them to user on the home page.

### Add products to Vend

Add some new products to a [Vend account](https://www.vendhq.com/us/). Some will have the same SKU as the shopify products, others will be uniquely sold on vend.

![](https://i.imgur.com/MEE1D7i.png)

In this case I am selling hats and stickers on Vend and Shopify platforms. The hats and stickers have the same SKU across platforms (1 for stickers, 3 for hats). I am also selling "Special Vend Product" on Vend with an SKU of specialvendproduct. The "Special Vend Product" is not sold on Shopify. 

"Employbl Tshirt" (SKU of 2) is sold on Shopfy but not sold on Vend.

### Vend Developer Account

We'll also need to create a [Vend Developer Account](https://developers.vendhq.com/developer/sign-up). This is in addition to and separate from our Vend merchant account.

Vend requires that we use [OAuth2 Authorization Code Grant](https://tools.ietf.org/html/rfc6749#section-4.1) to connect to their API. Create a new application in the developer portal:

![](https://i.imgur.com/vR4do4t.png)



## Connect Vend products





