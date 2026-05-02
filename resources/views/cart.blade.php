@extends('layouts.app')

@section('title', 'My Cart - FashionHub')

@section('content')

<!-- ***** Cart Page ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>My Cart</h2>
                    <span>Manage your shopping items</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(count($cart) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>${{ number_format($item['price'], 2) }}</td>
                                        <td>
                                            <form action="{{ route('cart.update', $item['id']) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="100" style="width: 60px; padding: 5px;">
                                                <button type="submit" class="btn btn-sm" style="padding: 5px 10px; background: #1e1e1e; color: white; border: none; cursor: pointer;">Update</button>
                                            </form>
                                        </td>
                                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-sm" style="padding: 5px 10px; background: #e74c3c; color: white; border: none; cursor: pointer; text-decoration: none;">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-top: 30px; padding: 20px; background: #f5f5f5; border-radius: 5px;">
                        <h3>Cart Summary</h3>
                        <h2 style="color: #1e1e1e; margin-top: 10px;">Total: ${{ number_format($total, 2) }}</h2>

                        <div style="margin-top: 20px;">
                            <a href="{{ route('products') }}" class="btn" style="padding: 10px 20px; background: #1e1e1e; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 10px;">Continue Shopping</a>
                            <a href="{{ route('cart.clear') }}" class="btn" style="padding: 10px 20px; background: #e74c3c; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block;">Clear Cart</a>
                            <a href="#" class="btn" style="padding: 10px 20px; background: #27ae60; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; margin-left: 10px;">Checkout</a>
                        </div>
                    </div>
                @else
                    <div style="text-align: center; padding: 60px 20px;">
                        <h3>Your cart is empty</h3>
                        <p style="margin-top: 20px; font-size: 16px;">Start shopping by browsing our products!</p>
                        <a href="{{ route('products') }}" class="btn" style="padding: 12px 30px; background: #1e1e1e; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 20px;">Go to Products</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
