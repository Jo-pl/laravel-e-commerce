@extends('layout.master')
@section('content')
<div class="page-layout">
    <div class="page-container">
        <div class="fancy-container">
            <input type="text" class="search-input">
            <button type="submit" class="search-button">Go</button>
        </div>
        <div class="no-orders">
            No orders yet, please come back later
        </div>
    </div>
</div>
@endsection