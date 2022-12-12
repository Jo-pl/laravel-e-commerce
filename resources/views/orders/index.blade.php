@extends('layout.master')
@section('content')
<div class="page-layout">
    <div class="page-container">
        <div class="fancy-container">
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="search" id="search" class="search-input" required>
                <button type="submit" class="search-button">Go</button>
            </form>
        </div>
        <div class="no-orders">
            No orders yet, please come back later
        </div>
    </div>
</div>
@endsection