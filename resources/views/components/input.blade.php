@props(['name'=>'','class'=>'','placeholder'=>''])
<div class="input">
    <label for="{{$name}}">{{ucfirst($name)}}</label>
    <input class="{{$class}}" name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}">
    @error($name)
    <p class="small-error">{{$message}}</p>
    @enderror
</div>
