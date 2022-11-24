@extends('layout.master')
@section('content')
<div class="login">
    @if(Route::currentRouteName()=='login_page')
    <form class="flex-form" action="/login" method="POST" enctype="multipart/form-data">
    @else
    <form class="flex-form" action="/register" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="flex-register">
            @if(Route::currentRouteName()=='login_page')
            <h1 class="title">Login</h1>
            <p>No account yet? <a href="/register" class="register-link">Register</a></p>
            @else
            <h1 class="title">Register</h1>
            @endif
        </div>
        @if(Route::currentRouteName()=='register_page')
        <x-input name="name" class="input-login" placeholder="Name here"></x-input>
        @endif
        <x-input name="email" class="input-login" placeholder="Email here"></x-input>
        <x-input name="password" class="input-login" placeholder="*****" type="password"></x-input>
        <x-button-submit class="submit-button"></x-button-submit>
    </form>
</div>
@endsection