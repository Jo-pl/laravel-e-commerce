@props(['products'])
<h1 class="title-trending">Trending products</h1>
<div class="trending-cards">
    @if($products->count()>0)
    @foreach($products as $product)
    <x-card bg="{{url($product->img_path)}}" class="small-card" :product="$product"></x-card>
    @endforeach
    @else
    <div class="empty-message">No products yet, come back later!</div>
    @endif
</div>