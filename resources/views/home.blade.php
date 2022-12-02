@extends('layout.master')
@section('content')
<div class="home-page">
    <x-carousel></x-carousel>
    <x-trending :products="$products"></x-trending>
</div>
@endsection