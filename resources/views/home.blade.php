@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <connect-service service='Shopify' btnclass='btn-success'></connect-service>
                    <connect-service service='Vend' btnclass='btn-primary'></connect-service>
                    <refresh-products></refresh-products>
                </div>
            </div>

            <div class='panel panel-default'>
                <div class='panel-heading'>
                    All Products
                </div>

                <div class='panel-body'>  
                    <table class='table-striped'>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['sku'] }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                </tr>
                            @empty
                                <p>You currently do not have any products to display. <a href='#'>Sync now</a></p>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
