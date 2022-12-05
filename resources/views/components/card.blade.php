@props(['bg','height'=>'','width'=>'','class'=>'small-card','product'])
<div class="card {{$class}}" style="background-image:url({{$bg}});">
        <div class="card-shade">
            <h3 class="card-title">{{$product->name}}</h3>
            <a type="submit" class="card-buy" href="/product/{{$product->slug}}">See more</a> 
        </div>
    </form>
</div>