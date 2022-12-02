@props(['bg','height'=>'','width'=>'','class'=>'small-card','title'])
<div class="card {{$class}}" style="background-image:url({{$bg}});">
    <div class="card-shade">
        <h3 class="card-title">{{$title}}</h3>
        <button type="button" class="card-buy">See more</button> 
    </div>
</div>