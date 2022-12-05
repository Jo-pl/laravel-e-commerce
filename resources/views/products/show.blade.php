@extends('layout.master')
@section('content')
<div class="show-product">
    <div class="show-product">
        <img class="product-img-big" src="{{$product->img_path}}">
        <div class="product-text">
            <div class="product-title">{{$product->name}}</div>
            <div class="product-description">
                {{$product->description}}
            </div>
            <div class="buy-now">
                <a href="product/">Add to cart</a>
            </div>
        </div>
    </div>
</div>
@endsection