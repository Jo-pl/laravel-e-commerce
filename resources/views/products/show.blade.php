@extends('layout.master')
@section('content')
<div class="show-product">
    <div class="show-product">
        <img class="product-img-big" src="{{$product->img_path}}">
        <div class="product-text">
            <div class="product-title">{{$product->name}} <div class="small-price">{{$product->price}}$</div></div>
            <div class="product-description">
                {{$product->description}}
            </div>
            <div class="buy-now">
                <a href="/order/{{$product->slug}}">Add to cart</a>
            </div>
        </div>
    </div>
</div>
@endsection