@extends('layout.master')
@section('content')
<div class="home-page">
    <x-carousel></x-carousel>
    <h1 class="title-trending">Trending products</h1>
    <x-trending :products="$products" max=8></x-trending>
</div>
@endsection