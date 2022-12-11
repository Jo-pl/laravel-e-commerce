@props(['products','max'=>8])
<div class="trending-cards">
    @if($products->count()>0)
        {{--
        @foreach($products as $product)
        <x-card bg="{{url($product->img_path)}}" class="small-card" :product="$product"></x-card>
        @endforeach
        --}}
        @for($i=0;$i<$max;$i++)
        <x-card bg="{{url($products[$i]->img_path)}}" class="small-card" :product="$products[$i]"></x-card>
        @endfor
    @else
    <div class="empty-message">No products yet, come back later!</div>
    @endif
</div>