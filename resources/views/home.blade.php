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

                    <div class='btn btn-success'>Connect Shopify</div>

                    <div class='btn btn-primary'>Connect Vend</div>
                </div>
            </div>

            <div class='panel panel-default'>
                <div class='panel-heading'>
                    All Products
                </div>

                <div class='panel-body'>
                    @forelse($products as $product)  
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
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @empty
                        <p>You currently do not have any products to display. <a href='#'>Sync now</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
