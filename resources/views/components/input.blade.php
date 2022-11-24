@props(['name'=>'','class'=>'','placeholder'=>'','type'=>'type'])
<div class="input">
    <label for="{{$name}}">{{ucfirst($name)}}</label>
    <input class="{{$class}}" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" type="{{$type}}">
    @error($name)
    <p class="small-error">{{$message}}</p>
    @enderror
</div>
