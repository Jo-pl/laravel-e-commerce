@extends('layout.master')
@section('content')
<div class="login">
    <form class="flex-form" action="/login" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="title">Login</h1>
        <x-input name="email" class="input-login" placeholder="Email here"></x-input>
        <x-input name="password" class="input-login" placeholder="*****"></x-input>
        <x-button-submit class="submit-button"></x-button-submit>
    </form>
</div>
@endsection