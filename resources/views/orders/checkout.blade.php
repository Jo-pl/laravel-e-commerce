@extends('layout.master')
@section('content')
<div class="checkout">
    <div class="container-flex">
        <div class="product-list">
            @foreach($products as $product)
            <div class="product-in-list">
                <img class="product-picture" src="{{$product->img_path}}">
                <div class="rest">
                    <div class="name"><span>{{$product->name}}</span><a class="align-right remove" href="/remove_product/{{$product->id}}/{{$order->id}}">Remove</a></div>
                    <div class="price">Price: <span>{{$product->price}} $USD</span></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="checkout-list">
            <form method="POST" action="/checkout">
            @csrf
            <div class="list-title">Subtotal<span class="align-right">{{$order->total}}</span></div>
            <div class="list-title tax">Tax<span class="align-right">15%</span></div>
            <div class="list-title">Total<span class="align-right">{{$order->total*1.15}}</span></div>
            <div class="center-button"><button class="checkout-button" type="submit">Checkout</button></div>
            </form>
        </div>
    </div>
</div>
@endsection