@extends('layout.master')
@section('content')
<div class="page-layout">
    <div class="page-container">
        <div class="fancy-container">
                <input type="text" class="search-input" required>
                <button type="submit" class="search-button">Go</button>
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