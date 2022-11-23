@props(['name'=>'','class'=>''])
<div class="input">
    <label for="{{$name}}">{{ucfirst($name)}}</label>
    <input class="{{$class}}" name="{{$name}}" id="{{$name}}">
</div>
