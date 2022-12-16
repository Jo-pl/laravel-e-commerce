@extends('layout.master')
@section('content')
<div class="page-layout">
    <div class="page-container">
        <div class="fancy-container">
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="search" id="search" class="search-input" required placeholder="Search by product name">
                <button type="submit" class="search-button">Go</button>
            </form>
        </div>
        <div class="container-trending">
            <x-trending :products="$products" :max="$products->count()"></x-trending>
        </div>
        <div class="pagination">
            {{$products->links('layout.pagination')}}
        </div>
    </div>
</div>
@endsection