@extends('layout.master')
@section('content')
<div class="checkout">
    <div class="container-flex">
        <div class="product-list">
            @foreach($products as $product)
            <div class="product-in-list">
                <img class="product-picture" src="{{$product->img_path}}">
                <div class="rest">
                    <div class="name"><span>{{$product->quantity}} {{$product->name}}</span>
                        <a class="align-right remove" onClick="setOrder({{$order}});removeQuantity({{$product->id}});$('#product-remove-form').submit();">Remove</a>
                    </div>
                    <div class="price">Price: <span>{{$product->price}} $USD</span></div>
                </div>
            </div>
            @endforeach
            <form action="/update_order" id="product-remove-form" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order" id="order" value="{{$order}}">
            </form>
        </div>
        <div class="checkout-list">
            <form method="POST" action="/checkout">
            @csrf
            <?php
            $order->status=2;
            ?>
            <input type="hidden" name="order" id="order" value="{{$order}}">
            <div class="list-title">Subtotal<span class="align-right">{{$order->total}}</span></div>
            <div class="list-title tax">Tax<span class="align-right">15%</span></div>
            <div class="list-title">Total<span class="align-right">{{$order->total*1.15}}</span></div>
            <div class="center-button"><button class="checkout-button" type="submit">Checkout</button></div>
            </form>
        </div>
    </div>
</div>
@endsection